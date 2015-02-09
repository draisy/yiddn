<?php require_once('inc.files.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>
<?=$row_home->Title;?>
- Browse Our Listings</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
    
    <h1>Browse</h1>
    <p>Browse our categories to see all the fine retailers, service providers and organizations that are now on the web.</p>
    
    
    
    <article id="center-col">
    	<h2><a href="retailer">Retailers</a></h2>
        <p>The web’s largest directory of fine merchants of Jewish related apparel, gifts, heath & beauty aides, travel, events and much more.</p>
        <figure><a href="retailer"><img src="images/retailer-cat-image.png"></a></figure> 
        </article>
    
    
    
    
     <article id="center-col">
    	<h2><a href="torah-and-resources">Torah Resources</a></h2>
        <p>Take advantage of all the Internet has to offer in learning: shiurim, Daf Yomi, shiduchim, kashrus, chesed... by topic and by community.</p>
        <figure><a href="torah-and-resources"><img src="images/torah-cat-image.png"></a></figure> 
        </article>
        
        
         <article id="center-col">
    	<h2><a href="seasonal">Seasonal</a></h2>
        <p>Yomim Tovim and seasonal events - Yiddn has it all! Browse our listings of resources and products for all your Purim & Pesach needs.</p>
        <figure><a href="seasonal"><img src="images/seasonal-holidays.png"></a></figure> 
        </article>
        
        
         <article id="center-col">
    	<h2><a href="community">Community</a></h2>
        <p>Find fine Jewish retailers and complete Torah resources in dozens of Jewish communities in the US and Israel.</p>
        <figure><a href="community"><img src="images/comm-cat-image.png"></a></figure> 
        </article>
        
        
         <article id="center-col">
    	<h2><a href="entertainment">Entertainment</a></h2>
        <p>Dozens of listings of musicians, entertainers and activities make Yiddn.com your first stop to find Jewish entertainment for your family.</p>
        <figure><a href="entertainment"><img src="images/enter-cat-image.png"></a></figure> 
        </article>
        
        
         <article id="center-col">
    	<h2><a href="special-offers">Special Offers</a></h2>
        <p>Look here for weekly promotions and sales offered by our trusted advertsiers. Join our email list to get early notice of specials.</p>
        <figure><a href="special-offers"><img src="images/special-cat-image.png"></a></figure> 
        </article>
   <style>#content-main h2 a {color:#fff;}</style>
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