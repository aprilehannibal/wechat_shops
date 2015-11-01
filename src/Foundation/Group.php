<?php
/**
 * Group.php
 *
 * Part of Overtrue\Wechat.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    a939638621 <a939638621@hotmail.com>
 * @copyright 2015 a939638621 <a939638621@hotmail.com>
 * @link      https://github.com/a939638621
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
    public function updateAttribute($groupId, $groupName);

    /**
     * 修改分组商品
     *
     * @param $groupId
     * @param $product
     * @return bool
     */
    public function updateProduct($groupId, array $product);

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