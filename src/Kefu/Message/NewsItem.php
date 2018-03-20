<?php
namespace Flameh\Wechat\Kefu\Message;

use Flameh\Wechat\Kefu\Entity;

class NewsItem extends Entity
{

    protected $title;

    protected $description;

    protected $url;

    protected $picUrl;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPicUrl($picUrl)
    {
        $this->picUrl = $picUrl;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getType()
    {
        return 'news';
    }

    public function getBody()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'picurl' => $this->picUrl
        ];
    }

}