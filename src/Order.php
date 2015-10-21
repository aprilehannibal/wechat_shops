<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 20:24
 */

namespace Shop;

use Overtrue\Wechat\AccessToken;
use Overtrue\Wechat\Exception;
use Overtrue\Wechat\Http;
use Shop\Foundation\Order as OrderInterface;

class Order implements OrderInterface
{

    /**
     * 全局票据
     *
     * @var AccessToken
     */
    private $accessToken;

    private $http;

    /**
     * 快递
     */
    const EMS = 'Fsearch_code';
    const SHEN_TONG = '002shentong';
    const ZHONG_TONG = '066zhongtong';
    const YUAN_TONG = '056yuantong';
    const TIAN_TIAN = '042tiantian';
    const SHUN_Feng = '003shunfeng';
    const YUN_DA = '059Yunda';
    const ZHAI_JI_SONG = '064zhaijisong';
    const HUI_TONG = '020huitong';
    const YI_XUN = 'zj001yixun';


    const API_GET_BY_ID = 'https://api.weixin.qq.com/merchant/order/getbyid';
    const API_GET_BY_ATTRIBUTE = 'https://api.weixin.qq.com/merchant/order/getbyfilter';
    const API_SET_DELIVERY = 'https://api.weixin.qq.com/merchant/order/setdelivery';
    const API_CLOSE = 'https://api.weixin.qq.com/merchant/order/close';


    /**
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->http = new Http($accessToken);
    }

    /**
     * 根据订单ID获取订单详情
     *
     * @param $orderId
     * @return array
     * @throws Exception
     */
    public function getById($orderId)
    {
        $response = $this->http->jsonPost(self::API_GET_BY_ID, array('order_id'=>$orderId));

        if ($response['errcode'] == 0) {
            return $response['order'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 根据订单状态/创建时间获取订单详情
     *
     * @param null $status
     * @param null $beginTime
     * @param null $endTime
     * @return mixed
     * @throws Exception
     */
    public function getByAttribute($status = null, $beginTime = null, $endTime = null)
    {
        $response = $this->http->jsonPost(self::API_GET_BY_ATTRIBUTE, array(
            'status' => $status,
            'begintime' => $beginTime,
            'endtime' => $endTime
        ));

        if ($response['errcode'] == 0) {
            return $response['order_list'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 设置发货信息
     *
     * @param $orderId
     * @param null $deliveryCompany
     * @param null $deliveryTrackNo
     * @param int $needDelivery
     * @param null $isOthers
     * @return bool
     * @throws Exception
     */
    public function setDelivery($orderId,$deliveryCompany = null,$deliveryTrackNo = null,$needDelivery = 1,$isOthers = null)
    {

        if ($needDelivery == 1) {
            if (empty($deliveryCompany)) throw new Exception('$deliveryCompany 不需要为空');
            if (empty($deliveryTrackNo)) throw new Exception('$deliveryTrackNo 不需要为空');
        }

        if ($needDelivery != 1 && $needDelivery != 0) {
            throw new Exception('错误参数');
        }

        $isOthers = empty($isOthers) ? 0 : 1;

        $response = $this->http->jsonPost(self::API_SET_DELIVERY, array(
            'order_id' => $orderId,
            'delivery_company' => $deliveryCompany,
            'delivery_track_no' => $deliveryTrackNo,
            'need_delivery'=> $needDelivery,
            'is_others'=> $isOthers
        ));

        if ($response['errcode'] == 0) {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 关闭订单
     *
     * @param array $orderId
     * @return bool
     * @throws Exception
     */
    public function close($orderId)
    {
        $response = $this->http->jsonPost(self::API_GET_BY_ID, array('order_id'=>$orderId));

        if ($response['errcode'] == 0) {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

}