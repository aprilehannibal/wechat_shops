<?php
/**
 * Base.php
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