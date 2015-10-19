<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 20:09
 */

namespace Shop\Foundation;

/**
 * 订单管理
 *
 * Interface Order
 * @package Shop
 */
interface Order
{
    /**
     * 根据订单ID获取订单详情
     *
     * @param $orderId
     * @return array
     */
    public function getById($orderId);

    /**
     * 根据订单状态/创建时间获取订单详情
     *
     * @param null $status
     * @param null $beginTime
     * @param null $endTime
     * @return array
     */
    public function getByAttribute($status = null, $beginTime = null, $endTime = null);

    /**
     * 设置发货信息
     *
     * @param $orderId
     * @param null $deliveryCompany
     * @param null $deliveryTrackNo
     * @param int $needDelivery
     * @param null $isOthers
     * @return bool
     */
    public function setDelivery($orderId,$deliveryCompany = null,$deliveryTrackNo = null,$needDelivery = 1,$isOthers = null);

    /**
     * 关闭订单
     *
     * @param $orderId
     * @return bool
     */
    public function close($orderId);
}