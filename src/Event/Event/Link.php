<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class Link extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'link');
    }
}
