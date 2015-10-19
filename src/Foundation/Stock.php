<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 19:38
 */

namespace Shop\Foundation;

/**
 * 库存
 *
 * Interface Stock
 * @package Shop
 */
interface Stock
{
    /**
     * 增加库存
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * 减少库存
     *
     * @param array $data
     * @return mixed
     */
    public function reduce(array $data);
}