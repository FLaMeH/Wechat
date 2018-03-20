<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class Image extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'image');
    }
}
