<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class ShortVideo extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'shortvideo');
    }
}
