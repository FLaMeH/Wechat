<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class MerchantCreateMapPoiAuditInfo extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
        && ($this['Event'] === 'create_map_poi_audit_info');
    }
}
