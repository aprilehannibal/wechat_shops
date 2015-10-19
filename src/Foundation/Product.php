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
    public function create(array $data);

    /**
     * 查询商品
     *
     * @param array $data
     * @return mixed
     */
    public function get(array $data);

    /**
     * 从状态获取商品
     *
     * @param array $data
     * @return mixed
     */
    public function getByStatus(array $data);

    /**
     * 商品上下架
     *
     * @param array $data
     * @return mixed
     */
    public function updateStatus(array $data);

    /**
     * 获取指定分类的所有子分类
     *
     * @param array $data
     * @return mixed
     */
    public function getSub(array $data);

    /**
     * 获取指定子分类的所有SKU
     *
     * @param array $data
     * @return mixed
     */
    public function getSku(array $data);

    /**
     * 获取指定分类的所有属性
     *
     * @param array $data
     * @return mixed
     */
    public function getProperty(array $data);
}