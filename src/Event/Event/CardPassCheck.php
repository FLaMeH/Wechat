<?php
namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

/*
 * 卡卷审核事件
 */
class CardPassCheck extends Event
{

    public function isValid()
    {
        return ($this['MsgType'] === 'event') && (($this['Event'] === 'card_pass_check') || ($this['Event'] === 'card_not_pass_check'));
    }
}