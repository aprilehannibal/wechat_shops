<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:13
 */
namespace Test\Data;


use Shop\Data\Shelf;

class ShelfTest extends \PHPUnit_Framework_TestCase
{
    public function testControlOne()
    {
        $shelf = new Shelf();
        $data = $shelf->controlOne('1','id','eid');
        $this->assertInstanceOf(Shelf::class,$data);
    }

    public function testControlTwo()
    {
        $shelf = new Shelf();
        $data = $shelf->controlTwo(array('商品id','商品ID'),'eid');
        $this->assertInstanceOf(Shelf::class,$data);
    }

    public function testControlThree()
    {
        $shelf = new Shelf();
        $data = $shelf->controlThree('商品ID','img','eid');
        $this->assertInstanceOf(Shelf::class,$data);
    }
    public function testControlFour()
    {
        $shelf = new Shelf();
        $data = $shelf->controlFour(array(array('商品id','img'),array('商品id','img')),'eid');
        $this->assertInstanceOf(Shelf::class,$data);
    }

    public function testControlFive()
    {
        $shelf = new Shelf();
        $data = $shelf->controlFive(array('商品id','商品ID'),'背景图','eid');
        $this->assertInstanceOf(Shelf::class,$data);
    }

}
