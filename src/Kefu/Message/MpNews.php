<?php
namespace ISeeCoo\Wechat\Kefu\Message;

use ISeeCoo\Wechat\Kefu\Entity;

class MpNews extends Entity
{

    protected $media_id;


    public function setMediaid($id)
    {
        $this->media_id = $id;
    }

    public function getType()
    {
        return 'mpnews';
    }

    public function getBody()
    {
        return [
            'media_id' => $this->media_id
        ];
    }
}