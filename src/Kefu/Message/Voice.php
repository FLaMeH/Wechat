<?php
namespace Flameh\Wechat\Kefu\Message;

use Flameh\Wechat\Kefu\Entity;

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