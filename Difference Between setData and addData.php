
		======  Difference Between setData() and addData()  ============
		
setData overrides the existing data and can receive as parameter either a pair key-value either an array.
if you set as parameters a pair key-value then $_data[key] becomes value. 
If you set as parameter an array $_data becomes that array overwriting what ever it contained previously.
Example:

<?php 
$_data = array('k1' => 'v1' , 'k2' => 'v2');

//calling $obj->setData('k3','v3') results in
$_data = array('k1' => 'v1' , 'k2' => 'v2', 'k3'=>'v3');

//calling $obj->setData(array('k3'=>'v3')) results in
$_data = array('k3'=>'v3');

//calling $obj->setData('k2','v2000') results in
$_data = array('k1' => 'v1' , 'k2' => 'v2000')

//calling $obj->setData(array('k2'=>'v2000')) results in
$_data = array('k2'=>'v2000');

?>

addData receives as parameter only an array and it merges that array with the existing data.

Example:

<?php 

$_data = array('k1' => 'v1' , 'k2' => 'v2');

//calling $obj->addData(array('k3'=>'v3')) results in
$_data = array('k1' => 'v1' , 'k2' => 'v2', 'k3'=>'v3');

//but calling $obj->addData(array('k2'=>'v2000')) results in
$_data = array('k1' => 'v1' , 'k2' => 'v2000');

?>
