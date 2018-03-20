<?php
namespace Flameh\Wechat\Event\Event\Audit;

use Flameh\Wechat\Event\Event;

class MerchantAddstoreAuditInfo extends Event
{

    public function isValid()
    {
        return ($this['MsgType'] === 'event') && ($this['Event'] === 'add_store_audit_info');
    }
}

