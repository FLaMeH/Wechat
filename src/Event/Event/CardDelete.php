<?php
namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;
/*
 * 删除卡卷
 */
class CardDelete extends Event {
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='user_del_card');
    }
}