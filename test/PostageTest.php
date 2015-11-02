<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */
use Test\Config;
use Shop\Postage;
use Shop\Data\TopFee;

class PostageTest extends PHPUnit_Framework_TestCase
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
    }

    public function testDelete()
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->delete('模板id');
        $this->assertTrue($response);
    }

    public function testUpdate()
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->update('模板id','模板名称',function(TopFee $topFee){
            $topFee->setNormal('起始计费数量','起始计费金额','递增数量','递增费用')
                ->setCustom('起始计费数量','起始计费金额','递增数量','递增费用',array('江苏省','浙江省','上海市'))
                ->setTopFee('快递类型ID');
            return $topFee;
        },'支付方式','计费方式');

        $this->assertTrue($response);
    }

    public function testGetById()
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->getById('模板id');
        $this->assertTrue(is_array($response));
    }

    public function testLists()
    {
        
        $postage = new Postage(Config::get());
        $response = $postage->lists();
        $this->assertTrue(is_array($response));
    }

}
