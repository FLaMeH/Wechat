<?php
namespace ISeeCoo\Wechat\Card\Entity;

use ISeeCoo\Wechat\Card\CardEntity;

/*
 * 团购卷实体
 */
class Groupon extends CardEntity
{

    protected $deal_detail;

    public function __construct($base, $advanced, $deal_detail)
    {
        parent::__construct($base, $advanced);
        $this->deal_detail=$deal_detail;
    }

    public function getBody()
    {
        return [
            'groupon' => [
                'base_info' => $this->baseInfo,
                'advanced_info' => $this->advancedInfo,
                'deal_detail' => $this->dealDetail
            ]
        ];
    }

    public function getType()
    {
        return 'GROUPON';
    }
}