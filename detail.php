<?php 
require_once('inc.files.php');
$categories = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="2" AND  `Seo`="'.$backpath2.'"';
$result       = $db->query($categories);
$data1        = $result->fetch_assoc();
$SubCategories ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="2" AND `Seo`="'.$backpath3.'"';
$result       = $db->query($SubCategories);
$data2        = $result->fetch_assoc();
$tb_etailer   = 'SELECT * FROM `tb_etailer` WHERE `Status`="1" AND `Seo`="'.$pathInfo.'"  AND (`Category`="'.$data2['Id'].'" OR `Category2`="'.$data2['Id'].'"  OR `Category3`="'.$data2['Id'].'") ORDER BY `CompanyWebsite` ASC';
$result       = $db->query($tb_etailer);
$data3        = $result->fetch_assoc();
$city     =  $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$data3['City'].'"');
$city_code = $city->fetch_assoc();			
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Yiddn</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="css/inner.css" rel="stylesheet">
 <link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
  <link href="css/innermedia.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
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
     
  
  

<h3 style="margin-bottom:-5px;">BELVEDERE SENIOR LIVING</h3>
  
  
  <br>
<br>
  <article style=" background:none; margin:0; display: inline-block; ">
     <img src="http://www.yiddn.com/newsite/images/Picture-Not-Available.gif" width="300"> 
          </article>
          
          
  <article style=" background:none; margin:0; float:left; width:58%; margin-right:10px;">
<table style="border:0;">
    <thead>
        </thead>
    <tr>
      <td width="16%" data-title="Order ID" style="color:#96257F">Website</td>
      <td width="84%" colspan="4" data-title="Listing Type"><a href="http://www.belvedereseniorliving.com/" target="_blank">www.belvedereseniorliving.com</a></td>
    </tr>
    <tr>
      <td data-title="Order ID" style="color:#96257F">Email</td>
      <td colspan="4" data-title="Listing Type">info@belvedereseniorliving.com</td>
    </tr>
    <tr>
      <td data-title="Order ID" style="color:#96257F">Address:</td>
      <td colspan="4" data-title="Listing Type">5110 19th Avenue Brooklyn, NY 11204</td>
    </tr>
    <tr>
      <td data-title="Order ID" style="color:#96257F">Location:</td>
      <td colspan="4" data-title="Listing Type">US</td>
    </tr>
       <tr>
         <td data-title="Order ID" style="color:#96257F">Date:</td>
         <td colspan="4" data-title="Listing Type">Date</td>
       </tr>
       <tr>
         <td colspan="5" data-title="Order ID"><span style="color:#96257F; line-height:35px;">Short Description: </span><br>
Belvedere Senior Living
Description: The Belvedere is an upscale senior living community.</td>
       </tr>
       <tr>
         <td colspan="5" data-title="Order ID"><span style=" color:#96257F; line-height:35px;">Description: </span><br>
           Belvedere Senior Living
           Description: The Belvedere is an upscale senior living community.</td>
       </tr>
       </table>          </article>
         
         
          
    

   

         
         
         
           

         
 
         
         
 

 
         
          
                  
       
  	</div>
	</div>
    
    
    
	<div id='sidebar'>
     
    <h3>Featured Listings</h3><br>

		<div> 
    <img src="images/placeholder.jpg" > 
   </div>
        <br>

	<div> 
    <img src="images/placeholder.jpg" > 
   </div>
   
   <br>


	<div> 
    <img src="images/placeholder.jpg" > 
   </div>


	</div>
		
	</div>
    
     
    
    
    </section>
<div class="cl">&nbsp;</div>


 <div class="ad1"> 
  <h2>Your listing is FREE! <a class="add-btn" href="">Add yours here.</a></h2>
  </div>
   
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