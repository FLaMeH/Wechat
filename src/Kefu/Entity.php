<?php
namespace ISeeCoo\Wechat\Kefu;

abstract class Entity
{

    public $customerservice;

    public $touser;

    public $msgtype;

    public function __construct($touser, $customerservice = null)
    {
        if (isset($customerserivce)) {
            $this->customerservice = $customerserivce;
        }
        $this->touser = $touser;
    }

    abstract public function getType();

    abstract public function getBody();

    public function getTouser()
    {
        return $this->touser;
    }

    public function getCustomservice()
    {
        if ($this->customerservice) {
            return [
                'kf_account' => $this->customerservice
            ];
        }
    }
}