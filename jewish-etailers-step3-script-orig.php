<?php 
	require_once('inc.files.php');
	require_once("include/data.php");
	require_once("include/authnetfunction.php");
	require_once('newsletter/email.php');
	require_once('anet_php_sdk/AuthorizeNet.php'); 
	require_once('include/PHPMailerAutoload.php');

if(isset($_POST['step3'])){
	
		/*---Category 1----*/
		if(!empty($_POST['Category1'])) {
			$Category = $_POST['Category1'];
		}else{
		    $errors[] ="* Category 1 is required field.";
		}
		if(!empty($_POST['upgrade1'])) {
			$upgrade = $_POST['upgrade1'];
		}else{
		    $upgrade="N/A.";
		}
		if(!empty($_POST['Premium'])) {
			$Premium = $_POST['Premium'];
		}else{
		   $Premium  = "";
		}
		$Banner = $_FILES['Banner1']['name'];
		$tmp_name = $_FILES['Banner1']['tmp_name'];
		
		if($Banner != "")
		{
			if ((
			$_FILES["Banner1"]["type"] == "image/gif")
			|| ($_FILES["Banner1"]["type"] == "image/jpeg")
			|| ($_FILES["Banner1"]["type"] == "image/png")
			|| ($_FILES["Banner1"]["type"] == "image/pjpeg")
			&& ($_FILES["Banner1"]["size"] < 2097152)){
			$date = date("Y_S_y_js_m_F_M");
			$UploadBanner = "Banner1-".$_SESSION["Yiddn_login_Id"]."-". $date.".png";
			move_uploaded_file($tmp_name,"images/Banner/".$UploadBanner);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}else{
			 //$errors[] ="* Upload banner is required field.";
				$UploadBanner="";	 
		}
		/*---End Category 1----*/

		
		/*---Category 2----*/
		if(!empty($_POST['Category2'])) {
			$Category2 = $_POST['Category2'];
		}else{
		    $Category2 ="";
		}
		if(!empty($_POST['upgrade2'])) {
			$upgrade2 = $_POST['upgrade2'];
		}else{
		    $upgrade2="N/A.";
		}
		if(!empty($_POST['Premium2'])) {
			$Premium2 = $_POST['Premium2'];
		}else{
		    $Premium2="";
		}
		$Banner2 = $_FILES['Banner2']['name'];
		$tmp_name2 = $_FILES['Banner2']['tmp_name'];
		
		if($Banner2 != "")
		{
			if ((
			$_FILES["Banner2"]["type"] == "image/gif")
			|| ($_FILES["Banner2"]["type"] == "image/jpeg")
			|| ($_FILES["Banner2"]["type"] == "image/png")
			|| ($_FILES["Banner2"]["type"] == "image/pjpeg")
			&& ($_FILES["Banner2"]["size"] < 2097152)){
			$date = date("Y_S_y_js_m_F_M");
			$UploadBanner2 = "Banner2-".$_SESSION["Yiddn_login_Id"]."-". $date.".png";
			move_uploaded_file($tmp_name2,"images/Banner/".$UploadBanner2);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}else{
			 $UploadBanner2 ="";
		}
		/*---End Category 2----*/
	
	/*---Category 3----*/
		if(!empty($_POST['Category3'])) {
			$Category3 = $_POST['Category3'];
		}else{
		    $Category3 ="";
		}
		if(!empty($_POST['upgrade3'])) {
			$upgrade3 = $_POST['upgrade3'];
		}else{
		    $upgrade3="N/A.";
		}
		if(!empty($_POST['Premium3'])) {
			$Premium3 = $_POST['Premium3'];
		}else{
		    $Premium3="";
		}
		$Banner3 = $_FILES['Banner3']['name'];
		$tmp_name3 = $_FILES['Banner3']['tmp_name'];
		
		if($Banner3 != "")
		{
			if ((
			$_FILES["Banner3"]["type"] == "image/gif")
			|| ($_FILES["Banner3"]["type"] == "image/jpeg")
			|| ($_FILES["Banner3"]["type"] == "image/png")
			|| ($_FILES["Banner3"]["type"] == "image/pjpeg")
			&& ($_FILES["Banner2"]["size"] < 2097152)){
			$date = date("Y_S_y_js_m_F_M");
			$UploadBanner3 = "Banner3-".$_SESSION["Yiddn_login_Id"]."-". $date.".png";
			move_uploaded_file($tmp_name3,"images/Banner/".$UploadBanner3);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}else{
			 $UploadBanner3 ="";
		}
		/*---End Category 3----*/
	
	
		if(!empty($_POST['City'])) {
			$City = $_POST['City'];
		}else{
		    $errors[] ="* City is required field.";
		}

	if(empty($errors)) {
	
			$array = array(
			"Category"					=> mysqli_real_escape_string($db,$Category),
			"upgrade"					=> mysqli_real_escape_string($db,$upgrade),
			"Premium"					=> mysqli_real_escape_string($db,$Premium),
			"Banner"					=> mysqli_real_escape_string($db,$UploadBanner),
			"Category2"					=> mysqli_real_escape_string($db,$Category2),
			"upgrade2" 					=> mysqli_real_escape_string($db,$upgrade2),
			"Premium2" 					=> mysqli_real_escape_string($db,$Premium2),
			"Banner2" 					=> mysqli_real_escape_string($db,$UploadBanner2),
			"Category3" 				=> mysqli_real_escape_string($db,$Category3),
			"upgrade3" 					=> mysqli_real_escape_string($db,$upgrade3),
			"Premium3" 					=> mysqli_real_escape_string($db,$Premium3),
			"Banner3" 					=> mysqli_real_escape_string($db,$UploadBanner3),
			"City"						=> mysqli_real_escape_string($db,$City),
			"step" 						=> '3'

			);
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_etailer` SET `$key` = '$val' WHERE `OrderId` = '".$_SESSION['OrderId']."'";
	$res = mysqli_query($db, $sql);
	}
		if(empty($_POST['upgrade1']) && empty($_POST['Premium']) && 
		   empty($_POST['upgrade2']) && empty($_POST['Premium2']) &&
		   empty($_POST['upgrade3']) && empty($_POST['Premium3'])) {
$tb_etailer = 'SELECT * FROM `tb_etailer` WHERE `OrderId`="'.$_SESSION['OrderId'].'"';
$result = $db->query($tb_etailer);
$total  = $result->num_rows;
$row = $result->fetch_assoc();
			   
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
         <td>'.$row['CompanyName'].'</td>
      </tr>
	  <tr>
        <td width="43%" valign="top"><strong>Contact Name</strong></td>
        <td width="57%">'.$row['Agent'].'</td>
      </tr>
	  <tr>
        <td width="43%" valign="top"><strong>Website Address</strong></td>
        <td width="57%">'.$row['CompanyWebsite'].'</td>
      </tr>
	  <tr>
        <td width="43%" valign="top"><strong>Category</strong></td>
        <td width="57%">';
if($Category!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$Category;
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= $row_subcat['Title'];
}
$body .='</td>
      </tr>
	  <tr>
        <td width="43%" valign="top"><strong>Short Description</strong></td>
        <td width="57%">'.$row['ShortDescription'].'</td>
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
$mail->setFrom($_SESSION['Yiddn_login_EmailAddress'], $row_home->Title);
$mail->addReplyTo($_SESSION['Yiddn_login_EmailAddress'], $row_home->Title);
$mail->addAddress($row_home->EmailTo, $row_home->Title);
$mail->Subject = "New Request Retailers  - ".$row_home->Title;
$mail->Body=$body;
$mail->send();	
		/////User Email New Listing /////////////
		$select = "SELECT * FROM `account` WHERE `EmailAddress` = '".$_SESSION['Yiddn_login_EmailAddress']."'";
		$result = mysqli_query($db, $select);
		$row = $result->fetch_assoc(); 
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
$mail->addAddress($_SESSION['Yiddn_login_EmailAddress'],$row_home->Title); 
$mail->Subject = "New Request Retailers - ".$row_home->Title;
$mail->Body=$body_;
$mail->send();
$_SESSION['success']="Your ad or listing is currently pending.<br> We will review and confirm the status as soon as possible.";				 		
	        header("Location:dashboard");
		}else{
		   header("Location:jewish-etailers-step4");
		}
		
	}else{
		   header("Location:jewish-etailers-step3");
	}
}
?>
