<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */
namespace Test;


use Overtrue\Wechat\Media;
use Test\Config;
use Shop\Data\Shelf as ShelfData;
use Shop\Shelf;

class ShelfTest extends \PHPUnit_Framework_TestCase
{
    public static function shelf($arry = false)
    {
        $groupId = '207133170';

        $shelf = new ShelfData();
        $shelf->controlTwo(array($groupId,$groupId,$groupId),2);

        if ($arry) return $shelf->getData();

        return $shelf;
    }

    public function testAdd()
    {

        $media = new Media(Config::APPID,Config::APPSECRET);

        $banner = $media->forever()->lists('image');

        $shelfData = $this->shelf();

        $shelf = new Shelf(Config::get());
        $response = $shelf->add(function(ShelfData $shelf) use ($shelfData) {
            return $shelfData;
        },file_get_contents('/home/pjxh/图片/pic_logo_1082168b92.png'),'test');
        $this->assertTrue($response);

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
        $this->assertTrue(($response));
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
