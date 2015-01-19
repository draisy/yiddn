<?php require_once('inc.files.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Advertise</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1"
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="css/inner.css" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
<link href="css/innermedia.css" rel="stylesheet">
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
        
        <h1>Advertisers</h1>
        <p><b>Reach the people who matter most.</b><br>
Yiddn.com places your message in front of the people you most want to reach — Jewish customers and consumers. A basic listing is free in most categories. Or reach farther with graphic ads and multiple listings throughout the site. Whether you do business on the Internet, or are looking for local traffic in your community, Yiddn.com will help direct your best customers to your door.
           </p>
           
        <p style="color:#906; line-height:22px; margin-top:20px;">
1) Free Listing. Include your business info on Yiddn.com. Your listing is placed in the appropriate category or community listing.<br><br>


2) Paid Listing. Your listing is featured on its category page with a graphic banner and bold, pop-up description of your product or service. You will also be able to cross reference your business or organization in up to 2 other categories.<br><br>


3) Premium Listing. In addition to the listings above, your business or organizations enters the rotation for extra large graphic banners on our major landing pages. And your promotions will be included in our email blasts to Yiddn.com members.<br><br>


4) Non-profit Listing. Non-profit and chesed organizations are invited to place a paid listing with us for a small nominal fee. Please <a href="contact">contact us</a> for details.<br>
<br>
<a class="add-btn" href="user-login">Login</a>
 </p>
           
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