#Stock

##初始化

```php
$stock = new \Shop\Stock($config);
```
> $config 参见　[初始化](init.md)!!!

##API

```php
$stock->add($productId, array $skuInfo, $quantity);     //增加库存
$stock->reduce($productId, array $skuInfo, $quantity);　//减少库存
```
## $skuInfo

```php
$skuInfo = array(
    array('10000983','10000995'),
    array('10001007','10001010'),
    //...
);
```