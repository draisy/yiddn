<?php  
require_once('inc.files.php');
require_once('newsletter/email.php');
date_default_timezone_set('Etc/UTC');

require 'include/PHPMailerAutoload.php';
$errors = array();
$success = null;
if(isset($_POST['submit'])){
$Name 		        = isset($_POST['Url']) ? $_POST['Url'] : '';
$body	       		= '';  
$headers 	    	= '';  
$header 	    	= '';

		if(!empty($_POST['Email'])) {
			$Email = $_POST['Email'];
		}else{
		    $Email="";
		}

	    if(!empty($_POST['URL'])) {
			$Url = $_POST['URL'];
		}else{
		    $Url="";
		}
	     
		if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
			echo '<div class="required"><strong>* Invalid captcha</strong></div>';
			} else { 
$ip       = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$body 	  .='<table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
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
			Submit A Site<br />
	</td>
  </tr>
    <tr>
    <td><strong>Dear Admin, </strong></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Email:</strong> :'.$Email.'</td>
  </tr>

  <tr>
    <td><strong>Website:</strong> :'.$Url.'</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  <tr>
    <td>Kind Regards,'. $_SERVER['HTTP_HOST'].'</td>
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
</table>';
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
$mail->setFrom($Email, $row_home->Title);
$mail->addReplyTo($Email, $row_home->Title);
$mail->addAddress($row_home->EmailTo, $row_home->Title);
$mail->Subject = "Submit A Site - ".$row_home->Title;
$mail->Body=$body;
$mail->send();
echo "<div class='success' style='margin-left:20px; margin-top:30px;'>
Thank you for your submission. We will review your email and get back to you.</div>";
echo"	
<script> 
$(document).ready(function(){
 $(\"#Url\").val('');
});
</script> ";
		}
	}
?>

