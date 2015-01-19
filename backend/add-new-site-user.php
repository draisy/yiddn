<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/add-new-site-user-query.php'); ?>
<head>
<title>Add New Site User - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>
<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Add New Site User </h1>
  </div>
  <div class="row">
   
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading"><i class="icon-edit-sign"></i>Add New</div>
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
                  <label for="FirstName">First Name</label>
                  <input class="form-control" id="FirstName" name="FirstName" placeholder="First Name" type="text" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '' ?>"/>
                </div>
                
                <div class="form-group">
                  <label for="LastName">Last Name</label>
                  <input class="form-control" id="LastName" name="LastName" placeholder="Last Name" type="text" value="<?php echo isset($_POST['LastName']) ? $_POST['LastName'] : '' ?>" />
                </div>
                
               <div class="form-group">
                  <label for="City">City</label>
                  <input class="form-control" id="City" name="City" placeholder="City" type="text" value="<?php echo isset($_POST['City']) ? $_POST['City'] : '' ?>" />
                </div>
                
                <div class="form-group">
                  <label for="StateProvince">State / Province</label>
                  <input class="form-control" id="StateProvince" name="StateProvince" placeholder="State / Province" type="text" value="<?php echo isset($_POST['StateProvince']) ? $_POST['StateProvince'] : '' ?>" />
                </div>
                
                <div class="form-group">
                  <label for="Zipcode">Zipcode</label>
                  <input class="form-control" id="Zipcode" name="Zipcode" placeholder="Zipcode" type="text" value="<?php echo isset($_POST['Zipcode']) ? $_POST['Zipcode'] : '' ?>" />
                </div>
                
                <div class="form-group">
                  <label for="Country">Country</label>
                  <input class="form-control" id="Country" name="Country" placeholder="Country" type="text" value="<?php echo isset($_POST['Country']) ? $_POST['Country'] : '' ?>" />
                </div>
                
                <div class="form-group">
                  <label for="Email">Email Address</label>
                  <input class="form-control" id="Email" name="Email" placeholder="Enter email" type="email" required  onBlur="return check_Email();" />
               <span id="Info"></span>
                </div>
                
                <div class="form-group">
                  <label for="PhoneNumber">Phone Number</label>
                  <input class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number" type="text" value="<?php echo isset($_POST['PhoneNumber']) ? $_POST['PhoneNumber'] : '' ?>" />
                </div>
                
                <div class="form-group">
                  <label for="OurSite">How did you hear about our site?</label>
                  <input class="form-control" id="OurSite" name="OurSite" placeholder="How did you hear about our site?" type="text" value="<?php echo isset($_POST['OurSite']) ? $_POST['OurSite'] : '' ?>" />
                </div>
                
                <div class="form-group">
                    <label class="checkbox-inline">
                    <input type="checkbox" value="yes" checked name="EmailList" />
                    Please add me to the email list.
                    </label>
              </div>
                
                <div class="form-group">
                  <label for="password1">Password</label>
                  <input class="form-control" id="password1" name="Password" placeholder="Password" type="password" pattern=".{5,}" title="5 characters minimum" required />
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
                <input type="submit" name="submit" class="btn btn-primary" value="Submit" onClick="match_pass()">
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