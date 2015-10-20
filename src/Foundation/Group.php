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
     * @param $groupName
     * @param $productList
     * @return int
     */
    public function add($groupName, array $productList);

    /**
     * 删除分组
     *
     * @param $groupId
     * @return bool
     */
    public function delete($groupId);

    /**
     * 修改分组属性
     *
     * @param $groupId
     * @param $groupName
     * @return bool
     */
    public function updateAttribute($groupId,$groupName);

    /**
     * 修改分组商品
     *
     * @param $groupId
     * @param $product
     * @return bool
     */
    public function updateProduct($groupId,$product);

    /**
     * 获得全部商品
     *
     * @return array
     */
    public function lists();

    /**
     * 根据分组ID获取分组信息
     *
     * @param $groupId
     * @return array
     */
    public function getById($groupId);
}