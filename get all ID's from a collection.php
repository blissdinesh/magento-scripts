
================= Most efficient way to get all ID's from a collection ==========

<?php 

$_productCollection = Mage::getModel('catalog/product')->getCollection();
  
echo "<pre/>";
print_r($_productCollection->getAllIds());


?>