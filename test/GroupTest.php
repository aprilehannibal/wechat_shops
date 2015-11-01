<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午3:18
 */

use Shop\Group;
use Shop\Foundation\Config;

class GroupTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $config = new Config('appid','appsecret');
        $group = new Group($config);
        $response = $group->add('分组名',array('商品ID','商品id'));
        $this->assertTrue(is_string($response));

    }

    public function testDelete()
    {
        $config = new Config('appid','appsecret');
        $group = new Group($config);
        $response = $group->delete('分组id');
        $this->assertTrue($response);

    }

    public function testUpdateAttribute()
    {
        $config = new Config('appid','appsecret');
        $group = new Group($config);
        $response = $group->updateAttribute('分组id','分组名');
        $this->assertTrue($response);
    }

    public function testUpdateProduct()
    {
        $config = new Config('appid','appsecret');
        $group = new Group($config);
        $response = $group->updateProduct('分组id',array('商品ID','商品id'));
        $this->assertTrue($response);

    }

    public function testLists()
    {
        $config = new Config('appid','appsecret');
        $group = new Group($config);
        $response = $group->lists();
        $this->assertTrue(is_array($response));
    }

    public function testGetById()
    {
        $config = new Config('appid','appsecret');
        $group = new Group($config);
        $response = $group->getById('分组id');
        $this->assertTrue(is_array($response));
    }

}
