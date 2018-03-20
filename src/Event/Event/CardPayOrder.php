<?php
namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;
/*
 * 卷点流水详情事件
 */
class CardPayOrder extends Event{
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='card_pay_order');
    }
}