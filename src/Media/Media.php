<?php
namespace ISeeCoo\Wechat\Media;

use ISeeCoo\Wechat\Wechat\AccessToken;
use ISeeCoo\Wechat\Bridge\Http;
use think\File;
use think\Log;

/**
 * 临时素材
 *
 * @author huang
 *        
 */
class Media
{

    // 上传
    const ADD_URL = 'https://api.weixin.qq.com/cgi-bin/media/upload';

    // 获取
    const GET_URL = 'https://api.weixin.qq.com/cgi-bin/media/get';

    // 上传图片
    const ADD_IMG_URL = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg';

    /**
     * ISeeCoo\Wechat\Wechat\AccessToken
     */
    protected $accessToken;

    protected $allowedType = [
        'image',
        'voice',
        'video',
        'thumb'
    ];

    /**
     * 构造方法
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function addImg($param, File $file)
    {
        $response = Http::request('POST', static::ADD_IMG_URL)->withAccessToken($this->accessToken)
            ->withBuffer($param, $file)
            ->send();
        if ($response['errcode'] != 0) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }

    public function addMedia($file, $type)
    {
        $query = [];
        if (in_array($type, $this->allowedType)) {
            $query = [
                'type' => $type
            ];
        } else {
            throw new \Exception('文件类型出错');
        }
        $response = Http::request('POST', static::ADD_URL)->withAccessToken($this->accessToken)
            ->withQuery($query)
            ->withBuffer('media', $file)
            ->send();
        if ($response['errcode'] != 0) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }

    public function getMedia($mediaid)
    {
        $query = [
            'media_id' => $mediaid
        ];
        $response = Http::request('GET', static::GET_URL)->withAccessToken($this->accessToken)
            ->withQuery($query)
            ->send();
        if ($response['errcode'] != 0) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }
}