<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - My Profile</title>
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
    <?php require_once('inc.dashboadlinks.php'); ?>

   <br><br><br>

 
   <h3>My Profile</h3>
  
<?php 
require_once('update-profile-checking.php');
$query = "select * from `account` where `Id`= ".$_SESSION['Yiddn_login_Id'];
$result = $db->query($query);
$row = $result->fetch_assoc();
?>
        
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
    <legend><h3>Creat New Account</h3></legend>

<div class="inputitem">
<label class="FirstName">First Name: <span class="purpule">*required </span></label>
<input id="FirstName" class="large" name="FirstName" type="text" value="<?php echo $row['FirstName']; ?>" required/>     
</div>
    
<div class="inputitem">
<label class="LastName">Last Name: <span class="purpule">*required </span></label>
<input  id="LastName" name="LastName" class="large" type="text" value="<?php echo $row['LastName']; ?>" required /> 
</div>
         

<div class="inputitem">
<label class="City">City: <span class="purpule">*required </span></label>
<input  id="City" name="City" class="large"  type="text" value="<?php echo $row['City']; ?>" required /> 
</div> 
         
<div class="inputitem">
    <label class="StateProvince">State Province: <span class="purpule">*required </span></label>
<input  id="StateProvince" name="StateProvince" class="large" type="text" value="<?php echo $row['StateProvince']; ?>" required /> 
    </div>
    
    
    <div class="inputitem">
    <label class="Zipcode">Zipcode: <span class="purpule">*required </span></label>
<input  id="Zipcode" name="Zipcode" class="large" type="text" value="<?php echo $row['Zipcode']; ?>" required />        
    </div>

    


<div class="inputitem">
      <label class="Country">Country: <span class="purpule">*required </span></label>
      <div class="item-cont">
 		<select name="Country" required>
