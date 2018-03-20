<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class Text extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'text');
    }
}
