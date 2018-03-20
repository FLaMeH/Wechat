<?php
namespace Flameh\Wechat\Poi;

use Flameh\Wechat\Wechat\AccessToken;
use Flameh\Wechat\Bridge\Http;
use think\Log;
use Doctrine\Common\Collections\ArrayCollection;

class Poi
{

    /*
     * 拉取门店类目
     */
    const MERCHANT_CATEGORY = 'https://api.weixin.qq.com/wxa/get_merchant_category';

    /*
     * 申请创建门店小程序
     */
    const CREATE_INFO = 'https://api.weixin.qq.com/wxa/apply_merchant';

    /*
     * 查询创建申请的审核结果
     */
    const AUDIT_INFO = 'https://api.weixin.qq.com/wxa/get_merchant_audit_info';

    /*
     * 修改门店信息
     */
    const MODIFY_INFO = 'https://api.weixin.qq.com/wxa/modify_merchant';

    /*
     * 添加门店
     */
    const ADD_STORE = 'https://api.weixin.qq.com/wxa/add_store';

    /*
     * 获取单个门店信息
     */
    const GET_STORE = 'https://api.weixin.qq.com/wxa/get_store_info';

    /*
     * 获取门店信息列表
     */
    const BATCHGET_STORE = 'https://api.weixin.qq.com/wxa/get_store_list';

    /*
     * 更新门店信息
     */
    const UPDATE_STORE = 'https://api.weixin.qq.com/wxa/update_store';

    /*
     * 删除门店
     */
    const DELETE_STORE = 'https://api.weixin.qq.com/wxa/del_store';

    /*
     * 从腾讯地图拉取省市区信息
     */
    const DISTRICT = 'https://api.weixin.qq.com/wxa/get_district';

    /*
     * 在腾讯地图中搜索门店
     */
    const SEARCH_MAP_POI = 'https://api.weixin.qq.com/wxa/search_map_poi';

    /*
     * 在腾讯地图中创建门店
     */
    const CREATE_MAP_POI = 'https://api.weixin.qq.com/wxa/create_map_poi';

    protected $accessToken;

    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * 拉取门店小程序类目
     *
     * @throws \Exception
     * @return \Doctrine\Common\Collections\ArrayCollection|unknown
     */
    public function merchantCategory()
    {
        $response = Http::request('GET', static::MERCHANT_CATEGORY)->withAccessToken($this->accessToken)->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }

    /**
     * 拉取省市区信息
     */
    public function getDistrict()
    {
        $response = Http::request('GET', static::DISTRICT)->withAccessToken($this->accessToken)->send();
        
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }

    /**
     * 申请创建门店
     */
    public function createMerchant()
    {}

    /**
     * 添加门店
     */
    public function addStore($data)
    {}

    /**
     * 获取门店当前状态
     *
     * @throws \Exception
     * @return \Doctrine\Common\Collections\ArrayCollection|unknown
     */
    public function getMerchantAuditInfo()
    {
        $response = Http::request('GET', static::AUDIT_INFO)->withAccessToken($this->accessToken)->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return new ArrayCollection($response['data']);
    }

    public function lists($offset = 0, $limit = 10)
    {
        $body = [
            'offset' => $offset,
            'limit' => $limit
        ];
        $response = Http::request('POST', static::BATCHGET_STORE)->withAccessToken($this->accessToken)
            ->withBody($body)
            ->send();
        if (0 != $response['errcode']) {
            throw new \Exception($response['errmsg'], $response['errcode']);
        }
        return $response;
    }
}