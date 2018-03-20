<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class Location extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'location');
    }
}
