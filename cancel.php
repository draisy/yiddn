<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Cancel Subscription</title>
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

    
     <h3>Cancel Subscription</span></h3>
     
     
   <?php require_once('cancel-checking.php');?>

       
       <fieldset>
       <legend>
       <h4>Subscription details</h4>
       </legend>
       
<?php 
$query = "select * from `order` where `OrderId`= '".base64_decode($_GET['i'])."' AND  `UserId`= '".$_SESSION['Yiddn_login_Id']."'";
$result = $db->query($query);
if($result->num_rows > 0){	
$row_result = $result->fetch_object();
?> 
<form enctype="multipart/form-data" class="newform" method="post">
      
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
<label class="title" for="CompanyName">Subscription Id:</label>
<input name="subscriptionId" class="large" id="subscriptionId" type="text" value="<?php echo $row_result->subscriptionId;?>" />
<input name="OrderId" id="OrderId" class="large" type="hidden" value="<?php echo $row_result->OrderId;?>" />
<input name="transactionId" id="transactionId" class="large" type="hidden" value="<?php echo $row_result->transactionId;?>" />
    </div>
       
      <div class="submit">
      <input type="submit" name="submit"  value="Submit"/>      </div>
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
 
 <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
 <script src="js/jquery.min.js"></script>
 	<script src="js/modernizr.js"></script>
     <script src="js/jquery.min.js"></script>
     <script src="js/jquery.easing.min.js"></script>
 <script src="js/login.js"></script>
  <script src="js/custom.js"></script>
  <!-- Java Script -->



</body>
</html>