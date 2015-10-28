<?php
/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-10-26
 * Time: 下午12:01
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