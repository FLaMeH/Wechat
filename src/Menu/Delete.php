<?php
namespace Flameh\Wechat\Menu;

use Flameh\Wechat\Bridge\Http;
use Flameh\Wechat\Wechat\AccessToken;

class Delete
{

    /**
     * 接口地址
     */
    const DELETE_URL = 'https://api.weixin.qq.com/cgi-bin/menu/delete';

    const DELETE_CONDITIONAL = 'https://api.weixin.qq.com/cgi-bin/menu/delconditional';

    /**
     * Flameh\Wechat\Wechat\AccessToken.
     */
    protected $accessToken;

    /**
     * 构造方法.
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * 获取响应.
     */
    public function doDelete()
    {
        $response = Http::request('GET', static::DELETE_URL)->withAccessToken($this->accessToken)->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return true;
    }
    
    /*
     * 删除个性化菜单
     */
    public function doConditionalDelete($menuid)
    {
        $response = Http::request("POST", static::DELETE_CONDITIONAL)->withAccessToken($this->accessToken)
            ->withBody([
            'menuid' => $menuid
        ])
            ->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return true;
    }
}
