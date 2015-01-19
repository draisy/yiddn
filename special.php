<?php require_once('inc.files.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Special Offers</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="css/inner.css" rel="stylesheet">
 <link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
  <link href="css/innermedia.css" rel="stylesheet">
  <link href="css/newform.css" rel="stylesheet">
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
    
    
    
    
    <div id="main" style="width:90%;">
    <h1>The Best Deals on the Web</h1>
    <p>Our merchants often offer promotions exclusively for Yiddn.com users.
</p><br>

    
	 <div class="section group">
     
	<div class="col span_1_of_3">
	<div  class="specialsearch">
    <form method="get" class="newform">
    <h3 style=" color:#8A0E6E">Filter By Ads</h3>
    
          <h5>Categories:</h5>
          <label class="label">
          <select name="category" onChange="getcategory('find.php?category='+this.value)">
          <option value="">Select</option>
</select>
          </label>
<br>
 <h5>City:</h5>
<label class="label">
<select class="searching" name="city" id="city" onChange="getcity('find2.php?SubCat=&city='+this.value)">
<option value="">Select</option>
<option value="all" >All</option>
</select>

</label>

 <br>
  <h5>Company:</h5>
<label class="label">
<select class="searching" name="company" id="company">
<option value="">Select</option>
<option value="all" >All</option>
</select>
</label>
 <input type="submit" class="go" />
   
</form>
    </div> 

	</div>
	
    
    <div class="col span_2_of_3"> 
    <div class="col" style="margin-right:18px;">
      <img src="images/na.gif" width="300" height="205"> 
      </div>
      
      <div class="col">
      <img src="images/na.gif" width="300" height="205"> 
      </div>
     </div>
     
     
     
     <div class="col span_2_of_3"> 
    <div class="col" style="margin-right:18px;">
      <img src="images/na.gif" width="300" height="205"> 
      </div>
      
      <div class="col">
      <img src="images/na.gif" width="300" height="205"> 
      </div>
     </div>
    
    
     
 
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
        $("form").submit(function() {
          alert($(this).serialize());
          return false;
        });
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