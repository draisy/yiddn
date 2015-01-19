<?php 
	require_once('inc.files.php');
	require_once("include/data.php");
	require_once("include/authnetfunction.php");
	require_once('newsletter/email.php');
	require_once('anet_php_sdk/AuthorizeNet.php'); 
	require_once('include/PHPMailerAutoload.php');

if(isset($_POST['step4'])){

    define("AUTHORIZENET_API_LOGIN_ID", "7D4Jvj8Y");
    define("AUTHORIZENET_TRANSACTION_KEY", "3Y54Yx4T259QtUfb");
    define("AUTHORIZENET_SANDBOX", false);
    $sale = new AuthorizeNetAIM;
	
	$OrderAmount = $_POST['AmountCharged']; 
	$CreditCard	 = $_POST['CreditCard'];
	$cardNumber  = str_replace(' ', '',$CreditCard);
	$exp_date    = $_POST['ExpMon']."/".$_POST['ExpYear'];
	$CompanyName = $_POST['CompanyName'];
	$AdTitle     = $_POST['AdTitle'];
	$City        = $_POST['City'];
	$Agent       = $_POST['Agent'];
	$Category    = $_POST['Category'];
	$Description = $_POST['Description'];
	$Address     = $_POST['Address'];

	$sale->amount = $OrderAmount; 
    $sale->card_num = $cardNumber ;
    $sale->exp_date = $exp_date; 
    $response = $sale->authorizeAndCapture();
	
	if ($response->approved){
		
		   if(!empty($_POST['PaymentPlan'])) {
				$PaymentPlan = $_POST['PaymentPlan'];
			}else{
				 $PaymentPlan ="Free";
			}
			if(!empty($_POST['Coupon'])) {
				$Coupon = $_POST['Coupon'];
			}else{
				 $Coupon ="NA";
			}
			if(!empty($_POST['NameasonCard'])) {
				$NameasonCard = $_POST['NameasonCard'];
			}else{
				$errors[] ="* Name as on Card is required field.";
			}
			if(!empty($_POST['CreditCard'])) {
				$CreditCard = $_POST['CreditCard'];
			}else{
				$errors[] ="* Card Number is required field.";
			}
			if(!empty($_POST['NameonCard'])) {
				$NameonCard = $_POST['NameonCard'];
			}else{
				$errors[] ="* Name on Card is required field.";
			}
			if(!empty($_POST['ExpYear']) && !empty($_POST['ExpMon'])) {
				$ExpiryDate = $_POST['ExpYear']."-".$_POST['ExpMon'];
				$exp_date   = $_POST['ExpYear']."/".$_POST['ExpMon'];
			}else{
				$errors[] ="* Expiry Date is required field.";
			}
			if(!empty($_POST['CVV'])) {
				$CVV = $_POST['CVV'];
			}else{
			    $errors[] ="* CVV is required field.";
			}
			$TotalCost			= isset($_POST['TotalCost']) ? $_POST['TotalCost'] : '';
			$OrderType			= isset($_POST['OrderType']) ? $_POST['OrderType'] : '';
			$OrderId     		= $_SESSION['OrderId'];
			$refId     			= date("Ymdis");
			$amount    			= isset($_POST['OrderAmount']) ? $_POST['OrderAmount'] : '';
			$name      			= $NameasonCard;	
			$total_occurrences  = "";	
			$unit      			= "";
			$startDate 			= date('Y-m-d');
			$totalOccurrences 	= "";
			$trialOccurrences 	= "";
			$trialAmount 		= "";
			$cardNumber 		= str_replace(' ', '',$CreditCard);
			$expirationDate 	= $ExpiryDate;
			$firstName 			= $AdTitle;
			$lastName 			= $AdTitle;
			$length_cardNumber  = strlen($cardNumber);
			$ccnumber 			= substr($cardNumber,$length_cardNumber-4);
			$Seo 				= cleanURL($CompanyName);;
			$DateAdded 			= date("Y-m-d H:i:s");	

			if($PaymentPlan=="10"){
				$length = 3;
				$total_occurrences = 9999;
			}elseif($PaymentPlan=="20"){
				$length = 6;
				$total_occurrences = 9999;
			}elseif($PaymentPlan=="RECUR"){
				$length = 12;
				$total_occurrences = 9999;
			}elseif($PaymentPlan=="ONETIME"){
				$length = 1;
				$total_occurrences = 1;
			}
		$content =
		"<?xml version='1.0' encoding='utf-8'?>
		<ARBCreateSubscriptionRequest
		xmlns='AnetApi/xml/v1/schema/AnetApiSchema.xsd'>
		<merchantAuthentication>
		<name>" . $loginname . "</name>
		<transactionKey>" . $transactionkey . "</transactionKey>
		</merchantAuthentication>
		<refId>" . $refId . "</refId>
		<subscription>
		<name>". $CompanyName ." subscription</name>
		<paymentSchedule>
		<interval>
		<length>". $length ."</length>
		<unit>months</unit>
		</interval>
		<startDate>". $startDate ."</startDate>
		<totalOccurrences>". $total_occurrences ."</totalOccurrences>
		<trialOccurrences>1</trialOccurrences>
		</paymentSchedule>
		<amount>". $amount ."</amount>
		<trialAmount>0.00</trialAmount>
		<payment>
		<creditCard>
		<cardNumber>".$cardNumber."</cardNumber>
		<expirationDate>".$expirationDate."</expirationDate>
		</creditCard>
		</payment>
		<billTo>
		<firstName>".$CompanyName."</firstName>
		<lastName>".$CompanyName."</lastName>
		<address>".$Address."</address>
		<city>".$City."</city>
		<state>n/a</state>
		<zip>n/a</zip>
		<phonenumber>n/a</phonenumber>
		</billTo>
		</subscription>
		</ARBCreateSubscriptionRequest>";
		//send the xml via curl
		$response = send_request_via_curl($host,$path,$content);
	if ($response){
		list ($refId, $resultCode, $code, $text, $subscriptionId) =parse_return($response);
	if($resultCode=="Ok"){	
		if(empty($errors)) {
			$array = array(
			"PaymentPlan" 				=> mysqli_real_escape_string($db,$PaymentPlan),
			"Coupon" 					=> mysqli_real_escape_string($db,$Coupon),
			"Seo" 						=> mysqli_real_escape_string($db,$Seo),
			"DateAdded" 				=> $DateAdded,
			"Status" 					=> '0',
			"OrderType"					=> $OrderType,
			"UserId" 					=> $_SESSION['Yiddn_login_Id'],
			"step" 						=> '4'

		);
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_ad_circular` SET `$key` = '$val' WHERE `OrderId` = '".$_SESSION['OrderId']."'";
	$res = mysqli_query($db, $sql);
	}
	
$array = array(
"UserId" 		=> $_SESSION['Yiddn_login_Id'],
"subscriptionId"=> $subscriptionId,
"transactionId"	=> $refId,
"OrderId"		=> $_SESSION['OrderId'],
"OrderType"		=> $OrderType,
"OrderDate"		=> $DateAdded,
"NameasonCard"	=> mysqli_real_escape_string($db,$NameasonCard),
"ccnumber"		=> mysqli_real_escape_string($db,$ccnumber),
"NameonCard"	=> mysqli_real_escape_string($db,$NameonCard),
"ExpiryDate"	=> $ExpiryDate,
"CVV"			=> mysqli_real_escape_string($db,$CVV),
"CouponCode"	=> mysqli_real_escape_string($db,$Coupon),
"Status"		=> "Active",
"OrderAmount"	=> isset($_POST['OrderAmount']) ? $_POST['OrderAmount'] : '',
"CouponDiscountAmount"=> isset($_POST['CouponDiscountAmount']) ? $_POST['CouponDiscountAmount'] : '',
"DiscountAmount"=> isset($_POST['DiscountAmount']) ? $_POST['DiscountAmount'] : '',
"AmountCharged"	=> isset($_POST['AmountCharged']) ? $_POST['AmountCharged'] : '',
"Summary"		=> isset($_POST['Summary']) ? $_POST['Summary'] : '',
);
	
	foreach ($array as $key => $val) {
	$sql = "UPDATE `order` SET `$key` = '$val' WHERE `OrderId` = '".$_SESSION['OrderId']."'";
	$res = mysqli_query($db, $sql);
	}
			$fp = fopen('data.log', "a");
			fwrite($fp, "$refId\r\n");
			fwrite($fp, "$subscriptionId\r\n");
			fwrite($fp, "$amount\r\n");
			fclose($fp);
$subject  = "New Request  Ad Circular ".$row_home->Title;
		$from     = $_SESSION['Yiddn_login_EmailAddress'];
		$to       = $row_home->EmailTo;
		$ip       = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		$body 	  ='<div dir="ltr" style="width:600px;"><table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
 <tr>
    <td align="left" valign="top">';
		$body .= $inc_header;
		$body .='
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Dear Admin, </strong></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>
Awesome! Yasher koach for taking the time to help your fellow Yiddn out with your listing.<p>
Weve received your information and will review it chik chak! Youll hear from us as soon as were done - we promise we wont shlep around!
</td>
  </tr>
  
  <tr>
   <td>
   <table width="100%" border="0">
      <tr>
        <td valign="top"><strong>Company Name</strong></td>
         <td>'.$CompanyName.'</td>
      </tr>
	  <tr>
        <td width="43%" valign="top"><strong>Contact Name</strong></td>
        <td width="57%">'.$Agent.'</td>
      </tr>
	  <tr>
        <td width="43%" valign="top"><strong>Website Address</strong></td>
        <td width="57%">'.$AdURL.'</td>
      </tr>
	  <tr>
        <td width="43%" valign="top"><strong>Category</strong></td>
        <td width="57%">';
if($Category1!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$Category1;
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= $row_subcat['Title'];
}
$body .='</td>
      </tr>
	  <tr>
        <td width="43%" valign="top"><strong>Description</strong></td>
        <td width="57%">'.$Description.'</td>
      </tr>
	 </table> 
   </td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  
  <tr>
    <td>your fellow yiddn</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">';
	$body .= $inc_footer;
	$body .='
	</td>
  </tr>
</table></div>';
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$header  .='Content-Type: image/jpg';
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$row_home->Title.' <'.$_SESSION['Yiddn_login_EmailAddress'].'>, '."\r\n";
		$headers .= 'Reply-to: '.$row_home->Title.' <'.$_SESSION['Yiddn_login_EmailAddress'].'>,'."\r\n";
		mail($to,$subject,$body,$headers);	
		/////User Email /////////////
		$select = "SELECT * FROM `account` WHERE `EmailAddress` = '".$_SESSION['Yiddn_login_EmailAddress']."'";
		$result = mysqli_query($db, $select);
		$row = $result->fetch_assoc(); 
		$subject_ = "New Listing Submission For ".$row_home->Title;
		$from_    = $row_home->EmailFrom;
		$to_      = $row['EmailAddress'];
		$ip_     = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		$body_ 	 .='<div dir="ltr" style="width:600px;"><table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
 <tr>
    <td align="left" valign="top">';
		$body_ .= $inc_header;
		$body_ .='
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Hi '.$row['FirstName'].', </strong></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>
<p>
&nbsp;Awesome!  Yasher koach for taking the time to help your fellow Yiddn out with your  listing.<br>
<br>
&nbsp;We&#39;ve  received your information and will review it chik chak! You&#39;ll hear from us as  soon as we&#39;re done -&nbsp;we promise we won&#39;t shlep around!</p>
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  <tr>
    <td>your fellow yiddn</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">';
	$body_ .= $inc_footer;
	$body_ .='
	</td>
  </tr>
</table></div>
		';
		$headers_ .= 'MIME-Version: 1.0'."\r\n";
		$header_  .='Content-Type: image/jpg';
		$headers_ .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers_ .= 'From: '.$row_home->Title.' <'.$row_home->EmailFrom.'>, '."\r\n";
		$headers_ .= 'Reply-to: '.$row_home->Title.' <'.$row_home->EmailTo.'>,'."\r\n";
		mail($to_,$subject_,$body_,$headers_);
		    $_SESSION['success'] = 'Your ad or listing is currently pending. We will review and confirm the status as soon as possible.';		
	        header("Location:dashboard");
			}else{
			 $_SESSION['errors'] = "Please Try Again.";
			 header("Location:general-directory-step4");	
			}
		}else{
			 $_SESSION['errors'] = "Transaction Failed.";
		     header("Location:general-directory-step4");
		}
  } 
	}else{  
			$_SESSION['errors']  = $response->error_message.'&nbsp;'.$response->response_reason_text;
            header("Location:general-directory-step4");
	}	
}
?>
