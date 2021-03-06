<?php

namespace Flameh\Wechat\Payment\Qrcode;

use Flameh\Wechat\Payment\Unifiedorder;

class Temporary
{
    /**
     * Flameh\Wechat\Payment\Unifiedorder.
     */
    protected $unifiedorder;

    /**
     * 构造方法.
     */
    public function __construct(Unifiedorder $unifiedorder)
    {
        $unifiedorder->set('trade_type', 'NATIVE');

        $this->unifiedorder = $unifiedorder;
    }

    /**
     * 获取支付链接.
     */
    public function getPayurl()
    {
        $response = $this->unifiedorder->getResponse();

        if (!$response->containsKey('code_url')) {
            throw new \Exception('Invalid Unifiedorder Response');
        }

        return $response['code_url'];
    }
}
