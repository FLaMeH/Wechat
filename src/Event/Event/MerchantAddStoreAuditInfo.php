<?php
namespace ISeeCoo\Wechat\Event\Event\Audit;

use ISeeCoo\Wechat\Event\Event;

class MerchantAddstoreAuditInfo extends Event
{

    public function isValid()
    {
        return ($this['MsgType'] === 'event') && ($this['Event'] === 'add_store_audit_info');
    }
}

