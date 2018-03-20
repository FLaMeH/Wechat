<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class ShortVideo extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'shortvideo');
    }
}
