<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午3:18
 */
namespace Test;

use Shop\Group;
use Test\Config;

class GroupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @depends ProductTest::testCreate
     * @depends ProductTest::testCreate
     */
    public function testAdd($productId,$productId2)
    {
        $group = new Group(Config::get());
        $response = $group->add('分组名',array($productId,$productId2));
        $this->assertTrue(is_string($response));

        return $response;
    }

    /**
     * @depends testAdd
     */
    public function testDelete($groupId)
    {
        $group = new Group(Config::get());
        $response = $group->delete($groupId);
        $this->assertTrue($response);

    }

    /**
     * @depends testAdd
     */
    public function testUpdateAttribute($groupId)
    {
        $group = new Group(Config::get());
        $response = $group->updateAttribute($groupId,'分组名');
        $this->assertTrue($response);
    }

    /**
     * @depends testAdd
     * @depends ProductTest::testCreate
     * @depends ProductTest::testCreate
     */
    public function testUpdateProduct($groupId,$productId,$productId2)
    {
        $group = new Group(Config::get());
        $response = $group->updateProduct($groupId,array($productId,$productId2));
        $this->assertTrue($response);

    }

    public function testLists()
    {
        $group = new Group(Config::get());
        $response = $group->lists();
        $this->assertTrue(is_array($response));
    }

    /**
     * @depends testAdd
     */
    public function testGetById($groupId)
    {
        $group = new Group(Config::get());
        $response = $group->getById($groupId);
        $this->assertTrue(is_array($response));
    }

}
