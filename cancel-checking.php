<?php
require_once('inc.files.php'); 
require_once("include/data.php");
require_once("include/authnetfunction.php");
$errors = array();
$success = null;

$subscriptionId 		    = '';

if(isset($_POST['submit'])){
$body	       		= '';  
$headers 	    	= '';  
$header 	    	= '';  
$subscriptionId = $_POST['subscriptionId'];

	    if(!empty($_POST['subscriptionId'])) {
			$subscriptionId = $_POST['subscriptionId'];
		}else{
	   		$errors[] ="* Subscription Id is required field.";
		}
	     $OrderId 		= $_POST['OrderId'];
   	     $transactionId = $_POST['transactionId'];

			if(empty($errors)) {
			
$content =
"<ARBCancelSubscriptionRequest
xmlns='AnetApi/xml/v1/schema/AnetApiSchema.xsd'>
<merchantAuthentication>
<name>" . $loginname . "</name>
<transactionKey>" . $transactionkey . "</transactionKey>
</merchantAuthentication>
<refId>" . $transactionId . "</refId>
<subscriptionId>" . $subscriptionId . "</subscriptionId>
</ARBCancelSubscriptionRequest> ";
$response = send_request_via_curl($host,$path,$content);
if ($response)
{
	list ($resultCode, $code, $text, $subscriptionId) =parse_return($response);

$fp = fopen('data.log', "a");
fwrite($fp, "$subscriptionId\r\n");
fwrite($fp, "$text\r\n");
fclose($fp);
		
		$array = array(
				"Status"					=> "cancel"
		);
	
		foreach ($array as $key => $val) {
		$sql = "UPDATE `order` SET `$key` = '$val' WHERE `OrderId` = '$OrderId'";
		$res = mysqli_query($db, $sql);
		}
		 echo "<div class='success'>The subscription has Successfully canceled..</div>";
			   header("Location:dashboard");
		}}else{
			echo "Failed.<br>";
		}
 }
?>