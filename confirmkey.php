<?php 
require_once('inc.files.php');
require_once('newsletter/email.php');
date_default_timezone_set('Etc/UTC');

require 'include/PHPMailerAutoload.php';
$body	       		= '';  
$headers 	    	= '';  
$header 	    	= '';
if(isset($_GET['confirmkey'])){
$confirmkey=$_GET['confirmkey'];
$select = "SELECT * FROM `account` WHERE `Status` = '$confirmkey'";
$run = mysqli_query($db, $select);
if(mysqli_num_rows($run) > 0){
$row = $run->fetch_assoc();
$Email = $row['EmailAddress']; 
$ip       = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$parts    = explode('@', $Email);
$username = $parts[0];
$body .='<div dir="ltr" style="width:600px;"><table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
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
    <td align="left" valign="top" style="font-size:18px; font-weight:bold">
	Account Successfully Activated
	</td>
  </tr>
    <tr>
    <td><strong>Dear '.$row['FirstName'].' </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>Your account is successfully activated.<br> 
	<a href="http://yiddn.com/newsite/">Please  Click here to Login.</a> </td>
  </tr>
	<tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
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
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host       = "smtp.gmail.com";      
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;                 
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->IsHTML(true);
$mail->Username   = "noreply@yiddn.com";  
$mail->Password   = "sabelefg";
// These should be dynamic
$mail->setFrom($row_home->EmailFrom, $row_home->Title);
$mail->addReplyTo($row_home->EmailTo, $row_home->Title);
$mail->addAddress($Email,$row_home->Title); 
$mail->Subject = "Your account is successfully activated - ".$row_home->Title;
$mail->Body=$body;
$mail->send();
$sql = "UPDATE `account` SET `Status` = '1' WHERE `Status` = '$confirmkey'";
$res = mysqli_query($db, $sql);
echo "
<script>
$(function(){
alert('Your account is successfully activated.');
});
</script>";
echo "<script>window.open('home','_self')</script>";
	}else{
echo "
<script>
$(function() {
alert('Invalid Your account.');
});
</script>";
	}
}
?> 
