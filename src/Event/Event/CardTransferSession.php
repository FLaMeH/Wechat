<?php
namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

/*
 * 用户从卡卷点击查看公众号进入会话(需要用户已经关注公众号)
 */
class CardTransferSession extends Event{
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='user_enter_session_from_card');
    }
}