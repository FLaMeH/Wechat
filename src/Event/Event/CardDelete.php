<?php
namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;
/*
 * 删除卡卷
 */
class CardDelete extends Event {
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='user_del_card');
    }
}