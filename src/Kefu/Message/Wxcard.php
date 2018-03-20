<?php
namespace Flameh\Wechat\Kefu\Message;

use Flameh\Wechat\Kefu\Entity;

class Wxcard extends Entity
{

    protected $card_id;

    public function setCard($id)
    {
        $this->card_id = $id;
    }

    public function getType()
    {
        return 'wxcard';
    }

    public function getBody()
    {
        return [
            'card_id' => $this->card_id
        ];
    }
}