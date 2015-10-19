<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 19:49
 */

namespace Shop\Foundation;

/**
 * 分组管理
 *
 * Interface Group
 * @package Shop
 */
interface Group
{
    /**
     * 添加分组
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * 删除分组
     *
     * @param array $data
     * @return mixed
     */
    public function delete(array $data);

    /**
     * 修改分组属性
     *
     * @param array $data
     * @return mixed
     */
    public function updateAttribute(array $data);

    /**
     * 修改分组商品
     *
     * @param array $data
     * @return mixed
     */
    public function updateProduct(array $data);

    /**
     * 获得全部商品
     *
     * @return mixed
     */
    public function lists();

    /**
     * 根据分组ID获取分组信息
     *
     * @param array $data
     * @return mixed
     */
    public function getById(array $data);
}