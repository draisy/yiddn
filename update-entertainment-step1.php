<?php 
require_once('inc.files.php');
require_once('user-check.php');
if(isset($_GET['n']) && isset($_GET['c'])) {
		if (file_exists('images/CompanyLogo/'.$_GET['n']))  
		{  
			unlink('images/CompanyLogo/'.$_GET['n']);  
		}	 			
 	$sql  = "UPDATE `tb_entertainment` SET `CompanyLogo`='' Where `OrderId`= '".base64_decode($_GET['i'])."'";
	$res = mysqli_query($db, $sql);
	echo "<script>window.open('update-entertainment-step1?i=".$_GET['i']."','_self')</script>";
} 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Update Entertainment Step 1</title>
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

    
     <h3>Entertainment / POST YOUR LISTING</span></h3>
     
     
   

       
       <fieldset>
       <legend>
       <h4>Step 1: Company Information</h4>
       </legend>
<?php 
$query = "select * from `tb_entertainment` where `OrderId`= '".base64_decode($_GET['i'])."' AND  `UserId`= '".$_SESSION['Yiddn_login_Id']."'";
$result = $db->query($query);
if($result->num_rows > 0){	
$row_result = $result->fetch_object();

$query = 'SELECT * FROM `order` WHERE `OrderId`="'.$row_result->OrderId.'"';
$results = $db->query($query);
$rows = $results->fetch_object();
?> 
<form enctype="multipart/form-data" class="newform" method="post" action="update-entertainment-step1-script">
      
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
    <input class="large" name="CompanyName" id="CompanyName" type="text" value="<?=$row_result->CompanyName;?>" />
    </div>
  
  <div class="inputitem">
  <label for="CompanyAddress" class="title">Company Address:</label>
  <textarea id="CompanyAddress" name="CompanyAddress" class="large"  style="height:100px;"><?=$row_result->CompanyAddress;?></textarea>
  </div>
  
     <div class="inputitem">
      <label for="Telephone" class="title">Telephone:</label>
      <input name="Telephone" class="large" id="Telephone" type="text" value="<?=$row_result->Telephone;?>" />
    </div>

    
     <div class="inputitem">
      <label class="title" for="CompanyEmail">Company Email:</label>
      <input class="large" name="CompanyEmail" id="CompanyEmail" value="<?=$row_result->CompanyEmail;?>" type="text" />
     </div>
    
     
    <div class="inputitem">
    <label class="title" for="v">Company Website:</label>
    <input class="large" name="CompanyWebsite" value="<?=$row_result->CompanyAddress;?>" id="CompanyWebsite" type="text" placeholder="http://" />
    <input name="step"  value="1" id="step" type="hidden" />
    <input name="OrderType"  type="hidden" value="Jewish E-Taile" />
    </div>
    
    <div class="element-file">
    <label class="title">
    <strong>Upload Logo (optional):</strong>
    </label>
<?php if($row_result->CompanyLogo!=""){?>
<br />
<a href="images/CompanyLogo/<?php echo $row_result->CompanyLogo;?>" target="_blank"><img src="images/CompanyLogo/<?php echo $row_result->CompanyLogo;?>" width="100" /></a>
     <a href='update-entertainment-step1?i=<?php echo $_GET['i'];?>&n=<?php echo $row_result->CompanyLogo;?>&c=c' onclick='return DeleteLogo();'><!--Delete--></a>
<?php }?> 
<script>
function DeleteLogo()
{
return confirm("Are you sure you want to delete this Logo?");
}
</script>

    <label class="large" >
    <!--<div class="button">Choose Logo</div>-->
    <input type="file" class="file_input" name="CompanyLogo" style="display:none;" />
    <div class="file_text"><?php if($row_result->CompanyLogo!=""){
    echo $row_result->CompanyLogo;
    }else{
    echo "No file selected";
    }?></div>
    
    
    </label>
    <small class="note"><em>Logo size should be exactly 182 X 76*</em></small>
    </div>
   <input name="OrderId"  type="hidden" value="<?=$row_result->OrderId;?>" />

  <div class="submit">
  <input type="submit" onClick="return EntertainmentStep1()" name="step1"  value="Next >>"/>     
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

<script type="text/javascript" src="js/entertainment-step1.js"></script>


</body>
</html>