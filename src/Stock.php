<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/20
 * Time: 11:03
 */

namespace Shop;


use Shop\Foundation\Base;
use Shop\Foundation\Stock as StockInterface;
use Shop\Foundation\ShopsException;

/**
 * Class Stock
 * @package Shop
 * @todo 后续优化 链式，魔术调用
 */
class Stock extends Base implements StockInterface
{

    const API_ADD = 'https://api.weixin.qq.com/merchant/stock/add';
    const API_REDUCE = 'https://api.weixin.qq.com/merchant/stock/reduce';

    /**
     * 增加库存
     *
     * @param $productId
     * @param array $skuInfo
     * @param $quantity
     * @return bool
     * @throws ShopsException
     */
    public function add($productId, array $skuInfo, $quantity)
    {
        $this->response = $this->http->jsonPost(self::API_ADD,array(
            'product_id' => $productId,
            'sku_info' => $this->getSkuInfo($skuInfo),
            'quantity' => $quantity
        ));

        return $this->getResponse();

    }

    /**
     * 减少库存
     *
     * @param array $productId
     * @param array $skuInfo
     * @param $quantity
     * @return bool
     * @throws ShopsException
     */
    public function reduce($productId, array $skuInfo, $quantity)
    {
        $this->response = $this->http->jsonPost(self::API_REDUCE,array(
            'product_id' => $productId,
            'sku_info' => $this->getSkuInfo($skuInfo),
            'quantity' => $quantity
        ));

        return $this->getResponse();
    }

    /**
     * 拼装 SkuInfo Str
     *
     * @param array $skuInfo
     * @return string
     */
    private function getSkuInfo(array $skuInfo)
    {
        $str = '';

        $i = 0;
        foreach ($skuInfo as $k => $v) {
            if (count($skuInfo) > $i) {
                $str.= $k.':'.$v.';';
            } else {
                $str.= $k.':'.$v;
            }

        }

        return $str;
    }
}