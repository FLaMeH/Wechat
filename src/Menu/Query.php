<?php
namespace Flameh\Wechat\Menu;

use Flameh\Wechat\Bridge\Http;
use Flameh\Wechat\Wechat\AccessToken;

class Query
{

    /**
     * 接口地址
     */
    const QUERY_URL = 'https://api.weixin.qq.com/cgi-bin/menu/get';

    const TEST_CONDITIONAL = 'https://api.weixin.qq.com/cgi-bin/menu/trymatch';

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
    
    /*
     * 测试个性化菜单匹配结果
     */
    public function doTest($user_id)
    {
        $response = Http::request('POST', static::TEST_CONDITIONAL)->withAccessToken($this->accessToken)
            ->withBody([
            'user_id' => $user_id
        ])
            ->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    /**
     * 获取响应结果.
     */
    public function doQuery()
    {
        $response = Http::request('GET', static::QUERY_URL)->withAccessToken($this->accessToken)->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }
}
