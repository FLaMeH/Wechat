<?php
namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;
/*
 * 用户领取卡卷事件
 */
class CardGet extends Event {
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='user_get_card');
    }
}