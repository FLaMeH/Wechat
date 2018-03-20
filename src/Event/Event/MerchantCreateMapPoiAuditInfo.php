<?php

namespace Flameh\Wechat\Event\Event;

use Flameh\Wechat\Event\Event;

class MerchantCreateMapPoiAuditInfo extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
        && ($this['Event'] === 'create_map_poi_audit_info');
    }
}
