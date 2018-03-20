<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class UserLocation extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'LOCATION');
    }
}