<?php require_once('inc.files.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>
<?=$row_home->Title;?>
- My Bookmarks</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli:400,400italic' rel='stylesheet' type='text/css'>
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
        
        <h1>Bookmarks</h1>
        <p><b style="font-style:italic;">Organize your finds in one convenient place.
</b><br>
With all the retailers and services on Yiddn.com, it helps to have a place to store the sites you’ve found. When you find a site you want to save for future reference, just click on the “Bookmark this site” button. The site and its link will be added to your personal dashboard. You can even add notes and comments. (“Beautiful silver lichts — got one for Estee and Yudi.”) <br>
<br>


Don’t have a personal dashboard? No problem — you get one automatically when you register, which you can do in about 30 seconds right <a href="signup">here</a>.

<br>
<br>
         
<a class="add-btn" href="user-login">Take me to my dashboard</a>
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