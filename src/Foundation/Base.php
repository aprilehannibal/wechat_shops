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

namespace Shop\Foundation;


class Base
{
    /**
     * @var Object Http
     */
    protected $http;

    /**
     * @var array|bool
     */
    protected $response;

    /**
     * 初始化
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->http = empty($config->http) ? $config->getConfig()->http : $config->http ;
    }

    /**
     * 获得响应
     *
     * @param array $response
     * @return bool|array
     * @throws ShopsException
     */
    protected function getResponse($response = array())
    {
        $response = empty($response) ? $this->response : $response ;

        if ($response['errcode'] == 0) {

            if (count($response) == 2) return true;
            if (count($response) == 3) {
                $key = array_keys($response);

                return $response[$key[2]];
            }

        } else {
            throw new ShopsException($response['errmsg'],$response['errcode']);
        }
    }
}