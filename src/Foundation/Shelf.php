<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 20:00
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