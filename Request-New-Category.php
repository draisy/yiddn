<?php 
require_once('inc.files.php');
require_once("include/data.php");
require_once("include/authnetfunction.php");
require_once('newsletter/email.php');
date_default_timezone_set('Etc/UTC');

require 'include/PHPMailerAutoload.php';
$message='';
$header='';
$NewCategory 	= isset($_REQUEST['NewCategory']) ? $_REQUEST['NewCategory'] : '';
$NewSubCategory = isset($_REQUEST['NewSubCategory']) ? $_REQUEST['NewSubCategory'] : '';
$UserId 		= isset($_REQUEST['UserId']) ? $_REQUEST['UserId'] : '';
$RequestIN 		= isset($_REQUEST['RequestIN']) ? $_REQUEST['RequestIN'] : '';
$DateAdded 		= date("Y-m-d H:i:s");
$query = "select * from `account` where `Id`= '".$UserId."'";
$result = $db->query($query);
$row_account = $result->fetch_object();

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
    <td>	<strong>Category</strong>:'.$NewCategory.'<p><br>
			<strong>Sub Category</strong>:'.$NewSubCategory.'<br>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<p><em>Skoyach</em>! We appreciate all the input from Yiddn out  there!</p>
<p><em>Nu</em>? What&#39;s next? You&#39;ll hear from us again as soon  as we finish reviewing your application, and we&#39;ll do our best to make it  quick. </p>
<p><em>Todah rabah!</em></p>
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
$mail->setFrom($row_account->EmailAddress, $row_home->Title);
$mail->addReplyTo($row_account->EmailAddress, $row_home->Title);
$mail->addAddress($row_home->EmailTo, $row_home->Title);
$mail->Subject = "Request - New Category - In ".$RequestIN ." - " .$row_home->Title;
$mail->Body=$body;
$mail->send();
				$array = array(
							"NewCategory"			=> $NewCategory,
							"NewSubCategory"		=> $NewSubCategory,
							"UserId"				=> $UserId,
							"RequestIN"				=> $RequestIN,
							"DateAdded"				=> $DateAdded
				);
		 	   $sql  = "INSERT INTO `request`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   echo "<div class='success'>
					Thank you for submitting.<br>
					</div>";
?>