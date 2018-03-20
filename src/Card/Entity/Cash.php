<?php
namespace ISeeCoo\Wechat\Card\Entity;

use ISeeCoo\Wechat\Card\CardEntity;

class Cash extends CardEntity
{

    protected $least_cost;

    protected $reduce_cost;

    public function __construct($base, $advanced, $least_cost, $reduce_cost)
    {
        parent::__construct($base, $advanced);
        $this->least_cost = $least_cost;
        $this->reduce_cost = $reduce_cost;
    }

    public function getBody()
    {
        return ['cash'=>[
            'base_info'=>$this->baseInfo,
            'advanced_info'=>$this->advancedInfo,
            'least_cost'=>$this->least_cost,
            'reduce_cost'=>$this->reduce_cost
        ]];
    }

    public function getType()
    {
        return 'CASH';
    }
}