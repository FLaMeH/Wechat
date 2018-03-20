<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class Voice extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'voice');
    }
}
