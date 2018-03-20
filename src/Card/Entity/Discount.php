<?php
namespace ISeeCoo\Wechat\Card\Entity;

use ISeeCoo\Wechat\Card\CardEntity;

class Discount extends CardEntity
{

    protected $discount;

    public function __construct($base, $advanced, $discount)
    {
        parent::__construct($base, $advanced);
        $this->discount = intval($discount);
    }

    public function getBody()
    {
        return [
            'discount' => [
                'base_info' => $this->baseInfo,
                'advanced_info' => $this->advancedInfo,
                'discount' => $this->discount
            ]
        ];
    }

    public function getType()
    {
        return 'DISCOUNT';
    }
}