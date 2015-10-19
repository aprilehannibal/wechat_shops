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
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * 删除货架
     *
     * @param array $data
     * @return mixed
     */
    public function delete(array $data);

    /**
     * 修改货架
     *
     * @param array $data
     * @return mixed
     */
    public function update(array $data);

    /**
     * 获取所有货架
     *
     * @return mixed
     */
    public function lists();

    /**
     * 根据货架ID获取货架信息
     *
     * @param array $data
     * @return mixed
     */
    public function getById(array $data);
}