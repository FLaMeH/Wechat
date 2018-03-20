<?php
namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;
/*
 * 卡卷核销
 */
class CardConsume extends Event {
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='user_consume_card');
    }
}