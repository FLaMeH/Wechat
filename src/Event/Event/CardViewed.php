<?php
namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;
/*
 * 用户进入会员卡事件
 */
class CardViewed extends Event{
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='user_view_card');
    }
}