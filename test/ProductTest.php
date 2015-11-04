<?php

/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-11-1
 * Time: 下午5:10
 */
namespace Test;


use Shop\Product;
use Test\Config;

class ProductTest extends \PHPUnit_Framework_TestCase
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

        return $response;
    }

    /**
     * @depends testCreate
     */
    public function testUpdate($productId)
    {
        

        //以上架
        $postage = new Product(Config::get());
        $response = $postage->update($productId,function(\Shop\Data\Product $product){
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
        $response = $postage->update($productId,function(\Shop\Data\Product $product){
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

    /**
     * @depends testCreate
     */
    public function testDelete($productId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->delete($productId);
        $this->assertTrue($response);
    }

    /**
     * @depends testCreate
     */
    public function testGet($productId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->get($productId);
        $this->assertTrue(is_array($response));
    }

    public function testGetByStatus()
    {
        
//        $postage = new Product(Config::get());
//        $response = $postage->getByStatus();
//        $this->assertTrue($response);
//        $this->assertTrue(is_array($response));

        $data = array('a','b');
        $jsonData = '{"errcode":0,"errmsg":"ok","products_info":[{"product_base":{"name":"测试商品，请勿购买！！！！！！！！","category_id":[536891949],"img":["http:\/\/mmbiz.qpic.cn\/mmbiz\/J5uBLiaU5Y8AxGSFwuAHB4G8CS3Z6A4EH2VYhiaZCKiaXZW7VnFH3KDV5O7nGYf9NZjZlJD7hTkqnu8WjP11sIRRQ\/0?wx_fmt=jpeg","http:\/\/mmbiz.qpic.cn\/mmbiz\/J5uBLiaU5Y8AxGSFwuAHB4G8CS3Z6A4EH2VYhiaZCKiaXZW7VnFH3KDV5O7nGYf9NZjZlJD7hTkqnu8WjP11sIRRQ\/0?wx_fmt=jpeg"],"detail":[],"property":[{"id":"图案","vid":"纯色"},{"id":"品牌","vid":"Aee\/爱意"},{"id":"适合季节","vid":"冬"},{"id":"鞋面主材","vid":"袋鼠皮"},{"id":"跟高","vid":"高跟(5-8cm)"},{"id":"鞋头款式","vid":"扁头"},{"id":"鞋跟形状","vid":"厚底跟"},{"id":"帮高","vid":"高帮"},{"id":"闭合方式","vid":"搭扣"},{"id":"制作工艺","vid":"硫化"},{"id":"开口深度","vid":"深口（11cm以上）"},{"id":"上市年份","vid":"2012秋季"},{"id":"风格","vid":"海军"},{"id":"货号","vid":"其他"},{"id":"鞋底材质","vid":"木质底"},{"id":"皮革风格","vid":"打蜡皮"},{"id":"内里材质","vid":"棉质"},{"id":"流行元素","vid":"T形绑带"}],"sku_info":[],"buy_limit":10,"main_img":"http:\/\/mmbiz.qpic.cn\/mmbiz\/J5uBLiaU5Y8AxGSFwuAHB4G8CS3Z6A4EH2VYhiaZCKiaXZW7VnFH3KDV5O7nGYf9NZjZlJD7hTkqnu8WjP11sIRRQ\/0?wx_fmt=jpeg","detail_html":"<p style=\"margin-bottom:11px;margin-top:11px;\"><\/p><div class=\"item_pic_wrp\" style=\"margin-bottom:8px;font-size:0;\"><img class=\"item_pic\" style=\"width:100%;\" alt=\"\" src=\"http:\/\/mmbiz.qpic.cn\/mmbiz\/J5uBLiaU5Y8AxGSFwuAHB4G8CS3Z6A4EH2VYhiaZCKiaXZW7VnFH3KDV5O7nGYf9NZjZlJD7hTkqnu8WjP11sIRRQ\/0?wx_fmt=jpeg\" ><\/div><p style=\"margin-bottom:11px;margin-top:11px;\">测试商品 请勿购买！！！！！！！！！！！！！！<br>测试商品 请勿购买！！！！！！！！！！！！！！<br>测试商品 请勿购买！！！！！！！！！！！！！！<br>测试商品 请勿购买！！！！！！！！！！！！！！<\/p>"},"sku_list":[{"sku_id":"","price":100,"icon_url":"","quantity":96,"product_code":"","ori_price":15000}],"delivery_info":{"delivery_type":0,"template_id":0,"weight":0,"volume":0,"express":[{"id":10000027,"price":0},{"id":10000028,"price":0},{"id":10000029,"price":0}]},"product_id":"pe4OowbHVULEWICFN1t6iy2BPWXA","status":2,"attrext":{"isPostFree":1,"isHasReceipt":1,"isUnderGuaranty":1,"isSupportReplace":0,"location":{"country":"中国","province":"山东","city":"济南","address":""}}}]}';

//        $contents = json_decode(
//            substr(
//                str_replace(
//                    array('\"', '\\\\'),
//                    array('"', ''),
//                    json_encode($jsonData)
//                ),
//                1,
//                -1
//            ),
//            true
//        );

        $contents = json_decode($jsonData,true);

        $this->assertJson($contents,'不是json');
        $this->assertTrue(is_array($contents));
//        $arr = json_decode($jsonData);
//        $this->assertTrue(is_array($arr));
    }

    /**
     * @depends testCreate
     */
    public function testUpdateStatus($productId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->updateStatus($productId,'状态');
        $this->assertTrue($response);
    }

    public function testGetSub()
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getSub();

        $this->assertTrue(is_array($response));

        foreach ($response as $value) {
            $this->assertArrayHasKey('id',$value);
            $this->assertArrayHasKey('name',$value);
        }

        ;

        $postage = new Product(Config::get());
        $response = $postage->getSub(537891948);

        $this->assertTrue(is_array($response));

        foreach ($response as $value) {
            $this->assertArrayHasKey('id',$value);
            $this->assertArrayHasKey('name',$value);
        }

        return $response[2]['id'];
    }

    /**
     * @depends testGetSub
     */
    public function testGetSku($cateId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getSku($cateId);
        $this->assertTrue(is_array($response));
    }

    /**
     * @depends testGetSub
     */
    public function testGetProperty($cateId)
    {
        
        $postage = new Product(Config::get());
        $response = $postage->getProperty($cateId);
        $this->assertTrue(is_array($response));

    }
}
