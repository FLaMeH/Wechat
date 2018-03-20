<?php
namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;
/*
 * 会员卡内容更新事件
 */
class CardUpdated extends Event{
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='update_member_card');
    }
}