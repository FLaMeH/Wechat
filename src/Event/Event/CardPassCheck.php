<?php
namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

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