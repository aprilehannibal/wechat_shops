<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */
namespace Test;


use Shop\Product;
use Test\Config;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @depends \Test\Data\ProductTest::testGetData
     */
    public function testCreate($data)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->create($data);

        $this->assertTrue(is_string($response));

        return $response;
    }

    /**
     * @depends testCreate
     * @depends \Test\Data\ProductTest::testGetData
     */
    public function testUpdate($productId,$data)
    {
        

        //以上架
        $postage = new Product(Config::get());
        $response = $postage->update($productId,$data,true);

        $this->assertTrue($response);

        //未上架的
        $postage = new Product(Config::get());
        $response = $postage->update($productId,$data);

        $this->assertTrue($response);

    }

    /**
     * @depends testCreate
     */
    public function testDelete($productId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->delete($productId);
        $this->assertTrue($response);
    }

    /**
     * @depends testCreate
     */
    public function testGet($productId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->get($productId);
        $this->assertTrue(is_array($response));
    }

    public function testGetByStatus()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getByStatus();
        $this->assertTrue(is_array($response));
    }

    /**
     * @depends testCreate
     */
    public function testUpdateStatus($productId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->updateStatus($productId,0);
        $this->assertTrue($response);
    }

    public function testGetSub()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getSub();

        $this->assertTrue(is_array($response));

        foreach ($response as $value) {
            $this->assertArrayHasKey('id',$value);
            $this->assertArrayHasKey('name',$value);
        }

        ;

        $postage = new Product(Config::get());
        $response = $postage->getSub(537891948);

        $this->assertTrue(is_array($response));

        foreach ($response as $value) {
            $this->assertArrayHasKey('id',$value);
            $this->assertArrayHasKey('name',$value);
        }

        return $response[2]['id'];
    }

    /**
     * @depends testGetSub
     */
    public function testGetSku($cateId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getSku($cateId);
        $this->assertTrue(is_array($response));

        return $response;
    }

    /**
     * @depends testGetSub
     */
    public function testGetProperty($cateId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getProperty($cateId);
        $this->assertTrue(is_array($response));

        return $response;

    }
}
