<?php
/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-10-27
 * Time: 下午3:07
 */

namespace Shop\Data;

/**
 * 数据基类
 *
 * Class Base
 * @package Shop\Data
 */
class Base
{
    protected $data;

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __set($name,$value)
    {
        $this->data[$name] = $value;
    }
}