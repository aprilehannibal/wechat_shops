<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午4:51
 */

use Test\Config;
use Shop\Order;

class OrderTest extends PHPUnit_Framework_TestCase
{
    public function testGetById()
    {
        $order = new Order(Config::get());
        $response = $order->getById('订单号');
        $this->assertTrue(is_array($response));
    }

    public function testGetByAttribute()
    {
        
        $order = new Order(Config::get());
        $response = $order->getByAttribute('订单状态','订单创建时间起始时间','订单创建时间终止时间');
        $this->assertTrue(is_array($response));

    }

    public function testSetDelivery()
    {
        
        $order = new Order(Config::get());
        $response = $order->setDelivery('订单号','物流公司id','运单id','商品是否需要物流','是否是其他物流公司');
        $this->assertTrue($response);
    }

    public function test()
    {
        
        $order = new Order(Config::get());
        $response = $order->close('订单号');
        $this->assertTrue($response);
    }
}
