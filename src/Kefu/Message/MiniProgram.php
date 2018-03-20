<?php
namespace Flameh\Wechat\Kefu\Message;

use Flameh\Wechat\Kefu\Entity;

class MiniProgram extends Entity
{

    protected $title;

    protected $appid;

    protected $pagepath;

    protected $thumb_media_id;

    public function setTitle($data)
    {
        $this->title = $data;
    }

    public function setAppid($data)
    {
        $this->appid = $data;
    }

    public function setPagepath($data)
    {
        $this->pagepath = $data;
    }

    public function setThumb($data)
    {
        $this->thumb_media_id = $data;
    }

    public function getType()
    {
        return 'miniprogrampage';
    }

    public function getBody()
    {
        return [
            'title' => $this->title,
            'appid' => $this->appid,
            'pagepath' => $this->pagepath,
            'thumb_media_id' => $this->thumb_media_id
        ];
    }
}