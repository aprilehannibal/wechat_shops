<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:11
 */

use Shop\Foundation\Config;
use Shop\Stock;

class StockTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $config = new Config('APPID','APPSECRET');
        $stock = new Stock($config);
        $response = $stock->add('商品id','skuinfo','数量');
        $this->assertTrue($response);
    }

    public function testReduce()
    {
        $config = new Config('APPID','APPSECRET');
        $stock = new Stock($config);
        $response = $stock->reduce('商品id','skuinfo','数量');
        $this->assertTrue($response);
    }

    public function test()
    {
        $config = new Config('APPID','APPSECRET');
        $stock = new Stock($config);
        $response = $stock->getSkuInfo(array('a'=>'a1','b'=>'b1'));
        $this->assertEquals('a:a1;b:b1',$response);
    }
}
