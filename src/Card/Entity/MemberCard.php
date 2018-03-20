<?php
namespace ISeeCoo\Wechat\Card\Entity;

use ISeeCoo\Wechat\Card\CardEntity;

class MemberCard extends CardEntity
{

    protected $supply_bonus = true;

    protected $supply_balance = false;

    protected $prerogative;

    public function __construct($base, $advanced, $supply_bonus, $supply_balance, $prerogative)
    {
        parent::__construct($base, $advanced);
        $this->supply_balance = $supply_balance;
        $this->supply_bonus = $supply_bonus;
        $this->prerogative = $prerogative;
    }

    public function getBody()
    {
        return [
            'member_card' => [
                'base_info' => $this->baseInfo,
                'advanced_info' => $this->advancedInfo,
                'supply_bonus' => $this->supply_bonus,
                'supply_balance' => $this->supply_balance,
                'prerogative' => $this->prerogative
            ]
        ];
    }

    public function getType()
    {
        return 'MEMBER_CARD';
    }
}