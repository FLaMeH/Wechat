<?php
namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;
/*
 * 微信买单完成后推送事件
 */
class CardPayCell extends Event{
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='user_pay_from_pay_cell');
    }
}