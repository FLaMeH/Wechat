<?php
namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;
/*
 * 用户转赠卡卷
 */
class CardGifted extends Event {
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='user_gifting_card');
    }
}