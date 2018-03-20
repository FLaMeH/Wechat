<?php
namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;
/*
 * 会员卡内容更新事件
 */
class CardUpdated extends Event{
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='update_member_card');
    }
}