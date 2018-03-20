<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class MerchantModifyStoreAuditInfo extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
        && ($this['Event'] === 'modify_store_audit_info');
    }
}



