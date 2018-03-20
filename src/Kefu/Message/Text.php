<?php
namespace ISeeCoo\Wechat\Kefu\Message;

use ISeeCoo\Wechat\Kefu\Entity;

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