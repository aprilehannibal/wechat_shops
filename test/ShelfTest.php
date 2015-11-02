<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */

use Test\Config;
use Shop\Data\Shelf as ShelfData;
use Shop\Shelf;

class ShelfTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->add(function(ShelfData $shelf){
            return $shelf;
        },'banner','name');
        $this->assertTrue(is_string($response));
    }

    public function testDelete()
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->delete('货架id');
        $this->assertTrue($response);
    }

    public function testUpdate()
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->update(function(ShelfData $shelf){
            return $shelf;
        },'货架id','banner','name');

        $this->assertTrue($response);
    }

    public function testLists()
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->lists();
        $this->assertTrue(is_array($response));
    }

    public function testGetById()
    {
        
        $shelf = new Shelf(Config::get());
        $response = $shelf->getById('货架id');
        $this->assertTrue(is_array($response));
    }
}
