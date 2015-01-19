<?php 
require_once('inc.files.php');
$city = 'SELECT * FROM `city` WHERE `Status`="1" AND `CitySeo`="'.$backpath2.'"';
$result     = $db->query($city);
$data1        = $result->fetch_assoc();
$province ='SELECT * FROM `province` WHERE `Status`="1" AND `ProvinceSeo`="'.$backpath3.'"';
$result     = $db->query($province);
$data2        = $result->fetch_assoc();

$categories ='SELECT * FROM `categories` WHERE `Status`="1" AND `Seo`="'.$pathInfo.'"';
$result     = $db->query($categories);
$data3       = $result->fetch_assoc();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$row_home->Title;?> | Community | <?=$data1['City']?> | <?=$data2['Province']?></title>
<meta name="keywords" content="<?=$row_home->Title;?>, Community, <?=$data1['City']?>, <?=$data2['Province']?><" />
<meta name="Description" content="<?=$row_home->Title;?>,s Community, <?=$data1['City']?>, <?=$data2['Province']?><" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="<?=ADDRESS_SITE?>css/inner.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/reset.css" type="text/css" media="all" />
<link href="<?=ADDRESS_SITE?>css/innermedia.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/dropdown.css" />


<style>
#maincategory-listings {
    background: none repeat scroll 0 0 #fff;
    color: #8a7666;
    display: inline-block;
    float: left;
    font-family: "Lucida Sans Unicode","Lucida Grande",sans-serif;
    margin: -10px 0 0;
    width: 48%;
 min-height:0px;
}
 #maincategory-listings ul li.listings { margin:0px 0 0px 20px;  color:#83007E; font-size:15px;}
 
</style>
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
        
    <h2><a href="<?=ADDRESS_SITE?>community">Community</a> 
  <span>|   <a href="<?=ADDRESS_SITE?>listings-community/<?=$data1['CitySeo']?>/<?=$data2['ProvinceSeo']?>"><?=$data1['City']?>,<?=$data2['Province']?></a> 
    , <?=$data3['Title']?></span></h2>
 <br><br>
 
<?php
$count=1;
$a_count=1;
 $tb_local =  'SELECT * FROM `tb_local` WHERE  `Status`="1" AND `City`="'.$data1['Id'].'" OR `City2`="'.$data1['Id'].'" OR `City3`="'.$data1['Id'].'" group by Category1';
 
$result = $db->query($tb_local);
$total  = $result->num_rows;
if($total > 0){
	while ($data_row = $result->fetch_assoc()) 
		{
			 $acount = $a_count++;	
		
	$city        = $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$data_row['City'].'"');
	$city_code   = $city->fetch_assoc();			
		$counter = $count++;
			
				echo '<article id="maincategory-listings"'; if($acount=='9'){echo "style='border:0px;'";$a_count=-2;}echo'>
						<ul>
						<li>
						<a  target="_blank" href="'.$data3['Seo'].'/'.$data_row['Seo'].'">
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
    <h3>Premium Ad</h3><br>

<?php require_once('ads-listings-community.php'); ?>


		


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