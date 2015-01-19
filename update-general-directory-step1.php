<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Update General Directory Step 1</title>
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
 <br>
<br>
<br><br>

    
     <h3>UPDATE POST YOUR LISTING</span></h3>
     
     
   

       
       <fieldset>
       <legend>
       <h4>Step 1: Company Information</h4>
       </legend>
<?php 
$query = "select * from `tb_ad_circular` where `OrderId`= '".base64_decode($_GET['i'])."' AND  `UserId`= '".$_SESSION['Yiddn_login_Id']."'";
$result = $db->query($query);
if($result->num_rows > 0){	
$row_result = $result->fetch_object();

$query = 'SELECT * FROM `order` WHERE `OrderId`="'.$row_result->OrderId.'"';
$results = $db->query($query);
$rows = $results->fetch_object();
?> 
<form enctype="multipart/form-data" class="newform" method="post" action="update-general-directory-step1-script">
      
	<?php
    if(isset($errors)) {
        foreach($errors as $err) {
        ?>
        <strong><?php echo $err;?></strong>
        <?php
             }
       }
    ?>
    
    <div class="inputitem">
    <label class="title" for="CompanyName">Company Name:</label>
<input class="large" name="CompanyName" id="CompanyName" value="<?=$row_result->CompanyName;?>" type="text"  />
    </div>
    
    
    <div class="inputitem">
	<label  class="title" for="Category">Select Category:</label>
	<select class="large" name="Category1" id="Category">
    <option value="">Please select</option>
    <?php
    $query = 'SELECT * FROM `categories` WHERE  `UseFor`="1" ORDER By Title ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
    <optgroup label="<?php echo $row['Title'];?>">
    <?php 
    $query2 = 'SELECT * FROM `sub-categories` where `Cid`="'.$row['Id'].'"';
    $result2 = $db->query($query2);
    while ($row2 = $result2->fetch_assoc()) 
    {
    ?>
    <option value="<?php echo $row2['Id'];?>" <?php if($row_result->Category2==$row2['Id']){echo 'selected="selected"';}?>><?=$row2['Title'];?></option>
    <?php }?>
    </optgroup>
    <?php }?>
    </select>
    </div>
    
    <div class="inputitem">
    <label  class="title" for="Category2">Select another Category (optional):</label>
    <select class="large" name="Category2">
    <option value="">Please select</option>
    <?php
    $query = 'SELECT * FROM `categories` WHERE  `UseFor`="1" ORDER By Title ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
    <optgroup label="<?php echo $row['Title'];?>">
    <?php 
    $query2 = 'SELECT * FROM `sub-categories` where `Cid`="'.$row['Id'].'"';
    $result2 = $db->query($query2);
    while ($row2 = $result2->fetch_assoc()) 
    {
    ?>
    <option value="<?php echo $row2['Id'];?>" <?php if($row_result->Category2==$row2['Id']){echo 'selected="selected"';}?>><?=$row2['Title'];?></option>
    <?php }?>
    </optgroup>
    <?php }?>
    </select>
    </div>
    
     <div class="inputitem">
      <label class="title" for="AdTitle">Ad Title:</label>
      <input class="large" name="AdTitle" value="<?=$row_result->AdTitle;?>"  id="AdTitle" type="text" pattern="[a-zA-Z ]+" />
     </div>
    
     
     <div class="inputitem">
      <label class="title" for="AdURL">Ad URL:</label>
      <input class="large" name="AdURL" id="AdURL" value="<?=$row_result->AdURL;?>" type="text" />
      <input name="step"  value="1" id="step" type="hidden" />
      <input name="OrderType"  type="hidden" value="Ad Circular" />
      <input name="OrderId"  type="hidden" value="<?=$row_result->OrderId;?>" />
      </div>
    
    
      <div class="submit">
      <input type="submit" onClick="return GeneralDirectoryStep1()" name="step1"  value="Update Next >>"/>     
      </div>
      </form>
  <?php }?>      
      </fieldset>
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
 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
<script src="js/liquidmetal.js" type="text/javascript"></script>
<script src="js/jquery.flexselect.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("select.special-flexselect").flexselect({ hideDropdownOnEmptyInput: true });
        $("select.flexselect").flexselect();
        $("input:text:enabled:first").focus();
       /*$("form").submit(function() {
          alert($(this).serialize());
          return false;
        });*/
      });
</script>   
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/login.js"></script>
<script src="js/custom.js"></script>
  <!-- Java Script -->

<script type="text/javascript" src="js/general-directory-step1.js"></script>


</body>
</html>