<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 19:24
 */

namespace Shop\Foundation;

/**
 * 商品
 *
 * Interface Product
 * @package Shop
 */
interface Product
{
    /**
     * 查询商品
     *
     * @param array $data
     * @return mixed
     */
    public function create($data);

    /**
     * 删除商品
     *
     * @param $productId
     * @return mixed
     */
    public function delete($productId);

    /**
     * 修改商品
     *
     * @param $productId
     * @param $data
     * @param bool|false $shelf
     * @return mixed
     */
    public function update($productId,$data,$shelf = false);

    /**
     * 查询商品
     *
     * @param $productId
     * @return mixed
     */
    public function get($productId);

    /**
     * 从状态获取商品
     *
     * @param $status
     * @return mixed
     */
    public function getByStatus($status = 0);

    /**
     * 商品上下架
     *
     * @param $productId
     * @param int $status
     * @return mixed
     */
    public function updateStatus($productId, $status = 0);

    /**
     * 获取指定分类的所有子分类
     *
     * @param $cateId
     * @return mixed
     */
    public function getSub($cateId = 1);

    /**
     * 获取指定子分类的所有SKU
     *
     * @param $cateId
     * @return mixed
     */
    public function getSku($cateId);

    /**
     * 获取指定分类的所有属性
     *
     * @param $cateId
     * @return mixed
     */
    public function getProperty($cateId);
}