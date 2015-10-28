<?php
/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-10-25
 * Time: 下午4:18
 */

namespace Shop\Foundation;

use Exception;

/**
 * 异常类
 *
 * Class ShopsException
 * @package Shop
 */
class ShopsException extends Exception
{
    function __construct($message,$code = null)
    {
        if (!empty($code)) $message = '[Wechat]错误信息：'.$message.'错误代码：'.$code;

        parent::__construct($message);
    }

}