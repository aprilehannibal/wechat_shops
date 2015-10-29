#Postage

##初始化

```php
$postage = new \Shop\Postage($config);
```
> $config 参见　[初始化](init.md)!!!

##Const

```php
const PING_YOU = '10000027';
const KUAI_DI = '10000028';
const EMS = '10000029';
```

##Api 

```php    
$postage->add($name, $topFee, $assumer = 0, $valuation = 0)
$postage->delete($templateId)
$postage->update($templateId, $name, $topFee, $assumer = 0, $valuation = 0)
$postage->getById($templateId)
$postage->lists()
```

## $topFee

###第一种

```php
$topFee = new \Shop\Data\Postage();

$topFee->setNormal($startStandards, $startFees, $addStandards, $addFees)
    ->setCustom($startStandards, $startFees, $addStandards, $addFees,$destProvince, $destCity,$destCountry = '中国')
    ->setTopFee($type = \Shop\Postage::KUAI_DI);

//整个广东省    
$topFee->setNormal(1,1,1,1)
    ->setCustom('1','1','1','1','广东省',new \Shop\Data\Regional())
    ->setTopFee();
    
//整个江浙沪
$topFee->setNormal(1,2,3,4)
    ->setCustom(1,2,3,4,array('浙江省','江苏省','上海市'),new \Shop\Data\Regional())
    ->setTopFee();

//仅　海南省 海口市
$topFee->setNormal(1,1,1,1)
    ->setCustom('1','1','1','1','海南省','海口市')
    ->setTopFee();
    
//仅　湖南省的　长沙市,株洲市    
$topFee->setNormal(1,1,1,1)
    ->setCustom('1','1','1','1','湖南省',array('长沙市','株洲市'))
    ->setTopFee();   
```

####辅助类

```php
//初始化
$reginonal = new \Shop\Data\Regional();

//获得国家列表
$reginonal->getCountry();
//获得　省直辖市列表
$reginonal->getProvince($country = '中国');

//获得地级市列表
$reginonal->getCity($province,$country = '中国');

// $province

$province = '浙江省';

$province = array('浙江省','江苏省','上海市')

```

###第二种

```php
$topFee = array(
    array(
        'Type'=>10000027,
        'Normal'=>array(
            'StartStandards'=> 1, 
            'StartFees'=>2, 
            'AddStandards'=>3,
            'AddFees'=> 1
        ),
        'Custom'=>array(
            array(
                'StartStandards'=> 1, 
                'StartFees'=> 100, 
                'AddStandards'=> 1,
                'AddFees'=> 3, 
                'DestCountry'=> '中国', 
                'DestProvince'=> '广东省', 
                'DestCity'=> '广州市'
            ),
            ＃...
        )
    ),
    array(
        'Type'=>10000027,
        'Normal'=>array(
        'StartStandards'=> 1, 
        'StartFees'=>2, 
        'AddStandards'=>1,
        'AddFees'=> 4
        ),
        'Custom'=>array(
            array(
                'StartStandards'=> 1, 
                'StartFees'=> 100, 
                'AddStandards'=> 1,
                'AddFees'=> 3, 
                'DestCountry'=> '中国', 
                'DestProvince'=> '广东省', 
                'DestCity'=> '广州市'
            ),
            ＃...
        )
    ),
    #...         
);
```




