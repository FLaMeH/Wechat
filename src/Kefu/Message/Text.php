<?php
namespace Flameh\Wechat\Kefu\Message;

use Flameh\Wechat\Kefu\Entity;

class Text extends Entity
{

    protected $content;

    public function setContent($text)
    {
        $this->content = $text;
    }

    public function getType()
    {
        return 'text';
    }

    public function getBody()
    {
        return [
            'content' => $this->content
        ];
    }
}