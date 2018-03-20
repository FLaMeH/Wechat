<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class Unsubscribe extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'unsubscribe');
    }
}