<option value="">Select Country</option>
<option value="AF" <?php if($row['Country']=="AF"){echo ' selected="selected"';}?>>Afghanistan</option>
<option value="AL" <?php if($row['Country']=="AL"){echo ' selected="selected"';}?>>Albania</option>
<option value="DZ" <?php if($row['Country']=="DZ"){echo ' selected="selected"';}?>>Algeria</option>
<option value="AS" <?php if($row['Country']=="AS"){echo ' selected="selected"';}?>>American Samoa</option>
<option value="AD" <?php if($row['Country']=="AD"){echo ' selected="selected"';}?>>Andorra</option>
<option value="AG" <?php if($row['Country']=="AG"){echo ' selected="selected"';}?>>Angola</option>
<option value="AI" <?php if($row['Country']=="AI"){echo ' selected="selected"';}?>>Anguilla</option>
<option value="AG" <?php if($row['Country']=="AG"){echo ' selected="selected"';}?>>Antigua &amp; Barbuda</option>
<option value="AR" <?php if($row['Country']=="AR"){echo ' selected="selected"';}?>>Argentina</option>
<option value="AA" <?php if($row['Country']=="AA"){echo ' selected="selected"';}?>>Armenia</option>
<option value="AW" <?php if($row['Country']=="AW"){echo ' selected="selected"';}?>>Aruba</option>
<option value="AU" <?php if($row['Country']=="AU"){echo ' selected="selected"';}?>>Australia</option>
<option value="AT" <?php if($row['Country']=="AT"){echo ' selected="selected"';}?>>Austria</option>
<option value="AZ" <?php if($row['Country']=="AZ"){echo ' selected="selected"';}?>>Azerbaijan</option>
<option value="BS" <?php if($row['Country']=="BS"){echo ' selected="selected"';}?>>Bahamas</option>
<option value="BH" <?php if($row['Country']=="BH"){echo ' selected="selected"';}?>>Bahrain</option>
<option value="BD" <?php if($row['Country']=="BD"){echo ' selected="selected"';}?>>Bangladesh</option>
<option value="BB" <?php if($row['Country']=="BB"){echo ' selected="selected"';}?>>Barbados</option>
<option value="BY" <?php if($row['Country']=="BY"){echo ' selected="selected"';}?>>Belarus</option>
<option value="BE" <?php if($row['Country']=="BE"){echo ' selected="selected"';}?>>Belgium</option>
<option value="BZ" <?php if($row['Country']=="BZ"){echo ' selected="selected"';}?>>Belize</option>
<option value="BJ" <?php if($row['Country']=="BJ"){echo ' selected="selected"';}?>>Benin</option>
<option value="BM" <?php if($row['Country']=="BM"){echo ' selected="selected"';}?>>Bermuda</option>
<option value="BT" <?php if($row['Country']=="BT"){echo ' selected="selected"';}?>>Bhutan</option>
<option value="BO" <?php if($row['Country']=="BO"){echo ' selected="selected"';}?>>Bolivia</option>
<option value="BL" <?php if($row['Country']=="BL"){echo ' selected="selected"';}?>>Bonaire</option>
<option value="BA" <?php if($row['Country']=="BA"){echo ' selected="selected"';}?>>Bosnia &amp; Herzegovina</option>
<option value="BW" <?php if($row['Country']=="BW"){echo ' selected="selected"';}?>>Botswana</option>
<option value="BR" <?php if($row['Country']=="BR"){echo ' selected="selected"';}?>>Brazil</option>
<option value="BC" <?php if($row['Country']=="BC"){echo ' selected="selected"';}?>>British Indian Ocean Ter</option>
<option value="BN" <?php if($row['Country']=="BN"){echo ' selected="selected"';}?>>Brunei</option>
<option value="BG" <?php if($row['Country']=="BG"){echo ' selected="selected"';}?>>Bulgaria</option>
<option value="BF" <?php if($row['Country']=="BF"){echo ' selected="selected"';}?>>Burkina Faso</option>
<option value="BI" <?php if($row['Country']=="BI"){echo ' selected="selected"';}?>>Burundi</option>
<option value="KH" <?php if($row['Country']=="KH"){echo ' selected="selected"';}?>>Cambodia</option>
<option value="CM" <?php if($row['Country']=="CM"){echo ' selected="selected"';}?>>Cameroon</option>
<option value="CA" <?php if($row['Country']=="CA"){echo ' selected="selected"';}?>>Canada</option>
<option value="IC" <?php if($row['Country']=="IC"){echo ' selected="selected"';}?>>Canary Islands</option>
<option value="CV" <?php if($row['Country']=="CV"){echo ' selected="selected"';}?>>Cape Verde</option>
<option value="KY" <?php if($row['Country']=="KY"){echo ' selected="selected"';}?>>Cayman Islands</option>
<option value="CF" <?php if($row['Country']=="CF"){echo ' selected="selected"';}?>>Central African Republic</option>
<option value="TD" <?php if($row['Country']=="TD"){echo ' selected="selected"';}?>>Chad</option>
<option value="CD" <?php if($row['Country']=="CD"){echo ' selected="selected"';}?>>Channel Islands</option>
<option value="CL" <?php if($row['Country']=="CL"){echo ' selected="selected"';}?>>Chile</option>
<option value="CN" <?php if($row['Country']=="CN"){echo ' selected="selected"';}?>>China</option>
<option value="CI" <?php if($row['Country']=="CI"){echo ' selected="selected"';}?>>Christmas Island</option>
<option value="CS" <?php if($row['Country']=="CS"){echo ' selected="selected"';}?>>Cocos Island</option>
<option value="CO" <?php if($row['Country']=="CO"){echo ' selected="selected"';}?>>Colombia</option>
<option value="CC" <?php if($row['Country']=="CC"){echo ' selected="selected"';}?>>Comoros</option>
<option value="CG" <?php if($row['Country']=="CG"){echo ' selected="selected"';}?>>Congo</option>
<option value="CK" <?php if($row['Country']=="CK"){echo ' selected="selected"';}?>>Cook Islands</option>
<option value="CR" <?php if($row['Country']=="CR"){echo ' selected="selected"';}?>>Costa Rica</option>
<option value="CT" <?php if($row['Country']=="CT"){echo ' selected="selected"';}?>>Cote D'Ivoire</option>
<option value="HR" <?php if($row['Country']=="HR"){echo ' selected="selected"';}?>>Croatia</option>
<option value="CU" <?php if($row['Country']=="UC"){echo ' selected="selected"';}?>>Cuba</option>
<option value="CB" <?php if($row['Country']=="CB"){echo ' selected="selected"';}?>>Curacao</option>
<option value="CY" <?php if($row['Country']=="CY"){echo ' selected="selected"';}?>>Cyprus</option>
<option value="CZ" <?php if($row['Country']=="CZ"){echo ' selected="selected"';}?>>Czech Republic</option>
<option value="DK" <?php if($row['Country']=="DK"){echo ' selected="selected"';}?>>Denmark</option>
<option value="DJ" <?php if($row['Country']=="DJ"){echo ' selected="selected"';}?>>Djibouti</option>
<option value="DM" <?php if($row['Country']=="DM"){echo ' selected="selected"';}?>>Dominica</option>
<option value="DO" <?php if($row['Country']=="DO"){echo ' selected="selected"';}?>>Dominican Republic</option>
<option value="TM" <?php if($row['Country']=="TM"){echo ' selected="selected"';}?>>East Timor</option>
<option value="EC" <?php if($row['Country']=="EC"){echo ' selected="selected"';}?>>Ecuador</option>
<option value="EG" <?php if($row['Country']=="EG"){echo ' selected="selected"';}?>>Egypt</option>
<option value="SV" <?php if($row['Country']=="SV"){echo ' selected="selected"';}?>>El Salvador</option>
<option value="GQ" <?php if($row['Country']=="GQ"){echo ' selected="selected"';}?>>Equatorial Guinea</option>
<option value="ER" <?php if($row['Country']=="ER"){echo ' selected="selected"';}?>>Eritrea</option>
<option value="EE" <?php if($row['Country']=="EE"){echo ' selected="selected"';}?>>Estonia</option>
<option value="ET" <?php if($row['Country']=="ET"){echo ' selected="selected"';}?>>Ethiopia</option>
<option value="FA" <?php if($row['Country']=="FA"){echo ' selected="selected"';}?>>Falkland Islands</option>
<option value="FO" <?php if($row['Country']=="FO"){echo ' selected="selected"';}?>>Faroe Islands</option>
<option value="FJ" <?php if($row['Country']=="FJ"){echo ' selected="selected"';}?>>Fiji</option>
<option value="FI" <?php if($row['Country']=="FI"){echo ' selected="selected"';}?>>Finland</option>
<option value="FR" <?php if($row['Country']=="FR"){echo ' selected="selected"';}?>>France</option>
<option value="GF" <?php if($row['Country']=="GF"){echo ' selected="selected"';}?>>French Guiana</option>
<option value="PF" <?php if($row['Country']=="PF"){echo ' selected="selected"';}?>>French Polynesia</option>
<option value="FS" <?php if($row['Country']=="FS"){echo ' selected="selected"';}?>>French Southern Ter</option>
<option value="GA" <?php if($row['Country']=="GA"){echo ' selected="selected"';}?>>Gabon</option>
<option value="GM" <?php if($row['Country']=="GM"){echo ' selected="selected"';}?>>Gambia</option>
<option value="GE" <?php if($row['Country']=="GE"){echo ' selected="selected"';}?>>Georgia</option>
<option value="DE" <?php if($row['Country']=="DE"){echo ' selected="selected"';}?>>Germany</option>
<option value="GH" <?php if($row['Country']=="GH"){echo ' selected="selected"';}?>>Ghana</option>
<option value="GI" <?php if($row['Country']=="GI"){echo ' selected="selected"';}?>>Gibraltar</option>
<option value="GB" <?php if($row['Country']=="GB"){echo ' selected="selected"';}?>>Great Britain</option>
<option value="GR" <?php if($row['Country']=="GR"){echo ' selected="selected"';}?>>Greece</option>
<option value="GL" <?php if($row['Country']=="GL"){echo ' selected="selected"';}?>>Greenland</option>
<option value="GD" <?php if($row['Country']=="GD"){echo ' selected="selected"';}?>>Grenada</option>
<option value="GP" <?php if($row['Country']=="GP"){echo ' selected="selected"';}?>>Guadeloupe</option>
<option value="GU" <?php if($row['Country']=="GU"){echo ' selected="selected"';}?>>Guam</option>
<option value="GT" <?php if($row['Country']=="GT"){echo ' selected="selected"';}?>>Guatemala</option>
<option value="GN" <?php if($row['Country']=="GN"){echo ' selected="selected"';}?>>Guinea</option>
<option value="GY" <?php if($row['Country']=="GY"){echo ' selected="selected"';}?>>Guyana</option>
<option value="HT" <?php if($row['Country']=="HT"){echo ' selected="selected"';}?>>Haiti</option>
<option value="HW" <?php if($row['Country']=="HW"){echo ' selected="selected"';}?>>Hawaii</option>
<option value="HN" <?php if($row['Country']=="HN"){echo ' selected="selected"';}?>>Honduras</option>
<option value="HK" <?php if($row['Country']=="HK"){echo ' selected="selected"';}?>>Hong Kong</option>
<option value="HU" <?php if($row['Country']=="HU"){echo ' selected="selected"';}?>>Hungary</option>
<option value="IS" <?php if($row['Country']=="IS"){echo ' selected="selected"';}?>>Iceland</option>
<option value="IN" <?php if($row['Country']=="IN"){echo ' selected="selected"';}?>>India</option>
<option value="ID" <?php if($row['Country']=="ID"){echo ' selected="selected"';}?>>Indonesia</option>
<option value="IA" <?php if($row['Country']=="IA"){echo ' selected="selected"';}?>>Iran</option>
<option value="IQ" <?php if($row['Country']=="IQ"){echo ' selected="selected"';}?>>Iraq</option>
<option value="IR" <?php if($row['Country']=="IR"){echo ' selected="selected"';}?>>Ireland</option>
<option value="IM" <?php if($row['Country']=="IM"){echo ' selected="selected"';}?>>Isle of Man</option>
<option value="IL" <?php if($row['Country']=="IL"){echo ' selected="selected"';}?>>Israel</option>
<option value="IT" <?php if($row['Country']=="IT"){echo ' selected="selected"';}?>>Italy</option>
<option value="JM" <?php if($row['Country']=="JM"){echo ' selected="selected"';}?>>Jamaica</option>
<option value="JP" <?php if($row['Country']=="JP"){echo ' selected="selected"';}?>>Japan</option>
<option value="JO" <?php if($row['Country']=="JO"){echo ' selected="selected"';}?>>Jordan</option>
<option value="KZ" <?php if($row['Country']=="KZ"){echo ' selected="selected"';}?>>Kazakhstan</option>
<option value="KE" <?php if($row['Country']=="KE"){echo ' selected="selected"';}?>>Kenya</option>
<option value="KI" <?php if($row['Country']=="KI"){echo ' selected="selected"';}?>>Kiribati</option>
<option value="NK" <?php if($row['Country']=="NK"){echo ' selected="selected"';}?>>Korea North</option>
<option value="KS" <?php if($row['Country']=="KS"){echo ' selected="selected"';}?>>Korea South</option>
<option value="KW" <?php if($row['Country']=="KW"){echo ' selected="selected"';}?>>Kuwait</option>
<option value="KG" <?php if($row['Country']=="KG"){echo ' selected="selected"';}?>>Kyrgyzstan</option>
<option value="LA" <?php if($row['Country']=="LA"){echo ' selected="selected"';}?>>Laos</option>
<option value="LV" <?php if($row['Country']=="LV"){echo ' selected="selected"';}?>>Latvia</option>
<option value="LB" <?php if($row['Country']=="LB"){echo ' selected="selected"';}?>>Lebanon</option>
<option value="LS" <?php if($row['Country']=="LS"){echo ' selected="selected"';}?>>Lesotho</option>
<option value="LR" <?php if($row['Country']=="LR"){echo ' selected="selected"';}?>>Liberia</option>
<option value="LY" <?php if($row['Country']=="LY"){echo ' selected="selected"';}?>>Libya</option>
<option value="LI" <?php if($row['Country']=="LI"){echo ' selected="selected"';}?>>Liechtenstein</option>
<option value="LT" <?php if($row['Country']=="LT"){echo ' selected="selected"';}?>>Lithuania</option>
<option value="LU" <?php if($row['Country']=="LU"){echo ' selected="selected"';}?>>Luxembourg</option>
<option value="MO" <?php if($row['Country']=="MO"){echo ' selected="selected"';}?>>Macau</option>
<option value="MK" <?php if($row['Country']=="MK"){echo ' selected="selected"';}?>>Macedonia</option>
<option value="MG" <?php if($row['Country']=="MG"){echo ' selected="selected"';}?>>Madagascar</option>
<option value="MY" <?php if($row['Country']=="MY"){echo ' selected="selected"';}?>>Malaysia</option>
<option value="MW" <?php if($row['Country']=="MW"){echo ' selected="selected"';}?>>Malawi</option>
<option value="MV" <?php if($row['Country']=="MV"){echo ' selected="selected"';}?>>Maldives</option>
<option value="ML" <?php if($row['Country']=="ML"){echo ' selected="selected"';}?>>Mali</option>
<option value="MT" <?php if($row['Country']=="MT"){echo ' selected="selected"';}?>>Malta</option>
<option value="MH" <?php if($row['Country']=="MH"){echo ' selected="selected"';}?>>Marshall Islands</option>
<option value="MQ" <?php if($row['Country']=="MQ"){echo ' selected="selected"';}?>>Martinique</option>
<option value="MR" <?php if($row['Country']=="MR"){echo ' selected="selected"';}?>>Mauritania</option>
<option value="MU" <?php if($row['Country']=="MU"){echo ' selected="selected"';}?>>Mauritius</option>
<option value="ME" <?php if($row['Country']=="ME"){echo ' selected="selected"';}?>>Mayotte</option>
<option value="MX" <?php if($row['Country']=="MX"){echo ' selected="selected"';}?>>Mexico</option>
<option value="MI" <?php if($row['Country']=="MI"){echo ' selected="selected"';}?>>Midway Islands</option>
<option value="MD" <?php if($row['Country']=="MD"){echo ' selected="selected"';}?>>Moldova</option>
<option value="MC" <?php if($row['Country']=="MC"){echo ' selected="selected"';}?>>Monaco</option>
<option value="MN" <?php if($row['Country']=="MN"){echo ' selected="selected"';}?>>Mongolia</option>
<option value="MS" <?php if($row['Country']=="MS"){echo ' selected="selected"';}?>>Montserrat</option>
<option value="MA" <?php if($row['Country']=="MA"){echo ' selected="selected"';}?>>Morocco</option>
<option value="MZ" <?php if($row['Country']=="MZ"){echo ' selected="selected"';}?>>Mozambique</option>
<option value="MM" <?php if($row['Country']=="MM"){echo ' selected="selected"';}?>>Myanmar</option>
<option value="NA" <?php if($row['Country']=="NA"){echo ' selected="selected"';}?>>Nambia</option>
<option value="NU" <?php if($row['Country']=="NU"){echo ' selected="selected"';}?>>Nauru</option>
<option value="NP" <?php if($row['Country']=="NP"){echo ' selected="selected"';}?>>Nepal</option>
<option value="AN" <?php if($row['Country']=="AN"){echo ' selected="selected"';}?>>Netherland Antilles</option>
<option value="NL" <?php if($row['Country']=="NL"){echo ' selected="selected"';}?>>Netherlands (Holland, Europe)</option>
<option value="NV" <?php if($row['Country']=="NV"){echo ' selected="selected"';}?>>Nevis</option>
<option value="NC" <?php if($row['Country']=="NC"){echo ' selected="selected"';}?>>New Caledonia</option>
<option value="NZ" <?php if($row['Country']=="NZ"){echo ' selected="selected"';}?>>New Zealand</option>
<option value="NI" <?php if($row['Country']=="NI"){echo ' selected="selected"';}?>>Nicaragua</option>
<option value="NE" <?php if($row['Country']=="NE"){echo ' selected="selected"';}?>>Niger</option>
<option value="NG" <?php if($row['Country']=="NG"){echo ' selected="selected"';}?>>Nigeria</option>
<option value="NW" <?php if($row['Country']=="NW"){echo ' selected="selected"';}?>>Niue</option>
<option value="NF"<?php if($row['Country']=="NF"){echo ' selected="selected"';}?>>Norfolk Island</option>
<option value="NO" <?php if($row['Country']=="NO"){echo ' selected="selected"';}?>>Norway</option>
<option value="OM" <?php if($row['Country']=="OM"){echo ' selected="selected"';}?>>Oman</option>
<option value="PK" <?php if($row['Country']=="PK"){echo ' selected="selected"';}?>>Pakistan</option>
<option value="PW" <?php if($row['Country']=="PW"){echo ' selected="selected"';}?>>Palau Island</option>
<option value="PS" <?php if($row['Country']=="PS"){echo ' selected="selected"';}?>>Palestine</option>
<option value="PA" <?php if($row['Country']=="PA"){echo ' selected="selected"';}?>>Panama</option>
<option value="PG" <?php if($row['Country']=="PG"){echo ' selected="selected"';}?>>Papua New Guinea</option>
<option value="PY" <?php if($row['Country']=="PY"){echo ' selected="selected"';}?>>Paraguay</option>
<option value="PE" <?php if($row['Country']=="PE"){echo ' selected="selected"';}?>>Peru</option>
<option value="PH" <?php if($row['Country']=="PH"){echo ' selected="selected"';}?>>Philippines</option>
<option value="PO" <?php if($row['Country']=="PO"){echo ' selected="selected"';}?>>Pitcairn Island</option>
<option value="PL" <?php if($row['Country']=="PL"){echo ' selected="selected"';}?>>Poland</option>
<option value="PT" <?php if($row['Country']=="PT"){echo ' selected="selected"';}?>>Portugal</option>
<option value="PR" <?php if($row['Country']=="PR"){echo ' selected="selected"';}?>>Puerto Rico</option>
<option value="QA" <?php if($row['Country']=="QA"){echo ' selected="selected"';}?>>Qatar</option>
<option value="ME" <?php if($row['Country']=="ME"){echo ' selected="selected"';}?>>Republic of Montenegro</option>
<option value="RS" <?php if($row['Country']=="RS"){echo ' selected="selected"';}?>>Republic of Serbia</option>
<option value="RE" <?php if($row['Country']=="RE"){echo ' selected="selected"';}?>>Reunion</option>
<option value="RO" <?php if($row['Country']=="RO"){echo ' selected="selected"';}?>>Romania</option>
<option value="RU" <?php if($row['Country']=="RU"){echo ' selected="selected"';}?>>Russia</option>
<option value="RW" <?php if($row['Country']=="RW"){echo ' selected="selected"';}?>>Rwanda</option>
<option value="NT" <?php if($row['Country']=="NT"){echo ' selected="selected"';}?>>St Barthelemy</option>
<option value="EU" <?php if($row['Country']=="EU"){echo ' selected="selected"';}?>>St Eustatius</option>
<option value="HE" <?php if($row['Country']=="HU"){echo ' selected="selected"';}?>>St Helena</option>
<option value="KN" <?php if($row['Country']=="KN"){echo ' selected="selected"';}?>>St Kitts-Nevis</option>
<option value="LC" <?php if($row['Country']=="LC"){echo ' selected="selected"';}?>>St Lucia</option>
<option value="MB" <?php if($row['Country']=="MB"){echo ' selected="selected"';}?>>St Maarten</option>
<option value="PM" <?php if($row['Country']=="PM"){echo ' selected="selected"';}?>>St Pierre &amp; Miquelon</option>
<option value="VC" <?php if($row['Country']=="VC"){echo ' selected="selected"';}?>>St Vincent &amp; Grenadines</option>
<option value="SP" <?php if($row['Country']=="SP"){echo ' selected="selected"';}?>>Saipan</option>
<option value="SO" <?php if($row['Country']=="SO"){echo ' selected="selected"';}?>>Samoa</option>
<option value="AS" <?php if($row['Country']=="AS"){echo ' selected="selected"';}?>>Samoa American</option>
<option value="SM" <?php if($row['Country']=="SM"){echo ' selected="selected"';}?>>San Marino</option>
<option value="ST" <?php if($row['Country']=="ST"){echo ' selected="selected"';}?>>Sao Tome &amp; Principe</option>
<option value="SA" <?php if($row['Country']=="SA"){echo ' selected="selected"';}?>>Saudi Arabia</option>
<option value="SN" <?php if($row['Country']=="SN"){echo ' selected="selected"';}?>>Senegal</option>
<option value="RS" <?php if($row['Country']=="RS"){echo ' selected="selected"';}?>>Serbia</option>
<option value="SC" <?php if($row['Country']=="SC"){echo ' selected="selected"';}?>>Seychelles</option>
<option value="SL" <?php if($row['Country']=="SL"){echo ' selected="selected"';}?>>Sierra Leone</option>
<option value="SG" <?php if($row['Country']=="SG"){echo ' selected="selected"';}?>>Singapore</option>
<option value="SK" <?php if($row['Country']=="SK"){echo ' selected="selected"';}?>>Slovakia</option>
<option value="SI" <?php if($row['Country']=="SI"){echo ' selected="selected"';}?>>Slovenia</option>
<option value="SB" <?php if($row['Country']=="SB"){echo ' selected="selected"';}?>>Solomon Islands</option>
<option value="OI" <?php if($row['Country']=="OI"){echo ' selected="selected"';}?>>Somalia</option>
<option value="ZA" <?php if($row['Country']=="ZA"){echo ' selected="selected"';}?>>South Africa</option>
<option value="ES" <?php if($row['Country']=="ES"){echo ' selected="selected"';}?>>Spain</option>
<option value="LK" <?php if($row['Country']=="LK"){echo ' selected="selected"';}?>>Sri Lanka</option>
<option value="SD" <?php if($row['Country']=="SD"){echo ' selected="selected"';}?>>Sudan</option>
<option value="SR" <?php if($row['Country']=="SR"){echo ' selected="selected"';}?>>Suriname</option>
<option value="SZ" <?php if($row['Country']=="SZ"){echo ' selected="selected"';}?>>Swaziland</option>
<option value="SE" <?php if($row['Country']=="SE"){echo ' selected="selected"';}?>>Sweden</option>
<option value="CH" <?php if($row['Country']=="CH"){echo ' selected="selected"';}?>>Switzerland</option>
<option value="SY" <?php if($row['Country']=="SY"){echo ' selected="selected"';}?>>Syria</option>
<option value="TA" <?php if($row['Country']=="TA"){echo ' selected="selected"';}?>>Tahiti</option>
<option value="TW" <?php if($row['Country']=="TW"){echo ' selected="selected"';}?>>Taiwan</option>
<option value="TJ" <?php if($row['Country']=="TJ"){echo ' selected="selected"';}?>>Tajikistan</option>
<option value="TZ" <?php if($row['Country']=="TZ"){echo ' selected="selected"';}?>>Tanzania</option>
<option value="TH" <?php if($row['Country']=="TH"){echo ' selected="selected"';}?>>Thailand</option>
<option value="TG" <?php if($row['Country']=="TG"){echo ' selected="selected"';}?>>Togo</option>
<option value="TK" <?php if($row['Country']=="TK"){echo ' selected="selected"';}?>>Tokelau</option>
<option value="TO" <?php if($row['Country']=="TO"){echo ' selected="selected"';}?>>Tonga</option>
<option value="TT" <?php if($row['Country']=="TT"){echo ' selected="selected"';}?>>Trinidad &amp; Tobago</option>
<option value="TN" <?php if($row['Country']=="TN"){echo ' selected="selected"';}?>>Tunisia</option>
<option value="TR" <?php if($row['Country']=="TR"){echo ' selected="selected"';}?>>Turkey</option>
<option value="TU" <?php if($row['Country']=="TU"){echo ' selected="selected"';}?>>Turkmenistan</option>
<option value="TC" <?php if($row['Country']=="TC"){echo ' selected="selected"';}?>>Turks &amp; Caicos Is</option>
<option value="TV" <?php if($row['Country']=="TV"){echo ' selected="selected"';}?>>Tuvalu</option>
<option value="UG" <?php if($row['Country']=="UG"){echo ' selected="selected"';}?>>Uganda</option>
<option value="UA" <?php if($row['Country']=="UA"){echo ' selected="selected"';}?>>Ukraine</option>
<option value="AE" <?php if($row['Country']=="AE"){echo ' selected="selected"';}?>>United Arab Emirates</option>
<option value="GB" <?php if($row['Country']=="GB"){echo ' selected="selected"';}?>>United Kingdom</option>
<option value="US" <?php if($row['Country']=="US"){echo ' selected="selected"';}?>>United States of America</option>
<option value="UY" <?php if($row['Country']=="UY"){echo ' selected="selected"';}?>>Uruguay</option>
<option value="UZ" <?php if($row['Country']=="UZ"){echo ' selected="selected"';}?>>Uzbekistan</option>
<option value="VU" <?php if($row['Country']=="VU"){echo ' selected="selected"';}?>>Vanuatu</option>
<option value="VS" <?php if($row['Country']=="VS"){echo ' selected="selected"';}?>>Vatican City State</option>
<option value="VE" <?php if($row['Country']=="VE"){echo ' selected="selected"';}?>>Venezuela</option>
<option value="VN" <?php if($row['Country']=="VN"){echo ' selected="selected"';}?>>Vietnam</option>
<option value="VB" <?php if($row['Country']=="VB"){echo ' selected="selected"';}?>>Virgin Islands (Brit)</option>
<option value="VA"  <?php if($row['Country']=="VA"){echo ' selected="selected"';}?>>Virgin Islands (USA)</option>
<option value="WK" <?php if($row['Country']=="WK"){echo ' selected="selected"';}?>>Wake Island</option>
<option value="WF" <?php if($row['Country']=="WF"){echo ' selected="selected"';}?>>Wallis &amp; Futana Is</option>
<option value="YE" <?php if($row['Country']=="YE"){echo ' selected="selected"';}?>>Yemen</option>
<option value="ZR" <?php if($row['Country']=="ZR"){echo ' selected="selected"';}?>>Zaire</option>
<option value="ZM" <?php if($row['Country']=="ZM"){echo ' selected="selected"';}?>>Zambia</option>
<option value="ZW" <?php if($row['Country']=="ZW"){echo ' selected="selected"';}?>>Zimbabwe</option>
              </select>
    </div>
    </div>
    

    
