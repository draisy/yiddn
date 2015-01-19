<?php 
require_once('inc.files.php');
require_once('newsletter/email.php');
date_default_timezone_set('Etc/UTC');

require 'include/PHPMailerAutoload.php';
if(isset($_REQUEST['submit'])){
$Email    = $_POST['Email'];
$body	       		= '';  
$headers 	    	= '';  
$header 	    	= '';
$key			    ='';
$errors='';
if(empty($Email)) {
		echo "<div class='required'>* Email is required field.";
	}
if(empty($errors)) {	  
		if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
		echo "<div class='required'>* Invalid captcha</div>";
		} else { 
		$select = "SELECT * FROM `account` WHERE `EmailAddress` = '$Email'";
		$result = mysqli_query($db, $select);
		if(mysqli_num_rows($result) > 0){
		$row = $result->fetch_assoc(); 
		$ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
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
    <td><strong>Hi '.$row['FirstName'].', </strong></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>
<strong>Your ID</strong>: '.$Email.'<p>
<strong>Password</strong>: '.rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($row['Password']), MCRYPT_MODE_CBC, md5(md5($key))), "\0").'
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
$mail->Subject = "Forgot Password - ".$row_home->Title;
$mail->Body=$body;
		if($mail->send()){
		    echo "
<script>
$(function(){
alert('Please Check Your Email.');
});
</script>";
			echo "<script>window.open('home','_self')</script>";
		}
			}else{
			echo "<div class='required'>Invalid Email Address.</div>";
			}
		}
  }
}
?>