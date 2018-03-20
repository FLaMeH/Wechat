<?php
namespace Flameh\Wecchat\User;

use Flameh\Wechat\Bridge\Http;
use Flameh\Wechat\Wechat\AccessToken;

/**
 * @author huang
 *
 */
class BlackList
{

    const LISTS = 'https://api.weixin.qq.com/cgi-bin/tags/members/getblacklist';

    const BATCH = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchblacklist';

    const BATCHUN = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchunblacklist';

    /**
     * Flameh\Wechat\Wechat\AccessToken.
     */
    protected $accessToken;

    public function __construct(AccessToken $accesstoken)
    {
        $this->accessToken = $accesstoken;
    }

    public function getList($nextOpenid = null)
    {
        $query = null === $nextOpenid ? [] : [
            'next_openid' => $nextOpenid
        ];
        
        $response = Http::request('GET', static::LISTS)->withAccessToken($this->accessToken)
            ->withQuery($query)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    public function batch($openidAry)
    {
        if (sizeof($openidAry) > 20) {
            throw new \Exception('每次操作数量不能大于20个', 0001);
        }
        $query = null === $openidAry ? [] : [
            'openid_list' => $openidAry
        ];
        $response = Http::request('POST', static::BATCH)->withAccessToken($this->accessToken)
            ->withQuery($query)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    public function batchun($openidAry)
    {
        if (sizeof($openidAry) > 20) {
            throw new \Exception('每次操作数量不能大于20个', 0001);
        }
        $query = null === $openidAry ? [] : [
            'openid_list' => $openidAry
        ];
        $response = Http::request('POST', static::BATCHUN)->withAccessToken($this->accessToken)
            ->withQuery($query)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }
}