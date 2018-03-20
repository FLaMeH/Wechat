<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class LocationSelect extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'location_select')
            && !empty($this['EventKey']);
    }
}
