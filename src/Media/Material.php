<?php
namespace Flameh\Wechat\Media;

use Flameh\Media\Resource\ArticleList;
use Flameh\Wechat\Wechat\AccessToken;
use Flameh\Wechat\Bridge\Http;

/**
 * 永久素材
 *
 * @author huang
 *        
 */
class Material
{

    const ADD_NEWS_URL = 'https://api.weixin.qq.com/cgi-bin/material/add_news';

    const ADD_FILE_URL = 'https://api.weixin.qq.com/cgi-bin/material/add_material';

    const GET_URL = 'https://api.weixin.qq.com/cgi-bin/material/get_material';

    const DELETE_URL = 'https://api.weixin.qq.com/cgi-bin/material/del_material';

    const UPDATE_URL = 'https://api.weixin.qq.com/cgi-bin/material/update_news';

    const COUNT_URL = 'https://api.weixin.qq.com/cgi-bin/material/get_materialcount';

    const BATCH_GET_URL = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material';

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

    /*
     * 新增永久图文消息
     */
    public function addNew(ArticleList $articles)
    {
        if(sizeof($articles)<1){
            throw new \Exception('未提交数据');
        }
        $resposne = Http::request('POST', static::ADD_NEWS_URL)->withAccessToken($this->accessToken)->withBody($articles)->send();
        if(0!=$resposne['errcode']){
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $resposne;
    }

    /*
     * 新增文件类永久素材
     */
    public function addFile($file, $type)
    {}

    /*
     * 根据media_id获取永久素材
     */
    public function getMaterial($mediaid)
    {}

    /*
     * 删除永久素材
     */
    public function deleteMaterial($mediaid)
    {}

    /*
     * 更新图文永久素材
     */
    public function updateNew($mediaid, $article, $index = 0)
    {}

    /*
     * 获取永久素材总数
     */
    public function countMaterial()
    {}

    /*
     * 获取永久素材列表
     */
    public function batchgetMaterial($type, $offset, $count)
    {}
}