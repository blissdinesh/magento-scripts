<?php
//some settings
error_reporting(E_ALL | E_STRICT); 
define('MAGENTO_ROOT', getcwd()); 
$mageFilename = MAGENTO_ROOT . '/app/Mage.php'; 
require_once $mageFilename; 
Mage::setIsDeveloperMode(true); 
ini_set('display_errors', 1); 
umask(0);
//instantiate the app model
Mage::app(); 

//my toy code in here.
?>

<?php 

$products = Mage::getModel("catalog/product")->getCollection();
foreach($products as $product){
	echo "<pre/>";
	print_r($product->getAttributeSetId());
}


/*
Mage::app()->setCurrentStore(Mage::getModel('core/store')->load(Mage_Core_Model_App::ADMIN_STORE_ID));

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

    try {
        $custAttr = 'jobtitle';  // here enter your attribute name which you want to remove
       
        $setup->removeAttribute('customer_address', $custAttr);
        echo $custAttr." attribute is removed";
    }
        catch (Mage_Core_Exception $e) {
        $this->_fault('data_invalid', $e->getMessage());
    }
*/
?>



