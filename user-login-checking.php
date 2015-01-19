<?php  require_once('inc.files.php');
$key='';
if(isset($_POST['user-login'])){
$Email 	  =$_POST['Email'];
$Password = $_POST['Password'];   

	if(empty($Email)) {
	echo '<div class="required">* Email is required field.';
	}
	if(empty($Password)) {
	echo '<div class="required">* Password is required field.';
	}
	
	if(empty($errors)) {
	$password_encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $Password, MCRYPT_MODE_CBC, md5(md5($key))));

			$qs = "SELECT * FROM `account` WHERE `EmailAddress`= '".$Email."' AND `Password`='".$password_encrypted."'";
			$result = $db->query($qs);
			$result = mysqli_query($db, $qs);
           if(mysqli_num_rows($result) > 0)
            {
            $row = $result->fetch_assoc();
				if($row['Status']=="1")
				{
				$_SESSION['Yiddn_login_Id'] = $row['Id'];
				$_SESSION['Yiddn_login_EmailAddress'] = $row['EmailAddress'];
			   // header("Location:dashboard");
			   if(isset($_SESSION["Modal"])){
				   echo "<script>window.open('bookmark-action?bookmark=1','_self')</script>";
				   }else{
				echo "<script>window.open('dashboard','_self')</script>";
				   }
				}else{
				echo '<div class="required">* Account has been Not Activated.</div>';
				}
                        }else{
						echo '<div class="required">* Invalid Email Address & Password.</div>';
                }
        }
}
?>