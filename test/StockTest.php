<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:11
 */


use Test\Config;
use Shop\Stock;

class StockTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        
        $stock = new Stock(Config::get());
        $response = $stock->add('商品id','skuinfo','数量');
        $this->assertTrue($response);
    }

    public function testReduce()
    {
        
        $stock = new Stock(Config::get());
        $response = $stock->reduce('商品id','skuinfo','数量');
        $this->assertTrue($response);
    }

    public function test()
    {
        
        $stock = new Stock(Config::get());
        $response = $stock->getSkuInfo(array('a'=>'a1','b'=>'b1'));
        $this->assertEquals('a:a1;b:b1',$response);
    }
}