<div class="inputitem">
<label class="Email">Email: <span class="purpule">*required </span></label>
<input  id="Email" name="Email" class="large" type="email" required disabled  value="<?php echo $row['EmailAddress']?>" />  
<span id="Info"></span>
</div>
    
<div class="inputitem">
<label class="password1">Password: <span class="purpule">*required </span></label>
<input  id="password1" name="Password" class="large"  type="password" pattern=".{5,}" title="5 characters minimum" required value="<?php if(!empty($row['Password'])){ echo rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($row['Password']), MCRYPT_MODE_CBC, md5(md5($key))), "\0");} ?>" /> 
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
<?php echo rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($row['Password']), MCRYPT_MODE_CBC, md5(md5($key))), "\0"); ?>
</div> 
</div>
    
    
<div class="inputitem">
<label class="password2">Confrim Password: <span class="purpule">*required </span></label>
<input  id="password2" name="ConfrimPassword" class="large" type="password" pattern=".{5,}" title="5 characters minimum" required />
</div>

<div class="inputitem">
<label class="PhoneNumber">Phone Number:</label>
<input  id="PhoneNumber" name="PhoneNumber" class="large" type="text" value="<?php echo $row['PhoneNumber']; ?>" />   
</div>

    
     <div class="inputitem">
    <label for="OurSite">How did you hear about our site?</label>
			<textarea id="OurSite" name="OurSite" style="height:80px;"><?php echo $row['OurSite']; ?></textarea>
    </div>

    <div class="element-checkbox"  title="Checkboxes" >
    <label>
    <input type="checkbox" value="yes" id="EmailList"  name="EmailList" class="chk" <?php if($row['EmailList']=="yes"){echo ' selected="selected"';}?>/>
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