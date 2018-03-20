<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class Subscribe extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'subscribe')
            && empty($this['EventKey']);
    }
}
