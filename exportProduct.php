<?php
require_once 'app/Mage.php';
Mage::app();
$products = Mage::getModel("catalog/product")->getCollection();
$products->addAttributeToFilter('status', 1);

header("Content-type:text/octect-stream");
header("Content-Disposition:attachment;filename=products.csv");

$fopen = fopen('products.csv', 'w');
$csvHeader = array("id","sku", "name", "price","attribute_set_id");// Add the fields you need to export
fputcsv( $fopen , $csvHeader,",");
foreach ($products as $prod){
	
	$product = Mage::getModel('catalog/product')->load($prod->getId());
		
    $id = $product->getId();
	$sku = $product->getSku();
	$name = $product->getName();
	$price = $product->getPrice();
	$attribute_set_id = $product->getAttributeSetId();
	
    fputcsv($fopen, array($id,$sku,$name, $price, $attribute_set_id), ","); //Add the fields you added in csv header
}
fclose($fopen );

