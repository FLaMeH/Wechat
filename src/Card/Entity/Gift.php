<?php
namespace Flameh\Wechat\Card\Entity;

use Flameh\Wechat\Card\CardEntity;

class Gift extends CardEntity
{

    protected $gift;

    public function __construct($base, $advanced, $gift)
    {
        parent::__construct($base, $advanced);
        $this->gift = strip_tags($gift);
    }

    public function getBody()
    {
        return [
            'gift' => [
                'base_info' => $this->baseInfo,
                'advanced_info' => $this->advancedInfo,
                'gift' => $this->gift
            ]
        ];
    }

    public function getType()
    {
        return 'GIFT';
    }
}