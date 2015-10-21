<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/21
 * Time: 10:28
 */

namespace Shop;


use Overtrue\Wechat\Exception;

/**
 * Class ProductData
 * @package Shop
 * @property array $detail
 * @property array $property
 * @property array $skuInfo
 * @property array $baseAttr
 * @property array $skuList
 * @property array $attrext
 * @property array $deliveryInfo
 * @property array $express
 */
class ProductData
{

    private $data;

    public function setBaseAttr($name, $category, $main_img, $img,$buyLimit = NULL)
    {

        if (empty($this->detail)) throw new Exception('detail 不允许为空');
        if (empty($this->property)) throw new Exception('property 不允许为空');
        if (empty($this->skuInfo)) throw new Exception('skuInfo 不允许为空');

        $this->baseAttr = array(
            'name' => $name,
            'category' => $category,
            'main_img' => $main_img,
            'img' => $img,
            'detail' => $this->detail,
            'property' => $this->property,
            'sku_info' => $this->skuInfo,
            'buy_limit' => $buyLimit
        );

        return $this;
    }

    public function setDetail($name, $value)
    {
        if (!array_search($name,['text','img'])) throw new Exception('请正确填写参数名称');

        $this->detail[][$name] = $value;

        return $this;
    }

    public function setProperty($name, $value)
    {
        // '$属性' '$值'
        // 123123  '$值'
        $this->property[][$name] = $value;

        return $this;
    }

    public function setSkuInfo($name, $value)
    {
        // '$属性' '$值'
        // 123123  '$值'
        $this->skuInfo[][$name] = $value;

        return $this;
    }

    public function setSkuList($oriPrice, $price, $iconurl, $quantity, $skuId = null)
    {
        $this->skuList[] = array(
            'sku_id' => $skuId,
            'ori_price' => $oriPrice,
            'price' => $price,
            'icon_url' => $iconurl,
            'quantity' => $quantity
        );

        return $this;
    }

    public function setAttrext($isPostFree, $isHasReceipt, $isUnderGuaranty, $isSupportReplace, $country, $province, $city, $address)
    {
        $this->attrext = array(
            'isPostFree' => $isPostFree,
            'isHasReceipt' => $isHasReceipt,
            'isUnderGuaranty' => $isUnderGuaranty,
            'isSupportReplace' => $isSupportReplace,
            'location' => array(
                'country' => $country,
                'province' => $province,
                'city' => $city,
                'address' => $address
            )
        );

        return $this;
    }

    public function setDeliveryInfo($deliveryType, $templateId)
    {
        if (empty($this->express)) throw new Exception('express 不允许为空');

        $this->deliveryInfo = array(
            'delivery_type' => $deliveryType,
            'template_id' => $templateId,
            'express' => $this->express
        );

        return $this;
    }

    public function setExpress($id, $price)
    {
        $this->express[] = array(
            'id' => $id,
            'price' => $price
        );

        return $this;
    }

    public function getData()
    {
        if (empty($this->baseAttr)) throw new Exception('baseAttr 不允许为空');
        if (empty($this->skuList)) throw new Exception('skuList 不允许为空');
        if (empty($this->attrext)) throw new Exception('attrext 不允许为空');
        if (empty($this->deliveryInfo)) throw new Exception('deliveryInfo 不允许为空');


        return $this->data = array(
            # base_attr or product_base
            'product_base' => $this->baseAttr,
            'sku_list' => $this->skuList,
            'attrext' => $this->attrext,
            'delivery_info' => $this->deliveryInfo
        );
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __set($name,$value)
    {
        $this->data[$name] = $value;
    }

    public function __call($method,$parameters)
    {
        //todo 明天很多方法改用 __call 方法
    }
}