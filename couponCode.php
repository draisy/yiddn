<?php
require_once('backend/include/config.php'); 
if (isset($_REQUEST['couponCode']) && $_REQUEST['couponCode']!='') 
	{
$copupns  = 'SELECT * FROM `copupns` where `Status`="1" AND `Code`="'.$_REQUEST['couponCode'].'"';
$result_copupns = $db->query($copupns);
$row_copupns    = $result_copupns->fetch_assoc();
		if($row_copupns['Code'] == $_REQUEST['couponCode']) 
		{
		echo $row_copupns['Discount'];
		}else{
		echo "Invalid coupon Code.";	
		}
	}
?>