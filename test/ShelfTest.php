<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */
namespace Test;


use Test\Config;
use Shop\Data\Shelf as ShelfData;
use Shop\Shelf;

class ShelfTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->add(function(ShelfData $shelf){
            return $shelf;
        },'banner','name');
        $this->assertTrue(is_string($response));

        return $response;
    }

    /**
     * @depends testAdd
     */
    public function testDelete($shelfId)
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->delete($shelfId);
        $this->assertTrue($response);
    }

    /**
     * @depends testAdd
     */
    public function testUpdate($shelfId)
    {
        //todo 还有个大依赖呢
        $shelf = new Shelf(Config::get());
        $response = $shelf->update(function(ShelfData $shelf){
            return $shelf;
        },$shelfId,'banner','name');

        $this->assertTrue($response);
    }

    public function testLists()
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->lists();
        $this->assertTrue(is_array($response));
    }

    /**
     * @depends testAdd
     */
    public function testGetById($shelfId)
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->getById($shelfId);
        $this->assertTrue(is_array($response));
    }
}
