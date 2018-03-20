<?php
namespace Flameh\Wechat\Kefu;

class KfBase
{
    protected function checkAccount($kf_account)
    {
        $name_ary = explode('@', $kf_account);
        $prefix_preg = '^[_0-9a-z]{1,10}$^';
        if (preg_match($prefix_preg, $name_ary[0]) && strlen($name_ary[1]) < 31) {
            return true;
        } else {
            throw new \Exception('客服账号有误,请检查');
        }
    }
}