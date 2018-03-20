<?php
namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;
/*
 * 卡卷库存报警 
 * 当某个card_id的初始库存数大于200且当前库存小于等于100时，用户尝试领券会触发发送事件给商户，事件每隔12h发送一次。
 */
class CardSkuRemind extends Event{
    public function isValid(){
        return ($this['MsgType']==='event')&&($this['Event']==='card_sku_remind');
    }
}