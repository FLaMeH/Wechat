<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class ScanCodePush extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'scancode_push');
    }
}
