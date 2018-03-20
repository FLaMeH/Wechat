<?php
namespace Flameh\Media\Resource;

class ArticleList
{

    protected $items = [];

    public function addItem(Article $item)
    {
        $this->items[] = $item;
    }

    public function getBody()
    {
        $body = [];
        foreach ($this->items as $item) {
            $body['articles'][] = $item->getBody();
        }
        
        return $body;
    }
}