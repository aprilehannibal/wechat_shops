#Group

##初始化

```php
    $group = new \Shop\Group($config);
```
> $config 参见　[初始化](init.md)!!!

##API

```php  
    $group->add($groupName, array $productList)     //添加分组
    $group->delete($groupId)                        //删除分组
    $group->updateAttribute($groupId, $groupName)   //修改分组属性
    $group->updateProduct($groupId, array $product) //修改分组商品
    $group->lists()                                 //获得全部商品
    $group->getById($groupId)                       //根据分组ID获取分组信息
```

##添加分组

```php
    $productList = array('productId','productId','productId',...);
```

##修改分组商品

```php
    $product = array(
        array('',''),
        array('',''),
        array('',''),
        ...
    );
    
    or 
    
    $product = array(
        array('product_id'=>'','mod_action'=>''),
        array('product_id'=>'','mod_action'=>''),
        array('product_id'=>'','mod_action'=>''),
        ...
    );
```


