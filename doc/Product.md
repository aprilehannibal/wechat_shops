#Product

##初始化

```php
$prodcut = new \Shop\Product($config);
```
> $config 参见　[初始化](init.md)!!!

##API

```php
$prodcut->create(array|callable $data);
$prodcut->delete($productId);
$prodcut->update(array|callable $data,$productId = null,$shelf = false);
$prodcut->get($productId);
$prodcut->getByStatus($status = 0);
$prodcut->updateStatus($productId, $status = 0);
$prodcut->getSub($cateId = 1);
$prodcut->getSku($cateId);
$prodcut->getProperty($cateId);
```

