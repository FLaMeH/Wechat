<?php
namespace ISeeCoo\Wechat\Kefu\Message;

use ISeeCoo\Wechat\Kefu\Entity;

class Voice extends Entity
{

    protected $mediaid;


    public function setMediaid($mediaid)
    {
        $this->mediaid = $mediaid;
    }


    public function getType()
    {
        return 'voice';
    }

    public function getBody()
    {
        return [
            'media_id' => $this->mediaid
        ];
    }
}