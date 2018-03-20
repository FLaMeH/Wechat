<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class MerchantApplyAuditInfo extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
        && ($this['Event'] === 'apply_merchant_audit_info');
    }
}
