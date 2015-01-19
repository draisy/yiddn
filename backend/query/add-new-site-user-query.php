<?php
require_once('../newsletter/email.php');
date_default_timezone_set('Etc/UTC');

require '../include/PHPMailerAutoload.php';
$errors = array();
$success = null;
$FirstName 		    = '';
$LastName 		    = '';
$City 		    	= '';
$StateProvince 		= '';
$Zipcode 		    = '';
$Country 		    = '';
$PhoneNumber 		= '';
$OurSite 		    = '';
$EmailList 		    = '';
$Email				= '';
$Password			= '';
$ConfrimPassword	= '';
$key				= '';

if(isset($_POST['submit'])){
$FirstName 		    = $_POST['FirstName']; 
$LastName 		    = $_POST['LastName']; 
$City 		    	= $_POST['City']; 
$StateProvince 		= $_POST['StateProvince']; 
$Zipcode 		    = $_POST['Zipcode']; 
$Country 		    = $_POST['Country']; 
$PhoneNumber 		= $_POST['PhoneNumber']; 
$OurSite 		    = $_POST['OurSite']; 
$EmailList 		    = $_POST['EmailList']; 
$Email 		    	= $_POST['Email']; 
$Password	    	= $_POST['Password'];  
$Sendemail	    	= $_POST['sendemail'];  
$DateAdded 			= date("Y-m-d H:i:s");
$body	       		= '';  
$headers 	    	= '';  
$header 	    	= '';


	    if(!empty($_POST['FirstName'])) {
			$FirstName = $_POST['FirstName'];
		}else{
		    $FirstName="";
		}

	    if(!empty($_POST['LastName'])) {
			$LastName = $_POST['LastName'];
		}else{
		    $LastName="";
		}

	    if(!empty($_POST['City'])) {
			$City = $_POST['City'];
		}else{
		    $City="";
		}

	    if(!empty($_POST['StateProvince'])) {
			$StateProvince = $_POST['StateProvince'];
		}else{
		    $StateProvince="";
		}

	    if(!empty($_POST['Zipcode'])) {
			$Zipcode = $_POST['Zipcode'];
		}else{
		    $Zipcode="";
		}

	    if(!empty($_POST['Country'])) {
			$Country = $_POST['Country'];
		}else{
		    $Country="";
		}

	    if(!empty($_POST['PhoneNumber'])) {
			$PhoneNumber = $_POST['PhoneNumber'];
		}else{
		    $PhoneNumber="";
		}

	    if(!empty($_POST['OurSite'])) {
			$OurSite = $_POST['OurSite'];
		}else{
		    $OurSite="";
		}

	    if(!empty($_POST['EmailList'])) {
			$EmailList = $_POST['EmailList'];
		}else{
		    $EmailList="no";
		}

  
	if(!empty($_POST['Email'])) {
		
		$Email = $_POST['Email'];
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$Email))
		{
		 $errors[] ="*Invalid email format";
		}
	
	}else{
		$errors[] ="*Email Address is required field.";
	}

  if(!empty($_POST['Password'])) {
		$Password = $_POST['Password'];
	}else{
	   $errors[] ="* Password is required field.";
	}

	 if(!empty($_POST['ConfrimPassword'])) {
		$ConfrimPassword = $_POST['ConfrimPassword'];
	}else{
	   $errors[] ="* Confrim Password is required field.";
	}

	if($_POST['Password'] != $_POST['ConfrimPassword']){
		$errors[] ="* Password & Confirm password does not match!";
	}

$pass_encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $Password, MCRYPT_MODE_CBC, md5(md5($key))));
$activation = md5(uniqid(rand(), true));

	
			if(empty($errors)) {
			
				$array = array(
				
							"FirstName"			=> $FirstName,
							"LastName"			=> $LastName,
							"City"				=> $City,
							"StateProvince"		=> $StateProvince,
							"Zipcode"			=> $Zipcode,
							"Country"			=> $Country,
							"PhoneNumber"		=> $PhoneNumber,
							"OurSite"			=> $OurSite,
							"EmailList"			=> $EmailList,
							"EmailAddress"		=> $Email,
							"Password"			=> $pass_encrypted,
							"DateCreated" 		=> $DateAdded,
							"AccountType" 		=> '3',
							"Status" 			=> $activation
							
		);
	$query = "select * from `account` where `EmailAddress`= '".$Email."'";
	$result = $db->query($query);
	if($result->num_rows > 0){		
			$errors[] ='The Email is Already registered in our system.';
	}	
	else {
			
			   $sql  = "INSERT INTO `account`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   if($Sendemail=="yes")
						{
							
$ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
							$parts = explode('@', $Email);
							$username = $parts[0];
							$body .='
							<table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr> <td align="left" valign="top">';
		$body .= $inc_header;
		$body .='
	</td></tr>
  <tr>
    <td align="right" style="font-size:18px; font-weight:bold">
	Account Verify
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Dear '.$username.'<br><br><br>
	<strong>Your ID</strong> :'.$Email.'</td>
  </tr>
  <tr>
    <td>
	<strong>Password</strong> :'.$Password.'</td>
  </tr>
  <tr>
     <td>
	  <a href="http://www.yiddn.com/member-area">Please  Click here to Login.</a>
	 </td>
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
$mail->setFrom($row_home->EmailFrom, $row_home->Title);
$mail->addReplyTo($row_home->EmailTo, $row_home->Title);
$mail->addAddress($Email, $row_home->Title); 
$mail->Subject = "Please verify your Email Address - ".$row_home->Title;
$mail->Body=$body;
$mail->send();
$success.='A Confirmation email has been sent to the email address.<br>';
	}	
				 $success.='Added Successfully';
			     @header( "refresh:0;url=manage-site-users");
				}
	}
}

?>