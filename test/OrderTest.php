<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午4:51
 */
namespace Test;

use Test\Config;
use Shop\Order;

class OrderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetById()
    {
        $orderId = '13954548010111875781';

        $order = new Order(Config::get());
        $response = $order->getById($orderId);

        $this->assertTrue(is_array($response));

        return $orderId;

    }


    public function testGetByAttribute()
    {
        
        $order = new Order(Config::get());
        $response = $order->getByAttribute(2,time()-1000,time());

        $this->assertTrue(is_array($response));

        $order = new Order(Config::get());
        $response = $order->getByAttribute();

        $this->assertTrue(is_array($response));

        return $response;

    }

    /**
     * @depends testGetById
     */
    public function testSetDelivery($orderId)
    {

        /**
         *  setDelivery($orderId,$deliveryCompany = null,$deliveryTrackNo = null,$isOthers = 0)
         */
        $order = new Order(Config::get());
        $response = $order->setDelivery($orderId);
        $this->assertTrue($response);
    }

    /**
     * @depends testGetById
     */
    public function testClose($orderId)
    {
        
        $order = new Order(Config::get());
        $response = $order->close($orderId);
        $this->assertTrue($response);
    }
}
