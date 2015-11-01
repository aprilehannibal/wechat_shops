<?php
/**
 * Shelf.php
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
 * 商品货架
 *
 * Interface Shelf
 * @package Shop
 */
interface Shelf
{
    /**
     * 添加货架
     *
     * @param $shelfData
     * @param $shelfBanner
     * @param $shelfName
     * @return mixed
     */
    public function add($shelfData, $shelfBanner, $shelfName);

    /**
     * 删除货架
     *
     * @param int $shelfId
     * @return bool
     */
    public function delete($shelfId);

    /**
     * 修改货架
     *
     * @param $shelfData
     * @param $shelfId
     * @param $shelfBanner
     * @param $shelfName
     * @return bool
     */
    public function update($shelfData,$shelfId,$shelfBanner,$shelfName);

    /**
     * 获取所有货架
     *
     * @return mixed
     */
    public function lists();

    /**
     * 根据货架ID获取货架信息
     *
     * @param $shelfId
     * @return array
     */
    public function getById($shelfId);
}