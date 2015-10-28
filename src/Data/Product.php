<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/21
 * Time: 10:28
 */

namespace Shop\Data;


use Overtrue\Wechat\Exception;

/**
 * 商品属性
 *
 * Class ProductData
 * @package Shop
 * @property array $baseAttr
 * @property array $skuList
 * @property array $attrext
 * @property array $deliveryInfo
 * @method $this setDetail($name,$value)
 * @method $this setProperty($name,$value)
 */
class Product
{

    private $data;

    public function setBaseAttr($name, $category, $main_img, array $img, $buyLimit = null)
    {
//        if (empty($this->property)) throw new Exception('property 不允许为空');
//        if (empty($this->skuInfo)) throw new Exception('skuInfo 不允许为空');

        $this->baseAttr = array(
            'name' => $name,
            'category' => $category,
            'main_img' => $main_img,
            'img' => $img
        );

        if (!empty($buyLimit)) {
            $this->data['baseAttr']['buy_limit'] = $buyLimit;
        }

        return $this;
    }

    public function setSkuInfo($name, $value)
    {
        // '$属性' '$值'
        // 123123  '$值'
        $this->data['baseAttr']['sku_info'][][$name] = $value;

        return $this;
    }

    public function setSkuList($oriPrice, $price, $iconurl, $quantity, $skuId = null)
    {
        $this->data['skuList'][] = array(
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
            'template_id' => $templateId
        );

        return $this;
    }

    public function setExpress($id, $price)
    {
        $this->data['deliveryInfo']['express'][] = array(
            'id' => $id,
            'price' => $price
        );

        return $this;
    }

    public function getData()
    {
//        if (empty($this->baseAttr)) throw new Exception('baseAttr 不允许为空');
//        if (empty($this->skuList)) throw new Exception('skuList 不允许为空');
//        if (empty($this->attrext)) throw new Exception('attrext 不允许为空');
//        if (empty($this->deliveryInfo)) throw new Exception('deliveryInfo 不允许为空');


        return $this->data = array(
            # base_attr or product_base
            'product_base' => $this->baseAttr,
            'sku_list' => $this->skuList,
            'attrext' => $this->attrext,
            'delivery_info' => $this->deliveryInfo
        );
    }

    public function __call($method,$parameters)
    {
        if (count($parameters) != 2) throw new Exception('参数输入有误，请重新填入参数');

        $str = strstr($method,'set');

        if (!$str) {
            throw new Exception('错误方法名');
        }

        $arr = array_search(substr($method,3),array('Detail','Property'));

        dd($arr);

        if ($arr != false)
            throw new Exception('错误方法名');

        $this->baseAttr[strtolower($str[$arr])][][$parameters[0]] = $parameters[1];

        return $this;

    }
}