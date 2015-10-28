<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 20:24
 */

namespace Shop;


use Shop\Foundation\Base;
use Shop\Foundation\Order as OrderInterface;
use Shop\Foundation\ShopsException;

/**
 * 订单管理
 *
 * Class Order
 * @package Shop
 */
class Order extends Base implements OrderInterface
{

    /**
     * 快递
     */
    const EMS = 'Fsearch_code';
    const STO = '002shentong';
    const ZTO = '066zhongtong';
    const YTO = '056yuantong';
    const TTK = '042tiantian';
    const SF = '003shunfeng';
    const YUN_DA = '059Yunda';
    const ZJS = '064zhaijisong';
    const HUI_TONG = '020huitong';
    const YI_XUN = 'zj001yixun';

    const API_GET_BY_ID = 'https://api.weixin.qq.com/merchant/order/getbyid';
    const API_GET_BY_ATTRIBUTE = 'https://api.weixin.qq.com/merchant/order/getbyfilter';
    const API_SET_DELIVERY = 'https://api.weixin.qq.com/merchant/order/setdelivery';
    const API_CLOSE = 'https://api.weixin.qq.com/merchant/order/close';


    /**
     * 根据订单ID获取订单详情
     *
     * @param $orderId
     * @return array
     * @throws ShopsException
     */
    public function getById($orderId)
    {
        $this->response = $this->http->jsonPost(self::API_GET_BY_ID, array('order_id'=>$orderId));

        return $this->getResponse();
    }

    /**
     * 根据订单状态/创建时间获取订单详情
     *
     * @param null $status
     * @param null $beginTime
     * @param null $endTime
     * @return mixed
     * @throws ShopsException
     */
    public function getByAttribute($status = null, $beginTime = null, $endTime = null)
    {
        $data = array();

        if (!empty($status)) $data['status'] = $status;
        if (!empty($beginTime)) $data['begintime'] = $beginTime;
        if (!empty($endTime)) $data['endtime'] = $endTime;


        $this->response = $this->http->jsonPost(self::API_GET_BY_ATTRIBUTE, $data);

        return $this->getResponse();

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
     * @throws ShopsException
     */
    public function setDelivery($orderId,$deliveryCompany = null,$deliveryTrackNo = null,$needDelivery = 1,$isOthers = null)
    {

        if ($needDelivery == 1) {
            if (empty($deliveryCompany)) throw new ShopsException('$deliveryCompany 不需要为空');
            if (empty($deliveryTrackNo)) throw new ShopsException('$deliveryTrackNo 不需要为空');
        }

        if ($needDelivery != 1 && $needDelivery != 0) {
            throw new ShopsException('错误参数');
        }

        $isOthers = empty($isOthers) ? 0 : 1;

        $this->response = $this->http->jsonPost(self::API_SET_DELIVERY, array(
            'order_id' => $orderId,
            'delivery_company' => $deliveryCompany,
            'delivery_track_no' => $deliveryTrackNo,
            'need_delivery'=> $needDelivery,
            'is_others'=> $isOthers
        ));

        return $this->getResponse();
    }

    /**
     * 关闭订单
     *
     * @param array $orderId
     * @return bool
     * @throws ShopsException
     */
    public function close($orderId)
    {
        $this->response = $this->http->jsonPost(self::API_GET_BY_ID, array('order_id'=>$orderId));

        return $this->getResponse();
    }

}