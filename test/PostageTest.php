<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */

use Shop\Foundation\Config;
use Shop\Postage;
use Shop\Data\TopFee;

class PostageTest extends PHPUnit_Framework_TestCase
{


    public function testAdd()
    {
        $config = new Config('APPID','APPSECRET');
        $postage = new Postage($config);
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
        $config = new Config('APPID','APPSECRET');
        $postage = new Postage($config);
        $response = $postage->delete('模板id');
        $this->assertTrue($response);
    }

    public function testUpdate()
    {
        $config = new Config('APPID','APPSECRET');
        $postage = new Postage($config);
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
        $config = new Config('APPID','APPSECRET');
        $postage = new Postage($config);
        $response = $postage->getById('模板id');
        $this->assertTrue(is_array($response));
    }

    public function testLists()
    {
        $config = new Config('APPID','APPSECRET');
        $postage = new Postage($config);
        $response = $postage->lists();
        $this->assertTrue(is_array($response));
    }

}
