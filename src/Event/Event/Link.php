<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class Link extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'link');
    }
}
