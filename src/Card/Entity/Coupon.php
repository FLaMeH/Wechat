<?php
namespace Flameh\Wechat\Card\Entity;

use Flameh\Wechat\Card\CardEntity;

class Coupon extends CardEntity
{

    protected $default_detail;

    public function __construct($base, $advanced, $default_detail)
    {
        parent::__construct($base, $advanced);
        $this->default_detail = $default_detail;
    }

    public function getBody()
    {
        return [
            'general_coupon' => [
                'base_info' => $this->baseInfo,
                'advanced_info' => $this->advancedInfo,
                'default_detail' => $this->default_detail
            ]
        ];
    }

    public function getType()
    {
        return 'GENERAL_COUPON';
    }
}