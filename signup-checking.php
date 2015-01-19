<?php  
require_once('backend/include/config.php');
require_once('newsletter/email.php');
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
		$errors[] = "<div class='required' *Invalid email format.</div>";
		}
	
	}else{
		$errors[] =  "<div class='required'>* Email Address is required field.</div>";
	}

  if(!empty($_POST['Password'])) {
		$Password = $_POST['Password'];
	}else{
		$errors[] =  "<div class='required'>* Password is required field.</div>";
	}

	 if(!empty($_POST['ConfrimPassword'])) {
		$ConfrimPassword = $_POST['ConfrimPassword'];
	}else{
		$errors[] =  "<div class='required'>* Confrim Password is required field</div>.";
	}

	if($_POST['Password'] != $_POST['ConfrimPassword']){
		$errors[] = '<div class="required">* Password & Confirm password does not match!</div>';
	}

if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
		$errors[] = '<div class="required">* Invalid captcha</div>';
	} else { 
$pass_encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $Password, MCRYPT_MODE_CBC, md5(md5($key))));
$activation = md5(uniqid(rand(), true));

	$query = "select * from `account` where `EmailAddress`= '".$Email."'";
	$result = $db->query($query);
	if($result->num_rows > 0){		
			$errors[] = '<div class="required">The Email is Already registered in our system.</div>';
	}	
	
	
			if(empty($errors)){
			
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

			   $sql  = "INSERT INTO `account`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);


$subject  = "Please verify your Email Address - ".$row_home->Title;
$from     = $row_home->EmailFrom;
$to       = $Email;
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
    <td>
    <p><strong>Dear '.$FirstName.'</strong>,<br>
   Welcome to your newest experience on the web! <br>
   <br>
  <em>Shalom aleichem</em> and thank you for signing up at Yiddn.com!  We&#39;re thrilled to have you join us and to add another Yid to our ranks. Just  think of us as your Jewish best friend; whatever you&#39;re looking for, we&#39;ll help  you find it.<br>
  <br>
  &nbsp;Yiddn.com is your new virtual home,  where&nbsp;we have everything you need: If it&#39;s online, if it&#39;s Jewish, you can  find it right here in our listings! With some creativity and design, and lots  of <em>siyatta dishmaya</em>, we&#39;ve created a great new environment for you and  we&#39;d love to show you around.<br>
  <br>
  In the spirit of <em>hachnosas orchim</em>, we  invite you to click here, complete registration, and we&#39;ll be on our way .  &nbsp;<br>
  <br>
  <a href="http://yiddn.com/newsite?confirmkey='.$activation.'&registerkey=registerkey&submitkey=Submit">Click Here</a></p>
<p>You can find your  credentials below:<br>
  Username: '.$Email.'<br>
  Password: '.$Password.'</p>
<p>Once again,<em> Baruch haba</em>! <br>
  - Your fellow yiddn</p>
  <small style="font-size:11px">
<p>Glossary of terms:<br>
  Shalom aleichem:   Lit. Peace be unto you, but more commonly the  Jewish vocal version of the fist pump<br>
  Siyatta dishmaya:  Lit. Help of G-d, since you wouldn&#39;t really  be reading this otherwise<br>
  Hachnosas orchim:  Lit. Welcoming guests,  usually accompanied with a bowl of chicken soup, or in our case, a hyperlink<br>
  Baruch Haba: Lit.  Welcome, because literally,  we welcome you!</p>
  </small>
	</td>
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
</table></div>
';
$headers .= 'MIME-Version: 1.0'."\r\n";
$header  .= 'Content-Type: image/jpg';
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$row_home->Title.' <'.$row_home->EmailFrom.'>, '."\r\n";
$headers .= 'Reply-to: '.$row_home->Title.' <'.$row_home->EmailTo.'>,'."\r\n";
mail($to,$subject,$body,$headers);
echo "<div class='success'>
A Confirmation email has been sent to the email address.<br>
Please click on the link in the email to verify/activate your account.<br>
If you do not receive the message within a few minutes,<br> please check your bulk or spam email folders.</div>
<br>       
";
		}
	}
}
?>