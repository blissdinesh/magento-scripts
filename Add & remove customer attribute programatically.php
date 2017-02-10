<?php
//error_reporting(E_ALL | E_STRICT);

$mageFilename = 'app/Mage.php';

require_once $mageFilename;

umask(0);

Mage::app();

//ini_set('display_errors', 1);

$attributeCode = "uploaded_file";
$attributeLabel = "Uploaded file";

//$installer = $this;
$installer = Mage::getModel('eav/entity_setup', 'core_setup');
//$installer->startSetup();
$installer->addAttribute('customer', $attributeCode, array(
    'type' => 'text',
    'input' => 'file',
    'label' => $attributeLabel,
    'global' => true,
    'visible' => true,
    'required' => false,
    'user_defined' => false
));

// For newer versions of Magento, otherwise won't show up.
$eavConfig = Mage::getSingleton('eav/config');
$attribute = $eavConfig->getAttribute('customer', $attributeCode);
$attribute->setData('used_in_forms', array('customer_account_create', 'adminhtml_customer'));
$attribute->setData('sort_order', 200);
$attribute->save();

/// To Remove Attribute use below code

//$entity = $installer->getEntityTypeId('customer');
//$installer->removeAttribute($entity, 'uploaded_file');

?>