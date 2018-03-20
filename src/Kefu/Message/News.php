<?php
namespace ISeeCoo\Wechat\Kefu\Message;

use ISeeCoo\Wechat\Kefu\Entity;
use ISeeCoo\Wechat\Kefu\Message\NewsItem;
use think\Log;

class News extends Entity
{

    protected $items = [];


    public function addItem(NewsItem $item)
    {
        if (sizeof($this->items) > 8) {
            throw new \Exception('图文信息超出8条');
        }
        $this->items[] = $item;
    }

    public function getType()
    {
        return 'news';
    }

    public function getBody()
    {
        $body = [];
        foreach ($this->items as $item) {
            $body[] = $item->getBody();
        }
        return [
            'articles' => $body
        ];
    }
}