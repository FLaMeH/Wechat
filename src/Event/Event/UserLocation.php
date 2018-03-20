<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class UserLocation extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'LOCATION');
    }
}