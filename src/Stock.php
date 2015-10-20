<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/20
 * Time: 11:03
 */

namespace Shop;


use Shop\Foundation\Stock as StockInterface;

class Stock implements StockInterface
{

    public function __construct

    /**
     * 增加库存
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        // TODO: Implement add() method.
    }

    /**
     * 减少库存
     *
     * @param array $data
     * @return mixed
     */
    public function reduce(array $data)
    {
        // TODO: Implement reduce() method.
    }
}