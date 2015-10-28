<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/21
 * Time: 10:28
 */

namespace Shop;


use Shop\Foundation\Base;
use Shop\Foundation\Product as ProductInterface;
use Shop\Foundation\ShopsException;

class Product extends Base implements ProductInterface
{

    const API_CREATE = 'https://api.weixin.qq.com/merchant/create';
    const API_DELETE = 'https://api.weixin.qq.com/merchant/del';
    const API_UPDATE = 'https://api.weixin.qq.com/merchant/update';
    const API_GET = 'https://api.weixin.qq.com/merchant/get';
    const API_GET_BY_STATUS = 'https://api.weixin.qq.com/merchant/getbystatus';
    const API_UPDATE_STATUS = 'https://api.weixin.qq.com/merchant/modproductstatus';
    const API_SUB = 'https://api.weixin.qq.com/merchant/category/getsub';
    const API_SKU = 'https://api.weixin.qq.com/merchant/category/getsku';
    const API_Property = 'https://api.weixin.qq.com/merchant/category/getproperty';

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
     * @throws ShopsException
     */
    public function delete($productId)
    {
        $this->response = $this->http->jsonPost(self::API_DELETE, array('product_id'=>$productId));

        return $this->getResponse();
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
     * @throws ShopsException
     */
    public function get($productId)
    {
        $this->response = $this->http->jsonPost(self::API_GET, array('product_id'=>$productId));


        return $this->getResponse();
    }

    /**
     * 从状态获取商品
     *
     * @param int $status
     * @return mixed
     * @throws ShopsException
     */
    public function getByStatus($status = 0)
    {
        $this->response = $this->http->jsonPost(self::API_GET, array('status'=>$status));

        return $this->getResponse();
    }

    /**
     * 商品上下架
     *
     * @param $productId
     * @param int $status
     * @return bool
     * @throws ShopsException
     */
    public function updateStatus($productId, $status = 0)
    {
        $this->response = $this->http->jsonPost(self::API_UPDATE_STATUS, array(
            'product_id'=>$productId,
            'status'=>$status
        ));

        $this->getResponse();
    }

    /**
     * 获取指定分类的所有子分类
     *
     * @param $cateId
     * @return mixed
     * @throws ShopsException
     */
    public function getSub($cateId = 1)
    {
        $this->response = $this->http->jsonPost(self::API_SUB, array('cate_id'=> $cateId));

        $this->getResponse();
    }

    /**
     * 获取指定子分类的所有SKU
     *
     * @param $cateId
     * @return mixed
     * @throws ShopsException
     */
    public function getSku($cateId)
    {
        $this->response = $this->http->jsonPost(self::API_SKU, array('cate_id'=> $cateId));

        return $this->getResponse();

    }

    /**
     * 获取指定分类的所有属性
     *
     * @param $cateId
     * @return mixed
     * @throws ShopsException
     */
    public function getProperty($cateId)
    {
        $this->response = $this->http->jsonPost(self::API_Property, array('cate_id'=> $cateId));

        //dd($this);exit;

        return $this->getResponse();


    }


}