	
	How to check if shopping cart price rule applied to quote

----------------------------------------------------------------------

<?php 
$appliedRuleIds = Mage::getSingleton('checkout/session')->getQuote()->getAppliedRuleIds();
?>

-----------------------------------------------------------------------

This will give you the ids of the rules applied to the quote separated by comma.
you can turn them into an array like this:

<?php 
$appliedRuleIds = explode(',', $appliedRuleIds);
?>

-----------------------------------------------------------------------

if you want to get the rules applied as objects you can do this:

<?php 

//$rules = Mage::getModel('salesrule/rule')->getCollection()->addFieldToFilter('rule_id' => array('in' => $appliedRuleIds));
$rules =  Mage::getModel('salesrule/rule')->getCollection()->addFieldToFilter('rule_id' , array('in' => $appliedRuleIds));

foreach ($rules as $rule) {
    //do something with $rule
}

?>

-------------------------------------------------------------------------

