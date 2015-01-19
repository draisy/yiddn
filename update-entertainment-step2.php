<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Update Entertainment Step 2</title>
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
<br>
<br>

     

       
       <fieldset>
       <legend>
       <h4>Step 2: Enter Ad Details</h4>
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
<form enctype="multipart/form-data" class="newform" method="post" action="update-entertainment-step2-script">
      
	 
    <div class="inputitem">
<label for="ShortDescription" class="title">Short Description:</label>
<textarea id="ShortDescription" name="ShortDescription" class="large"  style="height:100px;"><?=$row_result->ShortDescription?></textarea>
    </div>
	       
    
    <div class="inputitem">
<label for="Description" class="title">Description:</label>
<textarea id="Description" name="Description" class="large"  style="height:100px;"><?=$row_result->Description?></textarea>
    </div>
    
    
    
    
     <div class="inputitem">
      <label for="Agent" class="title">Agent: (optional)</label>
      <input name="Agent" class="large" type="text" value="<?=$row_result->Agent?>" />

    </div>
    
     <div class="inputitem">
      <label for="Keywords" class="title">Keywords:</label>
      <input name="Keywords" class="large" id="Keywords" type="text" value="<?=$row_result->CompanyKeywords?>" />
     <span class="note">Keywords are the most important element for the search feature. List as many keywords as possible for the best results. "please separate the keywords with commas"</span>
     <input name="step"     value="2" id="step" type="hidden" />
     <input name="OrderId"  value="<?=base64_decode($_GET['i'])?>" id="orderid" type="hidden"  />
    </div>
    
    <div class="submit">
      <input type="submit" onClick="return EntertainmentStep2()" name="step2"  value="Next >>"/>     
        <input type="button" value="<< Previous" onClick="window.location='update-entertainment-step1?i=<?php echo $_GET['i'];?>';" class="pre"/>
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

<script type="text/javascript" src="js/entertainment-step2.js"></script>


</body>
</html>