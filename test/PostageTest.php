<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */
namespace Test;


use Test\Config;
use Shop\Postage;
use Shop\Data\TopFee;

class PostageTest extends \PHPUnit_Framework_TestCase
{

    public function topfee($arry = false)
    {
        $topfee = new TopFee();
        $topfee->setNormal('1','10','1','5')
            ->setCustom('2','10','2','5','浙江省')
            ->setTopFee();

        if ($arry) $topfee->getData();

        return $topfee;
    }


//    /**
//     * @depends \Test\Data\TopFeeTest::testSetTopFee
//     */
    public function testAdd()
    {
        $topfee = $this->topfee();

        $postage = new Postage(Config::get());
        $response[0] = $postage->add('test1',function(TopFee $topFeedata) use ($topfee) {
            return $topfee;
        },0,0);

        $this->assertTrue(is_numeric($response[0]));

        $postage = new Postage(Config::get());
        $response[1] = $postage->add('test2',$this->topfee(true),0,0);

        $this->assertTrue(is_numeric($response[1]));

        return $response;
    }

    /**
     * @depends testAdd
     */
    public function testDelete($templateId)
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->delete($templateId[0]);
        $this->assertTrue($response);
    }

//    /**
//     * @depends testAdd
//     * @depends \Test\Data\TopFeeTest::testSetTopFee
//     */
    /**
     * @depends testAdd
     */
    public function testUpdate($templateId)
    {
        $topfee  = $this->topfee();

        $postage = new Postage(Config::get());
        $response = $postage->update($templateId[1],'test',function(TopFee $topFeeData) use ($topfee){
            return $topfee;
        },0,0);

        $this->assertTrue($response);

        $postage = new Postage(Config::get());
        $response = $postage->update($templateId[1],'test',$this->topfee(true),0,0);

        $this->assertTrue($response);
    }

    /**
     * @depends testAdd
     */
    public function testGetById($templateId)
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->getById($templateId[1]);
        $this->assertTrue(is_array($response));
    }

    public function testLists()
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->lists();
        $this->assertTrue(is_array($response));
    }

}
