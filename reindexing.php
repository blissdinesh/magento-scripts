<?php

require_once('app/Mage.php');
	umask(0);
	Mage::app();
/* @var $indexCollection Mage_Index_Model_Resource_Process_Collection */
$indexCollection = Mage::getModel('index/process')->getCollection();
foreach ($indexCollection as $index) {
    /* @var $index Mage_Index_Model_Process */
    $index->reindexAll();
}