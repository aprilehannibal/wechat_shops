<?php
/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-10-23
 * Time: 下午3:02
 */

require "../vendor/autoload.php";

$appId = 'appId';
$appSecret = 'appSecret';

//$config = new \Shop\Foundation\Config('1','2');

$prodcut = new \Shop\Data\Product();

$prodcut->setBaseAttr('name','categoty','main_img',array('img','img'))
    ->setDetail('text','text')
    ->setDetail('img','image')
    ->setProperty('','');

dd($prodcut);
