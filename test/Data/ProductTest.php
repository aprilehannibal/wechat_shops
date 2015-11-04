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
    public function testSetBaseAttr()
    {
        $product = new Product();

        $data = $product->setBaseAttr('主图',array('图一','图二'),null,'name','分类');
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

    public function testSetProperty()
    {
        $product = new Product();
        $data = $product->setProperty('id','vid');
        $this->assertInstanceOf(Product::class,$data);

    }

    public function testSetSkuInfo()
    {
        $product = new Product();
        $data = $product->setSkuInfo('id',array('vid','vid'));
        $this->assertInstanceOf(Product::class,$data);
    }

    public function testSetSkuList()
    {
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

    public function testSetLocation()
    {
        $product = new Product();
        $data = $product->setLocation('浙江省','杭州市','滨江区阿里园');
        $this->assertInstanceOf(Product::class,$data);
    }

    public function testSetDeliveryInfo()
    {
        $product = new Product();
        $data = $product->setDeliveryInfo(1,'2222');
        $this->assertInstanceOf(Product::class,$data);
    }

    public function testSetExpress()
    {
        $product = new Product();
        $data = $product->setExpress('id','price');
        $this->assertInstanceOf(Product::class,$data);
    }

    public function testGetData()
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
        $this->assertTrue(is_array($data));

    }
}
