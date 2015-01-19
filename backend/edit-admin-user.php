<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/edit-admin-user-query.php'); ?>
<head>
<title>Edit Admin User - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>

<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Edit Admin User </h1>
  </div>
  <div class="row">
   
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading"><i class="icon-edit-sign"></i>Edit Admin User</div>
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

<?php 
$query = "select * from `account` where `Id`= ".base64_decode($_GET['y']);
$result = $db->query($query);
if(@$result->num_rows > 0){
$row_account = $result->fetch_object();
?>
            <div class="widget-content padded">
              <form method="post">
                <div class="form-group">
                  <label for="Email">Email Address</label>
                  <input class="form-control"  placeholder="Enter email" type="email" value="<?php echo $row_account->EmailAddress;?>" disabled />
			      <input class="form-control" id="Email" name="Email" type="hidden" value="<?php echo $row_account->EmailAddress;?>" />
                  <input class="form-control" id="Id" name="Id" type="hidden" value="<?php echo $row_account->Id;?>" />
               <span id="Info"></span>
                </div>
                <div class="form-group">
                  <label for="password1">Password</label>
                  <input class="form-control" id="password1" name="Password" placeholder="Password" type="password" pattern=".{5,}" title="5 characters minimum" value="<?php if(!empty($row_account->Password)){ echo rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($row_account->Password), MCRYPT_MODE_CBC, md5(md5($key))), "\0");} ?>" />
               
<script>
function toggleAndChangeText() {
     $('#divToToggle').toggle();
     if ($('#divToToggle').css('display') == 'none') {
          $('#aTag').html('Show');
     }
     else {
          $('#aTag').html('Hide');
     }
}
</script>
<a id="aTag" href="javascript:toggleAndChangeText();">
  Show
</a>
<div id="divToToggle" style="display:none">
<?php echo rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($row_account->Password), MCRYPT_MODE_CBC, md5(md5($key))), "\0"); ?>
</div>
                </div>
                <div class="form-group">
                  <label for="password2">Confrim Password</label>
                  <input class="form-control" id="password2" name="ConfrimPassword" placeholder="Confrim Password" type="password" pattern=".{5,}" title="5 characters minimum" required />
                </div>
                <div class="form-group">
                <label class="control-label">Send Email</label>
              <div class="form-group">
                  <select class="form-control" name="sendemail">
                    <option value="yes">Yes</option>
                    <option value="no" selected>No</option>
                  </select>
                </div>
              </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Update" onClick="match_pass()">
                <input type="reset" class="btn btn-default-outline" value="Cancel">
              </form>
            </div>
           <?php }?> 
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