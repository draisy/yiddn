<?php require_once('inc.files.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>
<?=$row_home->Title;?>
-  Submit A Site</title>
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

        
   	<section id="content-main">
    <div class="shell">
    
    <div id="main">
	<div id='article'  style="width:90%;">
        
        <h1>Submit A Site</h1>
       
                 <?php require_once('submitsite-checking.php');?>
<br>

           
           <form enctype="multipart/form-data" class="newform" method="post">
	 <fieldset class="newfiled">
 

<div class="inputitem">
<label class="Email">Email Address: <span class="purpule">*required </span></label>
<input  id="Email" name="Email" class="large" type="text" required  />  
</div>

    
<div class="inputitem">
<label class="URL">Website URL: <span class="purpule">*required </span></label>
<input  id="URL" name="URL" class="large" type="text" required  />  
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
      <input type="submit" value="Submit" name="submit"/>        

      </div>
          

  
    
      </form>
      
           	</div>
	</div>
    
    
    
		<div id='sidebar'>
        </div>
	</div>
    
     
    
    
    </section>
<div class="cl">&nbsp;</div>


  
   
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



</body>
</html>