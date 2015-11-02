<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */

use Shop\Product;
use Test\Config;

class ProductTest extends PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->create(function(\Shop\Data\Product $product){
            $product->setBaseAttr('main_img',array('img','img'),null,'name','categoty')
                ->setDetail('text','text')
                ->setDetail('img','image')
                //->setProperty('id','vid')
                //->setProperty('id','vid')
                ->setSkuInfo('id',array('vid','vid'))
                //统一售价
                //->setSkuList('原价','微信价','sku_ico','sku 库存');
                //设置ｓｋｕ售价
                ->setSkuList('原价','微信价','sku_ico','sku 库存',array('id'=>'vid','id1'=>'vid1'))
                ->setAttrext(0,1,1,1)
                ->setLocation('山东省','淄博市','1111')
                ->setDeliveryInfo(1,'2222');
            return $product;
        });

        $this->assertTrue(is_string($response));
    }

    public function testUpdate()
    {
        

        //以上架
        $postage = new Product(Config::get());
        $response = $postage->update('id',function(\Shop\Data\Product $product){
            $product->setBaseAttr('main_img',array('img','img'))
                ->setDetail('text','text')
                ->setDetail('img','image')
                //->setProperty('id','vid')
                //->setProperty('id','vid')
                ->setSkuInfo('id',array('vid','vid'))
                //统一售价
                //->setSkuList('原价','微信价','sku_ico','sku 库存');
                //设置ｓｋｕ售价
                ->setSkuList('原价','微信价','sku_ico','sku 库存',array('id'=>'vid','id1'=>'vid1'))
                ->setAttrext(0,1,1,1)
                ->setLocation('山东省','淄博市','1111')
                ->setDeliveryInfo(1,'2222');
            return $product;
        },true);

        $this->assertTrue($response);

        //未上架的
        $postage = new Product(Config::get());
        $response = $postage->update('id',function(\Shop\Data\Product $product){
            $product->setBaseAttr('main_img',array('img','img'),null,'name','categoty')
                ->setDetail('text','text')
                ->setDetail('img','image')
                ->setProperty('id','vid')
                ->setProperty('id','vid')
                ->setSkuInfo('id',array('vid','vid'))
                //统一售价
                //->setSkuList('原价','微信价','sku_ico','sku 库存');
                //设置ｓｋｕ售价
                ->setSkuList('原价','微信价','sku_ico','sku 库存',array('id'=>'vid','id1'=>'vid1'))
                ->setAttrext(0,1,1,1)
                ->setLocation('山东省','淄博市','1111')
                ->setDeliveryInfo(1,'2222');
            return $product;
        });

        $this->assertTrue($response);

    }

    public function testDelete()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->delete('商品id');
        $this->assertTrue($response);
    }

    public function testGet()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->get('商品id');
        $this->assertTrue(is_array($response));
    }

    public function testGetByStatus()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getByStatus('状态');
        $this->assertTrue(is_array($response));
    }

    public function testUpdateStatus()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->updateStatus('商品id','状态');
        $this->assertTrue($response);
    }

    public function testGetSub()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getSub('cateId');
        $this->assertTrue(is_array($response));
    }

    public function testGetSku()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getSku('cateId');
        $this->assertTrue(is_array($response));
    }

    public function testGetProperty()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getProperty('cateId');
        $this->assertTrue(is_array($response));
    }
}
