<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
$errors = array();
$success = null;
?>
<!DOCTYPE html>
<html>
<head>
<title>Account Setting - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>

<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Account Setting </h1>
  </div>
  <div class="row">
   
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading"><i class="icon-edit-sign"></i>Account Setting</div>


<?php 
if(isset($_POST['submit'])){
$key ='';
$current_pw = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key),$_POST['current_pw'], MCRYPT_MODE_CBC, md5(md5($key))));
$new_pw = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key),$_POST['new_pw'], MCRYPT_MODE_CBC, md5(md5($key))));
$confirm_pw =base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key),$_POST['confirm_pw'], MCRYPT_MODE_CBC, md5(md5($key))));
		
			$query = "SELECT * FROM `account` WHERE Id = 1";
			$result = mysqli_query($db, $query);
			//$row = $result->fecth_object();
			$row = mysqli_fetch_object($result);
			$pass = $row->Password;
			if($_POST['current_pw']==""){
			$errors[] ="Please Enter Current Password";
			}
			if($_POST['new_pw']==""){
			$errors[] ="Please Enter New Password";
			}
			if($_POST['confirm_pw']==""){
			$errors[] ="Please Enter Confirm Password";
			}
			if($_POST['new_pw'] != $_POST['confirm_pw']){
			$errors[] ="New Password & Confirm Password does not match!";
			}
			if($current_pw != $pass){
			$errors[] ="Current Password does not match!";
			}
			if($current_pw == $pass){
			$query = "update `account` SET `Password`='$new_pw' where Id=1";
			$run = mysqli_query($db, $query);
			$success.="Updated Successfully";
			//header("refresh:1;url=account-setting");
			echo "<script>window.open('account-setting','_self')</script>";
			}else{
			$errors[] = "Please try again";
			}
		}

?>
<?php if(isset($success)) {?>
<div class="alert alert-success">
<button class="close" data-dismiss="alert">&times;</button>
<strong><?php echo $success;?></strong>
</div>
<?php }?> 


<?php
if(isset($errors)) {
foreach($errors as $err) {
?>
 <div class="alert alert-danger">
<button class="close" data-dismiss="alert">&times;</button>
<strong><?php echo $err;?></strong>
</div>
<?php
     }
   }
?>
            <div class="widget-content padded">
              <form method="post">
               
<div class="form-group">
<label for="password1">Current Password</label>
<input class="form-control" id="current_pw" name="current_pw" placeholder="Current Password" type="password" pattern=".{5,}" title="5 characters minimum" required  />
</div>
              
<div class="form-group">
<label for="password1">New Password</label>
<input class="form-control" id="password1" name="new_pw" placeholder="New Password" type="password" pattern=".{5,}" title="5 characters minimum" required  />
</div>
              
              
<div class="form-group">
<label for="password1">Confirm Password</label>
<input class="form-control" id="password2" name="confirm_pw" placeholder="Confirm Password" type="password" pattern=".{5,}" title="5 characters minimum" required  />
</div>
               
                <input type="submit" name="submit" class="btn btn-primary" value="Update" onClick="match_pass()">
                <input type="reset" class="btn btn-default-outline" value="Cancel">
              </form>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function match_pass() {
document.getElementById("password1").onchange = validatePassword;
document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
document.getElementById("password2").setCustomValidity("Passwords Don't Match");
else
document.getElementById("password2").setCustomValidity('');  
//empty string means no validation error
}

function check_Email(){
	var Email = $("#Email").val();
	if(Email.length > 2){
		$.post("check_username_availablity.php", {
			Email: $('#Email').val(),
		}, function(response){
			$('#Info').fadeOut();
			 $('#Loading').hide();
			setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
		});
		return false;
	}
}
function finishAjax(id, response){
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn(1000);
}
</script>
</body>
</html>