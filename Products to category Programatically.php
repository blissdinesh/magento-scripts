<?php
require_once 'app/Mage.php';
Mage::app();

$allProducts = Mage::getModel('catalog/product')->getCollection();

foreach($allProducts as $product){
    $categories = array(4);
    //For multiple categories, use this line
    //$categories = array(CATEGORY_ID_1, CATEGORY_ID_2, .....  CATEGORY_ID_n);
    $product->setCategoryIds($categories);
    $product->save();
}

