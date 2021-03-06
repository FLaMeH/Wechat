<?php
namespace Flameh\Wechat\Menu;

use Flameh\Wechat\Bridge\Http;
use Flameh\Wechat\Wechat\AccessToken;

class Create
{

    /**
     * 接口地址
     */
    const CREATE_URL = 'https://api.weixin.qq.com/cgi-bin/menu/create';

    const CREATE_CUSTOMIZE_URL = 'https://api.weixin.qq.com/cgi-bin/menu/addconditional';

    /**
     * 一级菜单不能超过 3 个.
     */
    const MAX_COUNT = 3;

    /**
     * Flameh\Wechat\Wechat\AccessToken.
     */
    protected $accessToken;

    /**
     * 按钮集合.
     */
    protected $buttons = [];

    /**
     * 构造方法.
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * 添加按钮.
     */
    public function add(ButtonInterface $button)
    {
        if ($button instanceof ButtonCollectionInterface) {
            if (! $button->getChild()) {
                throw new \InvalidArgumentException('一级菜单不能为空');
            }
        }
        
        if (count($this->buttons) > (static::MAX_COUNT - 1)) {
            throw new \InvalidArgumentException(sprintf('一级菜单不能超过 %d 个', static::MAX_COUNT));
        }
        
        $this->buttons[] = $button;
    }

    /**
     * 发布菜单.
     */
    public function doCreate()
    {
        $response = Http::request('POST', static::CREATE_URL)->withAccessToken($this->accessToken)
            ->withBody($this->getRequestBody())
            ->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return true;
    }

    public function doConditionalCreate($matchrule)
    {
        $body = $this->getRequestBody();
        $body['matchrule'] = $matchrule;
        $response = Http::request('POST', static::CREATE_CUSTOMIZE_URL)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return true;
    }

    /**
     * 获取数据.
     */
    public function getRequestBody()
    {
        $data = [];
        
        foreach ($this->buttons as $k => $v) {
            $data['button'][$k] = $v->getData();
        }
        
        return $data;
    }
}
