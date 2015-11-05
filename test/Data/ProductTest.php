<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:12
 */
namespace Test\Data;

use Shop\Data\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @depends \Test\ProductTest::testGetSub
     */
    public function testSetBaseAttr($categoryId)
    {
        $product = new Product();

        $data = $product->setBaseAttr('主图',array('图一','图二'),null,'name',$categoryId);
        $this->assertInstanceOf(Product::class,$data);

        $product = new Product(true);
        $data = $product->setBaseAttr('主图',array('图一','图二'));
        $this->assertInstanceOf(Product::class,$data);
    }

    public function testSetDetail()
    {
        $product = new Product();
        $data = $product->setDetail('img','图片');

        $this->assertInstanceOf(Product::class,$data);

        $data = $product->setDetail('text','文字');
        $this->assertInstanceOf(Product::class,$data);

    }

    /**
     * @depends \Test\ProductTest::testGetProperty
     */
    public function testSetProperty($property)
    {

        //$property

        $product = new Product();
        $data = $product->setProperty('id','vid');
        $this->assertInstanceOf(Product::class,$data);

    }

    /**
     * @depends \Test\ProductTest::testGetSku
     */
    public function testSetSkuInfo($sku)
    {
        //$sku

        $product = new Product();
        $data = $product->setSkuInfo('id',array('vid','vid'));
        $this->assertInstanceOf(Product::class,$data);
    }

    /**
     * @depends \Test\ProductTest::testGetSku
     */
    public function testSetSkuList($sku)
    {
        //$sku

        $product = new Product();
        $data = $product->setSkuList('原价','微信价','sku_ico','sku 库存',array('id'=>'vid','id1'=>'vid1'));
        $this->assertInstanceOf(Product::class,$data);
    }

    public function testSetAttrext()
    {
        $product = new Product();
        $data = $product->setAttrext(0,1,1,1);
        $this->assertInstanceOf(Product::class,$data);
    }

    /**
     * @depends RegionalTest::testGetCity
     */
    public function testSetLocation($city)
    {
        $product = new Product();
        $data = $product->setLocation('浙江省','杭州市','滨江区阿里园');
        $this->assertInstanceOf(Product::class,$data);
    }

    /**
     * @depends \Test\PostageTest::testAdd
     */
    public function testSetDeliveryInfo($templateId)
    {
        $product = new Product();
        $data = $product->setDeliveryInfo(1,$templateId);
        $this->assertInstanceOf(Product::class,$data);
    }

    public function testSetExpress()
    {
        $product = new Product();
        $data = $product->setExpress('id','price');
        $this->assertInstanceOf(Product::class,$data);
    }

    /**
     * @depends \Test\ProductTest::testGetSub
     * @depends \Test\ProductTest::testGetProperty
     * @depends \Test\ProductTest::testGetSku
     * @depends RegionalTest::testGetCity
     * @depends \Test\PostageTest::testAdd
     */
    public function testGetData($sub,$property,$sku,$city,$templateId)
    {
        $product = new Product();
        $data = $product->setBaseAttr('main_img',array('img','img'),null,'name','categoty')
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
            ->setDeliveryInfo(1,'2222')
            ->getData();
        $this->assertTrue(is_array($data));

        $product = new Product(true);
        $data = $product->setBaseAttr('main_img',array('img','img'))
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
            ->setDeliveryInfo(1,'2222')
            ->getData();
        $this->assertTrue(is_array($data));


    }
}
