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


    public function testAdd()
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->add('模板名称',function(TopFee $topFee){
            $topFee->setNormal('起始计费数量','起始计费金额','递增数量','递增费用')
                ->setCustom('起始计费数量','起始计费金额','递增数量','递增费用',array('江苏省','浙江省','上海市'))
                ->setTopFee('快递类型ID');
            return $topFee;
        },'支付方式','计费方式');

        $this->assertTrue(is_string($response));

        return $response;
    }

    /**
     * @depends testAdd
     */
    public function testDelete($templateId)
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->delete($templateId);
        $this->assertTrue($response);
    }

    /**
     * @depends testAdd
     */
    public function testUpdate($templateId)
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->update($templateId,'模板名称',function(TopFee $topFee){
            $topFee->setNormal('起始计费数量','起始计费金额','递增数量','递增费用')
                ->setCustom('起始计费数量','起始计费金额','递增数量','递增费用',array('江苏省','浙江省','上海市'))
                ->setTopFee('快递类型ID');
            return $topFee;
        },'支付方式','计费方式');

        $this->assertTrue($response);
    }

    /**
     * @depends testAdd
     */
    public function testGetById($templateId)
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->getById($templateId);
        $this->assertTrue(is_array($response));
    }

    public function testLists()
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->lists();
        $this->assertTrue(is_array($response));
    }

}
