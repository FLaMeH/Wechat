<?php
namespace Flameh\Wechat\User;

use Flameh\Wechat\Wechat\AccessToken;
use Flameh\Wechat\Bridge\Http;
use think\Log;

class Tag
{

    // 创建
    const CREATE = 'https://api.weixin.qq.com/cgi-bin/tags/create';

    // 获取已创建的
    const GET = 'https://api.weixin.qq.com/cgi-bin/tags/get';

    const UPDATE = 'https://api.weixin.qq.com/cgi-bin/tags/update';

    const DELETE = 'https://api.weixin.qq.com/cgi-bin/tags/delete';

    const GETUSERS = 'https://api.weixin.qq.com/cgi-bin/user/tag/get';

    const BATCH = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging';

    const BATCHUN = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchuntagging';

    const GETIDLIST = 'https://api.weixin.qq.com/cgi-bin/tags/getidlist';

    private $accessToken;

    public function __construct(AccessToken $accesstoken)
    {
        $this->accessToken = $accesstoken;
    }

    /**
     * 创建标签
     *
     * @param string $name
     * @throws \Exception
     * @return \Doctrine\Common\Collections\ArrayCollection ['tag'=>['id'=>xxx,'name'=>$name]]
     */
    public function createTag($name)
    {
        if (count($name) > 30) {
            throw new \Exception('字符数量超出限制(最多30个)');
        }
        $body = [
            'tag' => [
                'name' => $name
            ]
        ];
        $response = Http::request('POST', static::CREATE)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    /**
     * 获取已创建的所有标签
     * { "tags":[{ "id":1, "name":"每天一罐可乐星人", "count":0 //此标签下粉丝数 },{ "id":2, "name":"星标组", "count":0 },{ "id":127, "name":"广东", "count":5 } ] }
     *
     * @throws \Exception
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getList()
    {
        $response = Http::request('GET', static::GET)->withAccessToken($this->accessToken)->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    /**
     * 编辑标签
     *
     * @param int $id
     * @param string $name
     * @throws \Exception
     * @return \Doctrine\Common\Collections\ArrayCollection|unknown
     */
    public function edit($id, $name)
    {
        if (in_array($id, [
            0,
            1,
            2
        ])) {
            throw new \Exception('不允许修改系统保留标签', 45058);
        }
        if (count($name) > 30) {
            throw new \Exception('标签名长度超过30个字符', 45158);
        }
        $body = [
            'tag' => [
                'id' => $id,
                'name' => $name
            ]
        ];
        $response = Http::request('POST', static::UPDATE)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    /**
     * 删除标签
     *
     * @param unknown $id
     * @throws \Exception
     * @return \Doctrine\Common\Collections\ArrayCollection|unknown
     */
    public function delete($id)
    {
        if (in_array($id, [
            0,
            1,
            2
        ])) {
            throw new \Exception('不允许删除系统保留标签', 45058);
        }
        $body = [
            'tag' => [
                'id' => $id
            ]
        ];
        $response = Http::request('POST', static::DELETE)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    /**
     * 获取标签下粉丝列表
     *
     * @param unknown $tagid
     * @param unknown $nextOpenid
     */
    public function getUserList($tagid, $nextOpenid = null)
    {
        if (! $tagid) {
            throw new \Exception('未提供要获取的标签');
        }
        $query = null === $nextOpenid ? [] : [
            'next_openid' => $nextOpenid
        ];
        $response = Http::request('GET', static::GETUSERS)->withAccessToken($this->accessToken)
            ->withBody($query)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    /**
     * 批量为用户打标签
     */
    public function batch($tagid, $openidAry)
    {
        if (empty($openidAry)) {
            throw new \Exception('要操作的用户列表为空');
        }
        if (! $tagid) {
            throw new \Exception('未传入标签');
        }
        $body = [
            'openid_list' => $openidAry,
            'tagid' => $tagid
        ];
        $response = Http::request('POST', static::BATCH)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    /**
     * 批量为用户取消标签
     */
    public function batchun($tagid, $openidAry)
    {
        if (empty($openidAry)) {
            throw new \Exception('要操作的用户列表为空');
        }
        if (! $tagid) {
            throw new \Exception('未传入标签');
        }
        $body = [
            'openid_list' => $openidAry,
            'tagid' => $tagid
        ];
        $response = Http::request('POST', static::BATCHUN)->withAccessToken($this->accessToken)
            ->withBody($query)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    /**
     * 获取用户身上的标签(id)
     *
     * @param unknown $openid
     * @throws \Exception
     * @return \Doctrine\Common\Collections\ArrayCollection|unknown
     */
    public function getUserTags($openid)
    {
        if (empty($openid)) {
            throw new \Exception('未传入用户信息');
        }
        $body = [
            'openid' => $openid
        ];
        $response = Http::request('POST', static::GETIDLIST)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }
}