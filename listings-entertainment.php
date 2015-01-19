<?php 
require_once('inc.files.php');
$categories = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="5" AND  `Seo`="'.$backpath2.'"';
$result     = $db->query($categories);
$data1        = $result->fetch_assoc();
$SubCategories ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="5" AND `Seo`="'.$pathInfo.'"';
$result     = $db->query($SubCategories);
$data2        = $result->fetch_assoc();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$row_home->Title;?> | Entertainment | <?=$data1['Title']?> | <?=$data2['Title']?></title>
<meta name="keywords" content="<?=$row_home->Title;?>, Entertainment, <?=$data1['Title']?>, <?=$data2['Title']?>" />
<meta name="Description" content="<?=$row_home->Title;?>, Entertainment, <?=$data1['Title']?>, <?=$data2['Title']?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="<?=ADDRESS_SITE?>css/inner.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/reset.css" type="text/css" media="all" />
<link href="<?=ADDRESS_SITE?>css/innermedia.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/dropdown.css" />


<style type="text/css">
.trans {
width: 100px;
height: 100px;
background: #ff9c2f;
-webkit-transition: all 1s; /* For Safari 3.1 to 6.0 */
transition: all 1s;
display: block;
float: left;
padding:10px;
margin-left: 10px;
} 
.trans:hover{
background: #b25cda;
}
</style>

 


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="<?=ADDRESS_SITE?>js/jquery.min.js"></script>

<!-- Add venobox -->
<link rel="stylesheet" href="<?=ADDRESS_SITE?>venobox/venobox.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?=ADDRESS_SITE?>venobox/venobox.min.js"></script>

 
    <script type="text/javascript">
         $(document).ready(function(){
            $('.venobox').venobox({
                numeratio: false,
                infinigall: true,
                border: '20px',
            });
            $('.venoboxvid').venobox({
                bgcolor: '#000'
            });
            $('.venoboxframe').venobox({
                border: '6px'
            });
            $('.venoboxinline').venobox({
                framewidth: '300px',
                frameheight: 'auto',
                border: '10px',
                bgcolor: '#f46f00',
                titleattr: 'data-title',
            });
            $('.venoboxajax').venobox({
                border: '30px;',
                frameheight: '220px'
            });
        })
    </script>
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
        
    <h2><a href="<?=ADDRESS_SITE?>entertainment">Entertainment</a><span>  | <a href="../<?=$data1['Seo']?>"><?=$data1['Title']?></a> | <?=$data2['Title']?></span></h2>
 
 <br> <br>

<?php
$count=1;
$a_count=1;
$tb_entertainment = 'SELECT * FROM `tb_entertainment` WHERE `Status`="1" AND (`Category`="'.$data2['Id'].'" OR `Category2`="'.$data2['Id'].'"  OR `Category3`="'.$data2['Id'].'") ORDER BY `CompanyWebsite` ASC';
$result = $db->query($tb_entertainment);
$total  = $result->num_rows;
if($total > 0){
	while ($data_row = $result->fetch_assoc()) 
		{
			 $acount = $a_count++;	
		
	$city        = $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$data_row['City'].'"');
	$city_code   = $city->fetch_assoc();			
		$counter = $count++;
			
				echo '<article id="maincategory-listings" '; if($acount=='9'){echo "style='border:0px;'";$a_count=-2;}echo'>
						<ul>
						<li>
						<a class="btn btn-default venoboxframe" title="'.$data_row['CompanyName'].'" data-type="iframe" href="'.$data2['Seo'].'/'.$data_row['Seo'].'">
                     		'.$data_row['CompanyWebsite'].' &nbsp; <span>('.$city_code['Country'].')</span>
                     	</a>
					     </li>
					   </ul>
					</article>';	
			
		}
}
?>
         
         
  	</div>
	</div>
    
   	<div id='sidebar'>
    <h3>Featured Ads</h3><br>

<?php require_once('ads-listings-retailer.php'); ?>


		<div> 
    <img src="<?=ADDRESS_SITE?>images/placeholder.jpg" > 
   </div>
        <br>

	</div>
		
	</div>
    
     
    
    
    </section>
<div class="cl">&nbsp;</div>


 <div class="ad1"> 
  <h2>Your listing is FREE! <a class="add-btn" href="<?php echo ADDRESS_SITE;?>dashboard">Add yours here.</a></h2>
    
	<h3>Featured Ads</h3>
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
  "0" =>  "../../staticads/jewish-e-tailers/".$images[$i]
);
$filename = randomImage($my_images);
$key = array_search($filename, $my_images); // $key = 2;
$ID_Modal="1";
$dirs = opendir('staticads/jewish-e-tailers/');
?> 

<?php if($filename !="" && $filename !="staticads/jewish-e-tailers/Thumbs.db"){?>
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