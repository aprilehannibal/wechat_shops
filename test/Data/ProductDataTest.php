<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:12
 */

use Shop\Data\Product;

class ProductDataTest extends PHPUnit_Framework_TestCase
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

    //todo 忘记写完成了！！！！！　明天继续写
}
