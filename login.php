<?php 
if(isset($_POST['login'])){
	$key	  = '';
	$email 	  = $_POST['email'];
	$password = $_POST['password'];   

	if(!empty($email) && !empty($password)) {
	
$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $password, MCRYPT_MODE_CBC, md5(md5($key))));
$account   = "SELECT * FROM `account` WHERE `EmailAddress`= '".$email."' AND `Password`='".$encrypted."'";
$result    = $db->query($account);
           if(mysqli_num_rows($result) > 0)
            {
            $num = $result->fetch_assoc();
				if($num['Status']=="1")
				{
					$_SESSION['Yiddn_login_Id']           = $num['Id'];
					$_SESSION['Yiddn_login_EmailAddress'] = $num['EmailAddress'];
					header("Location:".ADDRESS_SITE."dashboard");
			  	}
			}
		}
     }
?>