<?php require_once('inc.files.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - News Letter</title>
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
	<div id='article'>
     <?php
if(isset($_REQUEST['newsletter'])){
	
$newsletter    = $_POST['newsletter'];
$DateAdded 	   = date("Y-m-d H:i:s");
$errors='';
if(empty($newsletter)) {
		echo "<script>alert('Email is required field')</script>";
	}
if(empty($errors)) {	  
		$array = array(
		"Email"			   => $newsletter,
		"DateAdded" 		=> $DateAdded,
		"Status" 			=> 1
		);
		 	   $sql  = "INSERT INTO `subscribers`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   echo "<script>alert('Thanks for subscription.')</script>";
  }
}
	 ?>   
        <h1>News Letter</h1>
        <p>Here at the Yiddn family, we love to stay in touch. We publish a newsletter on a weekly basis, chock-full of interesting tidbits, exciting updates and relevant factoids. Featuring new technologies on the market, innovative sites and concepts, business pro tips and more (all served with a dollop of humor and our trademark style), we promise this is one e-mail you won't want to miss.</p>
           
        <p>Read more about our newest additions and site updates, as well as our emerging plans to further shake up the Jewish web. What are you waiting for? Stay in the know with our entertaining, informative, and thought-provoking e-mail subscription today!</p>
          
    <form enctype="multipart/form-data" class="newform" method="post">
	
        <div class="inputitem">
        <input  id="Email" name="Email" class="large"  style="width:260px;" type="email" required placeholder="Email Address"  />  
        <input type="submit" value="Submit" name="newsletter"/>        
    </div>
    
     
    
      </form>
           	</div>
	</div>
    
    
    
	<div id='sidebar'>
    
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