<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Entertainment Step 1</title>
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

<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/entertainment-step1.js"></script>

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
<form enctype="multipart/form-data" class="newform" method="post" action="entertainment-step1-script">
      
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
    <input class="large" name="CompanyName" id="CompanyName" type="text" />
    </div>
  
  <div class="inputitem">
  <label for="CompanyAddress" class="title">Company Address:</label>
  <textarea id="CompanyAddress" name="CompanyAddress" class="large"  style="height:100px;"></textarea>
  </div>
  
    <div class="inputitem">
      <label for="Telephone" class="title">Telephone:</label>
      <input name="Telephone" class="large" id="Telephone" type="text" />
    </div>
    
     <div class="inputitem">
      <label class="title" for="CompanyEmail">Company Email:</label>
      <input class="large" name="CompanyEmail" id="CompanyEmail" type="text" />
     </div>
    
     
    <div class="inputitem">
    <label class="title" for="v">Company Website:</label>
    <input class="large" name="CompanyWebsite" id="CompanyWebsite" type="text" placeholder="http://" />
    <input name="step"  value="1" id="step" type="hidden" />
    <input name="OrderType"  type="hidden" value="Entertainment" />
    </div>
    
    <div class="element-file">
    <label class="title">
    <strong>Upload Logo (optional):</strong>
    </label>
    <label class="large" >
     <input type="file" class="file_input" name="CompanyLogo" />
    <div class="file_text"> &nbsp;</div>
    </label>
    <small class="note"><em>Logo size should be exactly 182 X 76*</em></small>
    </div>
    
  <div class="submit">
  <input type="submit" onClick="return EntertainmentStep1()" name="step1"  value="Next >>"/>     
  </div>
          
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
  <!-- Java Script -->




</body>
</html>