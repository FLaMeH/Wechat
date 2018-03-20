<?php
namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;
/*
 * 会员卡激活
 */
class CardActivated Extends Event{
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='submit_membercard_user_info');
    }
}