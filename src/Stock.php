<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/20
 * Time: 11:03
 */

namespace Shop;


use Overtrue\Wechat\AccessToken;
use Overtrue\Wechat\Http;
use Shop\Foundation\Stock as StockInterface;
use Overtrue\Wechat\Exception;

/**
 * Class Stock
 * @package Shop
 * @todo 后续优化 链式，魔术调用
 */
class Stock implements StockInterface
{

    private $http;

    const API_ADD = 'https://api.weixin.qq.com/merchant/stock/add';
    const API_REDUCE = 'https://api.weixin.qq.com/merchant/stock/reduce';

    public function __construct(AccessToken $accessToken)
    {
        $this->http = new Http($accessToken);
    }

    /**
     * 增加库存
     *
     * @param $productId
     * @param array $skuInfo
     * @param $quantity
     * @return bool
     * @throws Exception
     */
    public function add($productId, array $skuInfo, $quantity)
    {
        $response = $this->http->jsonPost(self::API_ADD,array(
            'product_id' => $productId,
            'sku_info' => $this->getSkuInfo($skuInfo),
            'quantity' => $quantity
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }

    }

    /**
     * 减少库存
     *
     * @param array $productId
     * @param array $skuInfo
     * @param $quantity
     * @return bool
     * @throws Exception
     */
    public function reduce($productId, array $skuInfo, $quantity)
    {
        $response = $this->http->jsonPost(self::API_REDUCE,array(
            'product_id' => $productId,
            'sku_info' => $this->getSkuInfo($skuInfo),
            'quantity' => $quantity
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
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