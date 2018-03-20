<?php
namespace Flameh\Wechat\Kefu\Message;

use Flameh\Wechat\Kefu\Entity;

class Video extends Entity
{

    protected $mediaid;

    protected $thumb_media_id;

    protected $title;

    protected $description;
    
    

    public function setMediaid($mediaid)
    {
        $this->mediaid = $mediaid;
    }

    public function setThumbid($id)
    {
        $this->thumb_media_id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($des)
    {
        $this->description = $des;
    }

    public function getType()
    {
        return 'video';
    }

    public function getBody()
    {
        return [
            'media_id' => $this->mediaid,
            'thumb_media_id' => $this->thumb_media_id,
            'title' => $this->title,
            'description' => $this->description
        ];
    }
}