<?php
namespace ISeeCoo\Wechat\Card;

abstract class CardEntity
{

    protected $baseInfo;

    protected $advancedInfo;

    public function __construct(BaseInfoEntity $base, AdvancedInfoEntity $advanced)
    {
        $this->baseInfo = $base;
        $this->advancedInfo=$advanced;
    }
    
    public function setCard($key,$val){
        $this[$key] = $val;
    }

    abstract public function getBody();

    abstract public function getType();
}