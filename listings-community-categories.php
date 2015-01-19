<?php 
require_once('inc.files.php');
$city = 'SELECT * FROM `city` WHERE `Status`="1" AND `CitySeo`="'.$backpath2.'"';
$result     = $db->query($city);
$data1        = $result->fetch_assoc();
$province ='SELECT * FROM `province` WHERE `Status`="1" AND `ProvinceSeo`="'.$pathInfo.'"';
$result     = $db->query($province);
$data2        = $result->fetch_assoc();
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
        
    <h2><a href="<?=ADDRESS_SITE?>community">Community</a><span> | <?=$data1['City']?>, <?=$data2['Province']?></span></h2>
 <br><br>
 
<?php
 $tb_local =  'SELECT * FROM `tb_local` WHERE  `Status`="1" AND `City`="'.$data1['Id'].'" OR `City2`="'.$data1['Id'].'" OR `City3`="'.$data1['Id'].'" group by Category1';
 
$result = $db->query($tb_local);
$total  = $result->num_rows;

	$titles = array();
	while ($rows = $result->fetch_assoc())
	{
	$query3 = 'SELECT * FROM `categories` WHERE `Id` = "'.$rows['Category1'].'" ORDER BY `Title` ASC';
	$res = $db->query($query3);
		
		while ($row = $res->fetch_assoc()) 
		{
			 $titles [$row['Title']] = $row['Seo'];
			 ksort($titles);		
		}	
	}
	$col = 0;
	$c = 1;

	echo '<div style="float:left; display:inline-block; width:45%;">'; 
	echo "<article id='maincategory-listings' style='width:250px;'>
	<ul>";
	foreach($titles as $title => $seo) {
			echo"
			<li style='font-size:18px;'>
			<a href='".ADDRESS_SITE."listings-community-categories/".$backpath2."/".$backpath3."/".$seo."'>$title</a><br />               
			</li>";
			if ($col < 1  && $c%round(count($titles)/2)==0){
				echo '</div><div style="float:left; display:inline-block; width:45%;"><article id="maincategory-listings" style="width:250px;"><ul>';
				$c=0;
				$col++;
			}	
			$c++;
		}
		echo "
		</ul>
		</article>
		</div>
		</div>";
	?> 
	<div id='sidebar'>
   <!-- <h3>Premium Ad</h3><br> -->

<?php require_once('ads-listings-community.php'); ?>


	<div style="width: 305px; height: 170px; overflow:hidden"> 
		<a href="http://www.accuweather.com/en/us/brooklyn-ny/11210/weather-forecast/334651" class="aw-widget-legal">
		</a><div id="awcc1411092284531" class="aw-widget-current"  data-locationkey="" data-unit="f" data-language="en-us" data-useip="true" data-uid="awcc1411092284531"></div>
		<script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>

   <!-- <img src="<?=ADDRESS_SITE?>images/placeholder.jpg" > -->
   </div>
        <br>

	<div style="width: 305px; height: 170px; overflow:hidden"> 
		<div style="margin: 0 auto; border: 2px solid #f1f1f1; padding:4px; padding-left:80px;">
	<!--Start MyZmanim Widget for: http://www.yiddn.com  -->
	<script type="text/javascript" charset="UTF-8" language="javascript" src="http://www.myzmanim.com/widget.aspx?lang=en&mode=CandlesOnly&fsize=10&fcolor=a800a7&hcolor=FDF8FF&bcolor=C0C0C0&suf=s&key=ahGlizilzt00y7MGZRY6udoVl1CZgH3CEmHoJOw5%2f0IwqYxlr%2f708DpidPcqRqL8etfgdNEXy0SMS2qK4askdg%3d%3d"></script><noscript style="font-family:verdana;">Find your daily zmanim at <a href="http://www.myzmanim.com/">MyZmanim.com</a>.</noscript>
	<!--End MyZmanim Widget-->
    <!--<img src="<?=ADDRESS_SITE?>images/placeholder.jpg" > -->
		</div>
   </div>
  <!-- 
   <br>


	<div> 
    <img src="<?=ADDRESS_SITE?>images/placeholder.jpg" > 
   </div>


	</div>
		
	</div>
    
    -->
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