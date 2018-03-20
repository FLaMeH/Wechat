<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class Subscribe extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'subscribe')
            && empty($this['EventKey']);
    }
}
