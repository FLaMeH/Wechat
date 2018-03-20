<?php
namespace ISeeCoo\Wechat\Kefu;

use ISeeCoo\Wechat\Wechat\AccessToken;
use ISeeCoo\Wechat\Bridge\Http;
use think\File;

class KfManage extends KfBase
{

    const BATCHGET_KF_LIST = 'https://api.weixin.qq.com/cgi-bin/customservice/getkflist';

    const ONLINE_KF_LIST = 'https://api.weixin.qq.com/cgi-bin/customservice/getonlinekflist';

    const ADD_KF = 'https://api.weixin.qq.com/customservice/kfaccount/add';

    const INVITE_KF = 'https://api.weixin.qq.com/customservice/kfaccount/inviteworker';

    const UPDATE_KF = 'https://api.weixin.qq.com/customservice/kfaccount/update';

    const UPLOAD_KF_HEADIMG = 'https://api.weixin.qq.com/customservice/kfaccount/uploadheadimg';

    const DELETE_KF = 'https://api.weixin.qq.com/customservice/kfaccount/del';

    /**
     * ISeeCoo\Wechat\Wechat\AccessToken
     */
    protected $accessToken;

    /**
     * 构造方法
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function lists()
    {
        $response = Http::request('GET', static::BATCHGET_KF_LIST)->withAccessToken($this->accessToken)->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        
        return $response;
    }

    public function online()
    {
        $response = Http::request('GET', static::ONLINE_KF_LIST)->withAccessToken($this->accessToken)->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }

    public function add($accountname, $nickname)
    {
        // $accountname应该是 英文@微信号(英文), 需要做判断前缀最多10个字符，必须是英文、数字字符或者下划线，后缀为公众号微信号，长度不超过30个字符
        if (parent::checkAccount($accountname) && utf8_strlen($nickname) < 16) {
            $body = [
                'kf_account' => $accountname,
                'nickname' => $nickname
            ];
            $response = Http::request('POST', static::ADD_KF)->withAccessToken($this->accessToken)
                ->withBody($body)
                ->send();
            if (0 != $response['errcode']) {
                throw new \Exception($response['errmsg'], $response['errcode']);
            }
            return $response;
        }
    }

    public function inviteworker($accountname, $invite_wx)
    {
        $body = [
            'kf_account' => $accountname,
            'invite_wx' => $invite_wx
        ];
        $response = Http::request('POST', static::INVITE_KF)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }

    public function update($accountname, $nickname)
    {
        // $accountname应该是 英文@微信号(英文), 需要做判断前缀最多10个字符，必须是英文、数字字符或者下划线，后缀为公众号微信号，长度不超过30个字符
        if (parent::checkAccount($accountname) && utf8_strlen($nickname) < 16) {
            $body = [
                'kf_account' => $accountname,
                'nickname' => $nickname
            ];
            $response = Http::request('POST', static::UPDATE_KF)->withAccessToken($this->accessToken)
                ->withBody($body)
                ->send();
            if (0 != $response['errcode']) {
                throw new \Exception($response['errmsg'], $response['errcode']);
            }
            return $response;
        }
    }

    public function imgpic($kf_account, File $file)
    {
        if (parent::checkAccount($kf_account)) {
            if ($file->getSize() > 5 * 1048576) {
                throw new \Exception('上传头像大小超出限制,请使用5MB以内的图片作为头像');
            }
            $response = Http::request('POST', static::UPLOAD_KF_HEADIMG)->withAccessToken($this->accessToken)
                ->withBody([
                'media' => file_get_contents($file->getRealPath())
            ])->withQuery(['kf_account'=>$kf_account])
                ->send();
            if (0 != $response['errcode']) {
                throw new \Exception($response['errmsg'], $response['errcode']);
            }
            return $response;
        }
    }

    public function delete($kf_account)
    {
        if (parent::checkAccount($kf_account)) {
            $response = Http::request('GET', static::DELETE_KF)->withAccessToken($this->accessToken)
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
}