<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class Location extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'location');
    }
}
