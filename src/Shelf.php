<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 22:51
 */

namespace Shop;


use Overtrue\Wechat\AccessToken;
use Overtrue\Wechat\Http;
use Shop\Foundation\Shelf as ShelfInterface;
use Overtrue\Wechat\Exception;

/**
 * 货架系统
 *
 * Class Shelf
 * @package Shop
 */
class Shelf implements ShelfInterface
{

    /**
     * @var Http
     */
    private $http;

    const API_ADD = 'https://api.weixin.qq.com/merchant/shelf/add';
    const API_DELETE = 'https://api.weixin.qq.com/merchant/shelf/del';
    const API_UPDATE = 'https://api.weixin.qq.com/merchant/shelf/mod';
    const API_LISTS = 'https://api.weixin.qq.com/merchant/shelf/getall';
    const API_GET_BY_ID = 'https://api.weixin.qq.com/merchant/shelf/getbyid';

    /**
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->http = new Http($accessToken);
    }

    /**
     * 添加货架
     *
     * @param $shelfData
     * @param $shelfBanner
     * @param $shelfName
     * @return int
     * @throws Exception
     */
    public function add($shelfData,$shelfBanner,$shelfName)
    {

        if (!($shelfData instanceof ShelfData) && !is_array($shelfData)) {
            throw new Exception('$shelfData 是数组 ，或者是 ShelfData class');
        }

        if ($shelfData instanceof ShelfData) {
            $shelfData = $shelfData->getData();
        }

        $response = $this->http->jsonPost(self::API_ADD,array(
            'shelf_data' => $shelfData,
            'shelf_banner'=>$shelfBanner,
            'shelf_name'=>$shelfName
        ));

        if ($response['errcode'] == 0) {
            return $response['shelf_id'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }

    }

    /**
     * 删除货架
     *
     * @param int $shelfId
     * @return bool
     * @throws Exception
     */
    public function delete($shelfId)
    {
        $response = $this->http->jsonPost(self::API_DELETE,array('shelf_id' => $shelfId));

        if ($response['errcode'] == 0) {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 修改货架
     *
     * @param array $shelfData
     * @param $shelfId
     * @param $shelfBanner
     * @param $shelfName
     * @return bool
     * @throws Exception
     */
    public function update($shelfData,$shelfId,$shelfBanner,$shelfName)
    {
        if (!($shelfData instanceof ShelfData) && !is_array($shelfData)) {
            throw new Exception('$shelfData 是数组 ，或者是 ShelfData class');
        }

        if ($shelfData instanceof ShelfData) {
            $shelfData = $shelfData->getData();
        }

        $response = $this->http->jsonPost(self::API_UPDATE,array(
            'shelf_id' => $shelfId,
            'shelf_data' => $shelfData,
            'shelf_banner'=>$shelfBanner,
            'shelf_name'=>$shelfName
        ));

        if ($response['errcode'] == 0) {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 获取所有货架
     *
     * @return array
     * @throws Exception
     */
    public function lists()
    {
        $response = $this->http->get(self::API_LISTS);

        if ($response['errcode'] == 0) {
            return $response['shelves'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 根据货架ID获取货架信息
     *
     * @param $shelfId
     * @return array
     * @throws Exception
     */
    public function getById($shelfId)
    {
        $response = $this->http->jsonPost(self::API_GET_BY_ID,array('shelf_id' => $shelfId));

        if ($response['errcode'] == 0) {
            return array_slice($response,2);
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }
}