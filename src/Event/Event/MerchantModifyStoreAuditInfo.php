<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class MerchantModifyStoreAuditInfo extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
        && ($this['Event'] === 'modify_store_audit_info');
    }
}



