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


$indexCollection = Mage::getModel('index/process')->getCollection();
foreach ($indexCollection as $index) {
    /* @var $index Mage_Index_Model_Process */
	try {
		$index->reindexAll();
		$indexerCode = $index->getIndexerCode();
		echo '<table><tr><td><strong><u>'.$indexerCode.'</u></strong></td> <td> has been completed.</td></tr></table>';
		echo "<br/>";
	} catch (Exception $e) {
		die($e->getMessage());
	}
	
}



?>
