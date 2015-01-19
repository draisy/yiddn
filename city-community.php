<?php 
require_once('inc.files.php');
$categories = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="2" AND  `Seo`="'.$pathInfo.'"';
$result     = $db->query($categories);
$data        = $result->fetch_assoc();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$row_home->Title;?> | Retailers | <?=$data['Title']?></title>
<meta name="keywords" content="<?=$row_home->Title;?>, Retailers, <?=$data['Title']?>" />
<meta name="Description" content="<?=$row_home->Title;?>, Retailers, <?=$data['Title']?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="<?=ADDRESS_SITE?>css/inner.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/reset.css" type="text/css" media="all" />
<link href="<?=ADDRESS_SITE?>css/innermedia.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/dropdown.css" />



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
        
    <h2>Retailers, <span><?=$data['Title']?></span></h2>
 
 
<?php
$count=1;
$SubCategories ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="2"  AND `Cid` = "'.$data['Id'].'"  Order by `Title` ASC';;
$result = $db->query($SubCategories);
$total  = $result->num_rows;
if($total > 0){
	while ($data_row = $result->fetch_assoc()) 
		{
		$counter = $count++;	
			if($counter=='1'){
				echo '<article id="listing-col-item">
						<ul>';
			}
				echo '<li><a href="'.$data['Seo'].'/'.$data_row['Seo'].'">'.$data_row['Title'].'</a></li>';	
			if($counter=='4'){
				echo '	</ul>
					</article>';	
				$count=1;
			}
		}
}
?>
         
         
  	</div>
	</div>
    
    
    
	<div id='sidebar'>
    <h3>Premium Ad</h3><br>

		<div> 
    <img src="<?=ADDRESS_SITE?>images/placeholder.jpg" > 
   </div>
        <br>

	<div> 
    <img src="<?=ADDRESS_SITE?>images/placeholder.jpg" > 
   </div>
   
   <br>


	<div> 
    <img src="<?=ADDRESS_SITE?>images/placeholder.jpg" > 
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
<script src="<?=ADDRESS_SITE?>js/liquidmetal.js" type="text/javascript"></script>
<script src="<?=ADDRESS_SITE?>js/jquery.flexselect.js" type="text/javascript"></script>
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
<script src="<?=ADDRESS_SITE?>js/jquery.easing.min.js"></script>
<script src="<?=ADDRESS_SITE?>js/login.js"></script>
<script src="<?=ADDRESS_SITE?>js/custom.js"></script>
<!-- Java Script -->


</body>
</html>