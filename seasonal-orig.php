<?php require_once('inc.files.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>
<?=$row_home->Title;?>
| Yomim Tovim</title>
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
        
        <h1>Yomim Tovim
</h1>
    <p>Rosh Hashanah? Yom Kippur? Sukkos? Yiddn has it all.</p>
       
   <article id="listing-col">
    	<h2>Retailers</h2>
         <figure><img src="images/apparel.png"></figure> 
        </article>
        
        
        <article id="listing-col">
    	<h2>Business</h2>
         <figure><img src="images/pos.png"></figure> 
        </article>
        
        
        
         <article id="listing-col">
    	<h2>Event Planning</h2>
         <figure><img src="images/event-planning.png"></figure> 
        </article>
        
        
         <article id="listing-col">
    	<h2>Food</h2>
         <figure><img src="images/food.png"></figure> 
        </article>
        
        
         <article id="listing-col">
    	<h2>Gift Baskets</h2>
         <figure><img src="images/gift-baskets.png"></figure> 
        </article>
        
         <article id="listing-col">
    	<h2>Health & Vitamins</h2>
         <figure><img src="images/health.png"></figure> 
        </article>
        
        
        <article id="listing-col">
    	<h2>Home</h2>
         <figure><img src="images/home.png"></figure> 
        </article>
       
       
        <article id="listing-col">
    	<h2>Judaica</h2>
         <figure><img src="images/judaica.png"></figure> 
        </article>
       
       
       
  	</div>
	</div>
    
    
    
	<div id='sidebar'>
		<ul id="menu">
        <h2>Local Listings Only</h2>
  <li><a href="#">All Locations</a></li>
<li><a href="#">Baltimore, MD</a></li>
<li><a href="#">Brooklyn, NY</a></li>
<li><a href="#">Chicago, IL</a></li>
<li><a href="#" class="active">Five Towns, NY</a></li>
<li><a href="#">Jerusalem, IL</a></li>
<li><a href="#">Lakewood, NJ</a></li>
<li><a href="#">London, UK</a></li>
<li><a href="#">Los Angeles, CA</a></li>
<li><a href="#">Manhattan, NY</a></li>
<li><a href="#">Miami, FL</a></li>
<li><a href="#">Rockland County, NY</a></li>
<li><a href="#">Teaneck, NJ</a></li>
</ul>
		
	</div>
		
	</div>
    
     
    
    
    </section>
<div class="cl">&nbsp;</div>


 <div class="ad1"> 
  <h2>Your listing is FREE! <a class="add-btn" href="dashboard">Add yours here.</a></h2>
    
	<h3>Premium Ads</h3>
<?php 
  function randomImage ($array) {
  $total = count($array);
  $call = rand(0,$total-1);
  return $array[$call];
  }
?>
<?php
$dir = "staticads/jewish-e-tailers/";
$images = scandir($dir);
$i = rand(2, sizeof($images)-1);
$my_images = array (
  "0" =>  "staticads/jewish-e-tailers/".$images[$i]
);
$filename = randomImage($my_images);
$key = array_search($filename, $my_images); // $key = 2;
$ID_Modal="1";
$dirs = opendir('staticads/jewish-e-tailers/');
?> 

<?php if($filename !="" && file_exists($filename) && $filename !="staticads/jewish-e-tailers/Thumbs.db"){?>
<img  src="<?php echo $filename;?>"  style="width:632px; height:172px;" />
<?php }else{?>
<img src="<?php echo ADDRESS_SITE;?>images/Picture-Not-Available.gif" style="width:632px; height:172px;"  />
<?php }?> 
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