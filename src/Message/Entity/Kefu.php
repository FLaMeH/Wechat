<?php
namespace ISeeCoo\Wechat\Message\Entity;

use ISeeCoo\Wechat\Message\Entity;

class Kefu extends Entity
{

    /**
     * 指定转接客服
     * 
     * @var kf_account
     */
    protected $transinfo;

    public function setTransinfo($transinfo)
    {
        $this->transinfo = $transinfo;
    }

    public function getType()
    {
        return 'transfer_customer_service';
    }

    public function getBody()
    {
        if ($this->transinfo) {
            return [
                'TransInfo' => [
                    'KfAccount' => $this->transinfo
                ]
            ];
        }
    }
}