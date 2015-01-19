<?php require_once('inc.files.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Signup</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="css/inner.css" rel="stylesheet">
 <link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
  <link href="css/innermedia.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
  <link rel="stylesheet" href="css/newform.css" type="text/css" />
   <link rel="stylesheet" href="css/dropdown.css" />


 
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
   </head>
<body>	
<!--Header -->  
<?php require_once('inc.header.php'); ?>
<!--/Header -->

<!--Navigation -->
<?php require_once('inc.navigation.php'); ?>
<!--/Navigation -->

   <div class="cl">&nbsp;</div>

   	<section id="content-main" style="width:100%;">
    <div class="shell">
    
    <div id="main">
	<div id='article' style="width:90%;">
 
  <h1>Become a Member</span></h1>
  <p><b>Yiddn.com is more than a directory — it’s a community.</b><br>
   By joining our site you become one of thousands of Yiddn who want a faster, easier way to find Jewish resources on the web, and to see a safer Internet for our families. Your membership includes:</p>
 
<p style="color:#906; line-height:35px; margin-bottom:25px;">
1. Complimentary listing of your organization or business (if you have one).<br>
 

2. Access to our BookMark function, enabling you to save and share favorite links on the site.<br>
 

3. Email updates of new listings and features, as well as special promotions in your area.
 </p> 

     
        
         <form enctype="multipart/form-data" class="newform" method="post">
<?php require_once('signup-checking.php');?>
<?php
if(isset($errors)) {
foreach($errors as $err) {
?>
<?php echo $err;?>
<?php
     }
   }
?>  
 <fieldset class="newfiled">
    <legend><h3>Create New Account</h3></legend>

<div class="inputitem">
<label class="FirstName">First Name: <span class="purpule">*required </span></label>
<input id="FirstName" class="large" name="FirstName" type="text" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '' ?>" required/>     
</div>
    
<div class="inputitem">
<label class="LastName">Last Name: <span class="purpule">*required </span></label>
<input  id="LastName" name="LastName" class="large" type="text" value="<?php echo isset($_POST['LastName']) ? $_POST['LastName'] : '' ?>" required /> 
</div>
         

<div class="inputitem">
<label class="City">City: <span class="purpule">*required </span></label>
<input  id="City" name="City" class="large"  type="text" value="<?php echo isset($_POST['City']) ? $_POST['City'] : '' ?>" required /> 
</div> 
         
<div class="inputitem">
    <label class="StateProvince">State Province: <span class="purpule">*required </span></label>
<input  id="StateProvince" name="StateProvince" class="large" type="text" value="<?php echo isset($_POST['StateProvince']) ? $_POST['StateProvince'] : '' ?>" required /> 
    </div>
    
    
    <div class="inputitem">
    <label class="Zipcode">Zipcode: <span class="purpule">*required </span></label>
<input  id="Zipcode" name="Zipcode" class="large" type="text" value="<?php echo isset($_POST['Zipcode']) ? $_POST['Zipcode'] : '' ?>" required />        
    </div>

    


<div class="inputitem">
      <label class="Country">Country: <span class="purpule">*required </span></label>
      <div class="item-cont">
 		<select name="Country" required>
                <option value="">Select Country</option>
                <option value="AF">Afghanistan</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AG">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AG">Antigua &amp; Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AA">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia</option>
                <option value="BL">Bonaire</option>
                <option value="BA">Bosnia &amp; Herzegovina</option>
                <option value="BW">Botswana</option>
                <option value="BR">Brazil</option>
                <option value="BC">British Indian Ocean Ter</option>
                <option value="BN">Brunei</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="IC">Canary Islands</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CD">Channel Islands</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CI">Christmas Island</option>
                <option value="CS">Cocos Island</option>
                <option value="CO">Colombia</option>
                <option value="CC">Comoros</option>
                <option value="CG">Congo</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CT">Cote D'Ivoire</option>
                <option value="HR">Croatia</option>
                <option value="CU">Cuba</option>
                <option value="CB">Curacao</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="TM">East Timor</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FA">Falkland Islands</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="FS">French Southern Ter</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GB">Great Britain</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GN">Guinea</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HW">Hawaii</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IA">Iran</option>
                <option value="IQ">Iraq</option>
                <option value="IR">Ireland</option>
                <option value="IM">Isle of Man</option>
                <option value="IL">Israel</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="NK">Korea North</option>
                <option value="KS">Korea South</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Laos</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macau</option>
                <option value="MK">Macedonia</option>
                <option value="MG">Madagascar</option>
                <option value="MY">Malaysia</option>
                <option value="MW">Malawi</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="ME">Mayotte</option>
                <option value="MX">Mexico</option>
                <option value="MI">Midway Islands</option>
                <option value="MD">Moldova</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Nambia</option>
                <option value="NU">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="AN">Netherland Antilles</option>
                <option value="NL">Netherlands (Holland, Europe)</option>
                <option value="NV">Nevis</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NW">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau Island</option>
                <option value="PS">Palestine</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PO">Pitcairn Island</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="ME">Republic of Montenegro</option>
                <option value="RS">Republic of Serbia</option>
                <option value="RE">Reunion</option>
                <option value="RO">Romania</option>
                <option value="RU">Russia</option>
                <option value="RW">Rwanda</option>
                <option value="NT">St Barthelemy</option>
                <option value="EU">St Eustatius</option>
                <option value="HE">St Helena</option>
                <option value="KN">St Kitts-Nevis</option>
                <option value="LC">St Lucia</option>
                <option value="MB">St Maarten</option>
                <option value="PM">St Pierre &amp; Miquelon</option>
                <option value="VC">St Vincent &amp; Grenadines</option>
                <option value="SP">Saipan</option>
                <option value="SO">Samoa</option>
                <option value="AS">Samoa American</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tome &amp; Principe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="RS">Serbia</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="OI">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Sudan</option>
                <option value="SR">Suriname</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syria</option>
                <option value="TA">Tahiti</option>
                <option value="TW">Taiwan</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania</option>
                <option value="TH">Thailand</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad &amp; Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TU">Turkmenistan</option>
                <option value="TC">Turks &amp; Caicos Is</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States of America</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VS">Vatican City State</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Vietnam</option>
                <option value="VB">Virgin Islands (Brit)</option>
                <option value="VA">Virgin Islands (USA)</option>
                <option value="WK">Wake Island</option>
                <option value="WF">Wallis &amp; Futana Is</option>
                <option value="YE">Yemen</option>
                <option value="ZR">Zaire</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
              </select>
    </div>
    </div>
    

    
<div class="inputitem">
<label class="Email">Email: <span class="purpule">*required </span></label>
<input  id="Email" name="Email" class="large" type="email" required  onBlur="return check_Email();" value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : '' ?>" />  
<span id="Info"></span>
</div>
    
<div class="inputitem">
<label class="password1">Password: <span class="purpule">*required </span></label>
<input  id="password1" name="Password" class="large"  type="password" pattern=".{5,}" title="5 characters minimum" required />  
</div>
    
    
<div class="inputitem">
<label class="password2">Confrim Password: <span class="purpule">*required </span></label>
<input  id="password2" name="ConfrimPassword" class="large" type="password" pattern=".{5,}" title="5 characters minimum" required />
</div>

<div class="inputitem">
<label class="PhoneNumber">Phone Number:</label>
<input  id="PhoneNumber" name="PhoneNumber" class="large" type="text" value="<?php echo isset($_POST['PhoneNumber']) ? $_POST['PhoneNumber'] : '' ?>" />   
</div>

    
     <div class="inputitem">
    <label for="OurSite">How did you hear about our site?</label>
			<textarea id="OurSite" name="OurSite" style="height:80px;"><?php echo isset($_POST['OurSite']) ? $_POST['OurSite'] : '' ?></textarea>
    </div>

    <div class="element-checkbox"  title="Checkboxes" >
    <label>
    <input type="checkbox" value="yes" id="EmailList"  name="EmailList" class="chk"/>
    <span>Please add me to the email list.</span>
    </label>
    </div> 


<div class="inputitem">
    <img src="captcha.php" id="captcha" /><br />
	<a onClick="document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha_input').focus();"
    id="change-image" style="cursor:pointer;">Not readable? Change text.</a><br />
    <input type="text" name="captcha" id="captcha_input" class="large"  style="width:250px;" required>
</div>


    
     </fieldset>
     
     
    
    
    
     
     
    
    
      <div class="submit">
      <input type="submit" value="Submit" name="submit" onClick="return match_pass()"/>        

      </div>
          

  
    
      </form>
 <script type="text/javascript" src="js/newform.js"></script>

       
     
   
     
         
         
         
           
         
         
           
         
         
          
         
         
          
         
        
                  
       
  	</div>
	</div>
    
    
    
	 
		
	</div>
 

</section>
 
   
    <div class="cl">&nbsp;</div>
<!-- Footer -->
<?php require_once('inc.footer.php'); ?>
<!-- /Footer -->
  
<!-- Java Script -->       
 
 <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
 <script src="js/jquery.min.js"></script>
 	<script src="js/modernizr.js"></script>
     <script src="js/jquery.min.js"></script>
     <script src="js/jquery.easing.min.js"></script>
 <script src="js/login.js"></script>
  <script src="js/custom.js"></script>
  <!-- Java Script -->

<script>
function match_pass() {
        var pass1 = document.getElementById("password1").value;
        var pass2 = document.getElementById("password2").value;
        if (pass1 != pass2) {
            alert("Passwords Do not match");
            document.getElementById("password1").style.borderColor = "#E34234";
            document.getElementById("password2").style.borderColor = "#E34234";
			return false;
        }
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