<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/21
 * Time: 10:28
 */

namespace Shop;

use Overtrue\Wechat\AccessToken;
use Overtrue\Wechat\Exception;
use Overtrue\Wechat\Http;
use Shop\Foundation\Product as ProductInterface;

class Product implements ProductInterface
{

    private $http;

    const API_CREATE = 'https://api.weixin.qq.com/merchant/create';
    const API_DELETE = 'https://api.weixin.qq.com/merchant/del';
    const API_UPDATE = 'https://api.weixin.qq.com/merchant/update';
    const API_GET = 'https://api.weixin.qq.com/merchant/get';
    const API_GET_BY_STATUS = 'https://api.weixin.qq.com/merchant/getbystatus';
    const API_UPDATE_STATUS = 'https://api.weixin.qq.com/merchant/modproductstatus';
    const API_SUB = 'https://api.weixin.qq.com/merchant/category/getsub';
    const API_SKU = 'https://api.weixin.qq.com/merchant/category/getsku';
    const API_Property = 'https://api.weixin.qq.com/merchant/category/getproperty';

    public function __construct(AccessToken $accessToken)
    {
        $this->http = new Http($accessToken);
    }

    /**
     * 查询商品
     *
     * @param array $data
     * @return mixed
     */
    public function create($data)
    {
        // TODO: Implement create() method.
    }

    /**
     * 删除商品
     *
     * @param $productId
     * @return bool
     * @throws Exception
     */
    public function delete($productId)
    {
        $response = $this->http->jsonPost(self::API_DELETE, array('product_id'=>$productId));

        if ($response['errcode'] == 0) {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 修改商品
     *
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        // TODO: Implement update() method.
    }

    /**
     * 查询商品
     *
     * @param $productId
     * @return bool
     * @throws Exception
     */
    public function get($productId)
    {
        $response = $this->http->jsonPost(self::API_GET, array('product_id'=>$productId));

        if ($response['errcode'] == 0) {
            return $response['product_info'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 从状态获取商品
     *
     * @param int $status
     * @return mixed
     * @throws Exception
     */
    public function getByStatus($status = 0)
    {
        $response = $this->http->jsonPost(self::API_GET, array('status'=>$status));

        if ($response['errcode'] == 0) {
            return $response['products_info'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 商品上下架
     *
     * @param $productId
     * @param int $status
     * @return bool
     * @throws Exception
     */
    public function updateStatus($productId, $status = 0)
    {
        $response = $this->http->jsonPost(self::API_UPDATE_STATUS, array(
            'product_id'=>$productId,
            'status'=>$status
        ));

        if ($response['errcode'] == 0) {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 获取指定分类的所有子分类
     *
     * @param $cateId
     * @return mixed
     * @throws Exception
     */
    public function getSub($cateId = 1)
    {
        $response = $this->http->jsonPost(self::API_SUB, array('cate_id'=> $cateId));

        if ($response['errcode'] == 0) {
            return $response['cate_list'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 获取指定子分类的所有SKU
     *
     * @param $cateId
     * @return mixed
     * @throws Exception
     */
    public function getSku($cateId)
    {
        $response = $this->http->jsonPost(self::API_SKU, array('cate_id'=> $cateId));

        if ($response['errcode'] == 0) {
            return $response['sku_table'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 获取指定分类的所有属性
     *
     * @param $cateId
     * @return mixed
     * @throws Exception
     */
    public function getProperty($cateId)
    {
        $response = $this->http->jsonPost(self::API_Property, array('cate_id'=> $cateId));

        if ($response['errcode'] == 0) {
            return $response['properties'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }


}