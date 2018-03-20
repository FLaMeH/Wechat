<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class ScanCodePush extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'scancode_push');
    }
}
