#Order

##初始化

```php
$group = new \Shop\Order($config);
```
> $config 参见　[初始化](init.md)!!!

##Const

```PHP
const EMS = 'Fsearch_code';     //EMS
const STO = '002shentong';      //申通
const ZTO = '066zhongtong';　   //中通
const YTO = '056yuantong';　    //圆通
const TTK = '042tiantian';　    //天天快递
const SF = '003shunfeng';　     //顺丰
const YUN_DA = '059Yunda';　    //韵达
const ZJS = '064zhaijisong';　  //宅急送
const HUI_TONG = '020huitong';　//汇通
const YI_XUN = 'zj001yixun';　  //易迅
```

##API

```php 
//根据订单ID获取订单详情
$order->getById($orderId);
//根据订单状态/创建时间获取订单详情
$order->getByAttribute($status = null, $beginTime = null, $endTime = null);
//设置发货信息
$order->setDelivery($orderId,$deliveryCompany = null,$deliveryTrackNo = null,$needDelivery = 1,$isOthers = null);
//关闭订单
$order->close($orderId);
```

##设置发货信息

     字段　| 说明 
    ----- | -------
    $orderId | 订单ID
    $deliveryCompany | 物流公司ID(参考《物流公司ID》；
 | 当$needDelivery为0时，可不填本字段；
 | 当$needDelivery为1时，该字段不能为空；
 | 当$needDelivery为1且is_others为1时，本字段填写其它物流公司名称)
    $deliveryTrackNo | 运单ID(当$needDelivery为0时，可不填本字段；当$needDelivery为1时，该字段不能为空；�)
    $needDelivery | 商品是否需要物流(0-不需要，1-需要，无该字段默认为需要物流)
    $isOthers | 是否为　｀常量｀　之外的其它物流公司(0-否，1-是，无该字段默认为不是其它物流公司)
