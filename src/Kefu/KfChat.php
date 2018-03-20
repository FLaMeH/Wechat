<?php
namespace Flameh\Wechat\Kefu;

use Flameh\Wechat\Wechat\AccessToken;
use Flameh\Wechat\Bridge\Http;
use Flameh\Wechat\Kefu\Entity;
use think\Log;

class KfChat extends KfBase
{

    const CREATE_SESSION = 'https://api.weixin.qq.com/customservice/kfsession/create';

    const SEND_MSG = 'https://api.weixin.qq.com/cgi-bin/message/custom/send';

    const CLOSE_SESSION = 'https: //api.weixin.qq.com/customservice/kfsession/close';

    const GET_SESSION = 'https://api.weixin.qq.com/customservice/kfsession/getsession';

    const GET_SESSIO_LIST = 'https://api.weixin.qq.com/customservice/kfsession/getsessionlist';

    const GET_WAIT_CASE = 'https://api.weixin.qq.com/customservice/kfsession/getwaitcase';

    const GET_MSG_LIST = 'https://api.weixin.qq.com/customservice/msgrecord/getmsglist';

    const TYPING = 'https://api.weixin.qq.com/cgi-bin/message/custom/typing';

    /**
     * Flameh\Wechat\Wechat\AccessToken
     */
    protected $accessToken;

    /**
     * 构造方法
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function createSession($kf_account, $openid)
    {
        if (parent::checkAccount($kf_account)) {
            $response = Http::request('POST', static::CREATE_SESSION)->withAccessToken($this->accessToken)
                ->withBody([
                'kf_account' => $kf_account,
                'openid' => $openid
            ])
                ->send();
            if (0 != $response['errcode']) {
                throw new \Exception($response['errmsg'], $response['errcode']);
            }
            return $response;
        }
    }

    public function typing($typing = true, $openid)
    {
        if ($typing) {
            $status = 'Typing';
        } else {
            $status = 'CancelTyping';
        }
        $response = Http::request('POST', static::TYPING)->withAccessToken($this->accessToken)
            ->withBody([
            'touser' => $openid,
            'command' => $status
        ])
            ->send();
        if (0 !== $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }

    /**
     * 发送公共客服消息
     *
     * @param unknown $openid
     * @param Entity $entity
     */
    public function chat(Entity $entity)
    {
        $body = [
            'touser' => $entity->getTouser(),
            'msgtype' => $entity->getType(),
            $entity->getType() => $entity->getBody()
        ];
        $customservice = $entity->getCustomservice();
        if ($customservice) {
            $body['customservice'] = $customservice;
        }
        $response = Http::request('POST', static::SEND_MSG)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }

    public function close($kf_account, $openid)
    {
        if (parent::checkAccount($kf_account)) {
            $response = Http::request('POST', static::CLOSE_SESSION)->withAccessToken($this->accessToken)
                ->withBody([
                'kf_account' => $kf_account,
                'openid' => $openid
            ])
                ->send();
            if (0 != $response['errcode']) {
                throw new \Exception($response['errmsg'], $response['errcode']);
            }
            
            return $response;
        }
    }

    public function getSession($openid)
    {
        $response = Http::request('GET', static::GET_SESSION)->withAccessToken($this->accessToken)
            ->withQuery([
            'openid' => $openid
        ])
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    public function getSessionList($kf_account)
    {
        if (parent::checkAccount($kf_account)) {
            $response = Http::request('GET', static::GET_SESSIO_LIST)->withAccessToken($this->accessToken)
                ->withQuery([
                'kf_account' => $kf_account
            ])
                ->send();
            if (0 != $response['errcode']) {
                throw new \Exception($response['errmsg'], $response['errcode']);
            }
            
            return $response;
        }
    }

    public function getWaitcase()
    {
        $response = Http::request('GET', static::GET_WAIT_CASE)->withAccessToken($this->accessToken)->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    public function getMsglist($starttime, $endtime, $msgid = 1, $number = 1000)
    {
        $time_range = self::timediff($starttime, $endtime);
        if ($time_range['day'] > 1) {
            throw new \Exception('超出可接受的时间范围,单次查询时段必须在24小时以内');
        }
        $response = Http::request('POST', static::GET_MSG_LIST)->withAccessToken($this->accessToken)
            ->withBody([
            'starttime' => $starttime,
            'endtime' => $endtime,
            'msgid' => $msgid,
            'number' => $number
        ])
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    protected function timediff($begin_time, $end_time)
    {
        if ($begin_time < $end_time) {
            $starttime = $begin_time;
            $endtime = $end_time;
        } else {
            $starttime = $end_time;
            $endtime = $begin_time;
        }
        $timediff = $endtime - $starttime;
        $days = intval($timediff / 86400);
        $remain = $timediff % 86400;
        $hours = intval($remain / 3600);
        $remain = $remain % 3600;
        $mins = intval($remain / 60);
        $secs = $remain % 60;
        $res = array(
            "day" => $days,
            "hour" => $hours,
            "min" => $mins,
            "sec" => $secs
        );
        return $res;
    }
}