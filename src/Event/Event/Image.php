<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class Image extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'image');
    }
}
