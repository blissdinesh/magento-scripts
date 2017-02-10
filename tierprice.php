<?php

//Magento export tier price of all product to csv
require_once 'app/Mage.php';
umask(0);
Mage::app('default');

header("Content-type:text/octect-stream");
header("Content-Disposition:attachment;filename=data.csv");

$tableName = Mage::getSingleton('core/resource')
         ->getTableName('catalog_product_entity_tier_price');
 $storeId    = Mage::app()->getStore()->getId();
 $product    = Mage::getModel('catalog/product');
 $products   = $product->getCollection()->addStoreFilter($storeId)->getAllIds();
 
 $fieldname = array("id","store","websites","attribute_set","type","sku","name","special price","tier_price_website","tier_price_customer_group","tier_price_qty","tier_price_price");
 print stripslashes(implode(',',$fieldname)) . "\n";
 foreach($products as $productid)
 {  
  $existingTierPrice = $product ->load($productid)->tier_price;
  $productid = $productid;
  $specialprice = $product->getSpecialPrice();
  $sku = $product->getSku();
  $name = $product->getName();
  foreach($existingTierPrice as $key=>$value)
   {   
   $tierarray = array($productid,"admin","base","Default","simple",$sku,$name,$specialprice,"all","all",$value['price_qty'],$value['price']);
   print stripslashes(implode(',',$tierarray)) . "\n";
   }  
 }
?>

