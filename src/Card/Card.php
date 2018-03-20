<?php
namespace ISeeCoo\Wechat\Card;

use ISeeCoo\Wechat\Wechat\AccessToken;
use ISeeCoo\Wechat\Bridge\Http;

class Card
{

    const CREATE_CARD = 'https://api.weixin.qq.com/card/create';

    protected $accessToken;

    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function addCard(CardEntity $card)
    {
        $body = [
            'card' => [
                'card_type' => strtoupper($card->getType()),
                strtolower($card->getType()) => $card->getBody()
            ]
        ];
        
        $response = Http::request('POST', static::CREATE_CARD)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        
        if (0 !== $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response['card_id'];
    }
}