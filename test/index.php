<?php
/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-10-23
 * Time: 下午3:02
 */

require "../vendor/autoload.php";

$appId = 'appId';
$appSecret = 'appSecret';

$config = new \Shop\Foundation\Config('1','2');

$prodcutData = new \Shop\Data\Product();
$prodcutData1 = new \Shop\Data\Product(true);

$prodcut = new \Shop\Product($config);

//创建商品
$prodcut->create(function(\Shop\Data\Product $product){
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

//修改以上架　商品
$prodcut->update('id',function(\Shop\Data\Product $product){
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

//修改未上架的
$prodcut->update('id',function(\Shop\Data\Product $product){
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
