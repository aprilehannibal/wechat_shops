<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:11
 */
namespace Test;

use Test\Config;
use Shop\Stock;

class StockTest extends \PHPUnit_Framework_TestCase
{
//    /**
//     * @depends ProductTest::testCreate
//     * @depends testGetSkuInfo
//     */
    public function testAdd()
    {
        $productId = 'pe4OowbHVULEWICFN1t6iy2BPWXA';
        $skuInfo = '';
        
        $stock = new Stock(Config::get());
        $response = $stock->add($productId,100);
        $this->assertTrue($response);

        $stock = new Stock(Config::get());
        $response = $stock->add($productId,'100');
        $this->assertTrue($response);
    }

//    /**
//     * @depends ProductTest::testCreate
//     * @depends testGetSkuInfo
//     */
    public function testReduce()
    {

        $productId = 'pe4OowbHVULEWICFN1t6iy2BPWXA';
        $skuInfo = '';
        
        $stock = new Stock(Config::get());
        $response = $stock->reduce($productId,100);
        $this->assertTrue($response);

        $stock = new Stock(Config::get());
        $response = $stock->reduce($productId,100);
        $this->assertTrue($response);
    }

    public function testGetSkuInfo()
    {
        
        $stock = new Stock(Config::get());
        $data = $stock->getSkuInfo(array('a'=>'a1','b'=>'b1'));
        $this->assertEquals('a:a1;b:b1',$data);
    }
}
