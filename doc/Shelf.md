#Shelf


##初始化

```php
$shelf = new \Shop\Shelf($config);
```
> $config 参见　[初始化](init.md)!!!

##API

```php
$shelf->add($shelfData,$shelfBanner,$shelfName)             //添加货架
$shelf->delete($shelfId)                                    //删除货架
$shelf->update($shelfData,$shelfId,$shelfBanner,$shelfName) //修改货架
$shelf->lists()                                             //获取所有货架
$shelf->getById($shelfId)                                   //根据货架ID获取货架信息
```

##$shelfData


###第一种　用辅助生成类


```php
$shelf->add(function(\Shop\Data\Shelf $shelfData){
    return $shelfData;
},$shelfBanner,$shelfName);
```
> 一定要返回句柄; 

```php
$shelfData = new \Shop\Data\Shelf();
```

####Api

```php
$shelfData->controlOne($count, $groupId, $eid);               //控件１
$shelfData->controlTwo(array $groupId, $eid);                 //控件２
$shelfData->controlThree($groupId, $img, $eid);               //控件３
$shelfData->controlFour(array $groups,$eid);                  //控件４
$shelfData->controlFive(array $groups,$imgBackground,$eid);   //控件５
```
#### controlTwo $groupId

```php
//最多只能有４个
$groupId = array('groupId','groupId','groupId','groupId');
```
#### controlFour $groupId

```php
//最多只能有3个
$groupId = array(
    array('groupId','img'),
    array('groupId','img'),
    array('groupId','img')
);
```

#### controlFive $groupId

```php
//官方没有写限制数字所以不知道最大多少个
$groupId = array('$groupId','$groupId','$groupId','$groupId');
```

###第二种

```php
$shelfData = array(
    //自行拼接array 参照官方 wiki
);
```