<?php 
require_once('inc.files.php');
if(isset($_GET['president']) && !empty($_GET['president'])){
$city = 'SELECT * FROM `city` WHERE `Status`="1" AND `CitySeo`="'.$_GET['president'].'"';
$result     = $db->query($city);
$data1        = $result->fetch_assoc();
$province ='SELECT * FROM `province` WHERE `Status`="1" AND `ProvinceSeo`="'.$pathInfo.'"';
$result     = $db->query($province);
$data2        = $result->fetch_assoc();
$whereCity = 'AND `City`='.$data1['Id'];
$whereCategoryCity = 'AND (`tb_etailer`.City="'.$data1['Id'].'" OR `tb_local`.City="'.$data1['Id'].'" OR `tb_torah_resources`.City="'.$data1['Id'].'")';
}else{
$whereCity ='';
$whereCategoryCity = '';
}
require_once('search-query.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$row_home->Title;?> | Search </title>
<meta name="keywords" content="<?=$row_home->Title;?>, Search" />
<meta name="Description" content="<?=$row_home->Title;?>, Search" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
        
    <h2>Search, <span><?=$_GET['keywords']?></span></h2>
    <br>
    <br>
<?php

$catarray = array();
$linkarray = array();

	$result_categories = $db->query($categoreis);
	$total_results = $result_categories->num_rows;
	$count = 0;
	if($total_results == 0)
	  echo
	    '<p class="no-result">Slicha! We can\'t find anything for your search terms. How about trying again with fewer keywords, or 
		consider adding a listing yourself? It\'s free and easy!</p></br>';

	if($total_results>0){
	$row_categories = $result_categories->fetch_assoc();

$query_web ="
SELECT `tb_etailer`.Category,`sub-categories`.Id,`sub-categories`.Title , 'etailer' AS `tablename` 

FROM `tb_etailer`

JOIN `sub-categories` ON `tb_etailer`.Category=`sub-categories`.Id 

WHERE `tb_etailer`.Status='1' AND `tb_etailer`.Id_Etailer IN (".$record_id."0) AND `tb_etailer`.Category IN (".$subcat_id."0) 

GROUP BY `tb_etailer`.Category 

UNION

SELECT `tb_torah_resources`.Category,`sub-categories`.Id,`sub-categories`.Title, 'torah' AS `tablename` 

FROM `tb_torah_resources`

JOIN `sub-categories` ON `tb_torah_resources`.Category=`sub-categories`.Id 

WHERE `tb_torah_resources`.Status='1' AND `tb_torah_resources`.Id_torah_resources IN (".$record_id."0)AND `tb_torah_resources`.Category IN (".$subcat_id."0)  

GROUP BY `tb_torah_resources`.Category 

UNION

SELECT `tb_local`.Category1,`categories`.Id,`categories`.Title, 'local' AS `tablename` 

FROM `tb_local`

JOIN `categories` ON `tb_local`.Category1=`categories`.Id 

WHERE `tb_local`.Status='1' AND `tb_local`.Id_Local IN (".$record_id."0)
AND `tb_local`.Category1 IN (".$cat_id."0) 
GROUP BY `tb_local`.Category1 

";



echo '<div style="float:left; display:inline-block;" class="fifty">'; 


    $result = $db->query($query_web);
	$total_results = $result->num_rows;
	$count = 0;
	if($total_results == 0 && $total_results == 0)
	  echo
	    '<p class="no-result">Slicha! We can\'t find anything for your search terms. How about trying again with fewer keywords, or 
		consider adding a listing yourself? It\'s free and easy!</p></br>';

		if($total_results>0)
				{
			while ($row = $result->fetch_assoc()) 
					{
					$count++;

	if($row['Category']!="" && $row['tablename']=="local"){
$query_subcategories = 'SELECT * FROM `categories` WHERE `Status`="1" AND `Id` = "'.$row['Category'].'" AND `Id` IN ('.$cat_id.'0)   Order by `Title` ASC';
    }
	if($row['Category']!="" && $row['tablename']!="local"){
$query_subcategories = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND `Id` = "'.$row['Category'].'"  AND `Id` IN ('.$subcat_id.'0)  Order by `Title` ASC';
    }
	
	


					$query_sub 			 	  = $db->query($query_subcategories);
					$row_subcategories   	  = $query_sub->fetch_assoc();

					?>
<?php $catarray[]=  array('title'=>$row_subcategories['Title'],'Id'=>$row_subcategories['Id']);?>
					<?php
					
					}
//$query_web_ = 'SELECT * FROM `tb_etailer` WHERE `Status`="1" AND `Id_Etailer` IN ('.$record_id.'0) AND (`Category`="'.$row_subcategories ['Id'].'") ORDER by `CompanyWebsite` ASC';

asort($catarray);
foreach($catarray AS $subcategories){
	echo '
<article id="maincategory-listings" style="width:100%;">
	<ul>
 ';	

	echo '<h2>'.$subcategories['title'].'</h2>';
$query_web_  =  
"
SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category ,'etailer' as tablename
FROM `tb_etailer` 
WHERE `Status`='1' AND `Id_Etailer` IN (".$record_id."0) AND (`Category`='".$subcategories ['Id']."')

UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category ,'torah' as tablename
FROM `tb_torah_resources` 
WHERE `Status`='1' AND `Id_torah_resources` IN (".$record_id."0) AND (`Category`='".$subcategories ['Id']."')

UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category1 ,'local' as tablename
FROM `tb_local` 
WHERE `Status`='1' AND `Id_Local` IN (".$record_id."0) AND (`Category1`='".$subcategories ['Id']."')



";
/*
UNION

(SELECT  CompanyName, OrderType, CompanyWebsite, City, Seo,  Category, `Id_torah_resources` AS ID
FROM `tb_torah_resources`
WHERE `Status`='1' AND `ID`  IN (".$record_id."0) AND (`Category`='".$row_subcategories ['Id']."')
)

UNION 

(SELECT  CompanyName, OrderType, CompanyWebsite, City, Seo,  Category, `Id_Etailer` AS ID   FROM `tb_etailer` 
WHERE `Status`='1' AND `ID`  IN (".$record_id."0) AND (`Category`='".$row_subcategories ['Id']."')
)
 
";
*/



					$result_web_ = $db->query($query_web_);
					$result_web_1 = $db->query($query_web_);
					
					
					while ($row_web_ = $result_web_->fetch_assoc()){ 
					$country_code     =  $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$row_web_['City'].'"');
					$row_country_code = $country_code->fetch_assoc();
					
$OrderType =  $row_web_['OrderType'];
if($OrderType == "Jewish E-Taile"){

	if($row_web_['Category']!="" && $row_web_['tablename'] == "local"){
$SubCategories_ ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="2" AND `Id`="'.
$row_web_['Category'].'"';
    }
	if($row_web_['Category']!="" && $row_web_['tablename'] != "local"){
$SubCategories_ ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="2" AND `Id`="'.
$row_web_['Category'].'"';
    }
	


$result_       = $db->query($SubCategories_);
$data2_        = $result_->fetch_assoc();

$categories_ = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="2" AND  `Id`="'.$data2_['Cid'].'"';
$result_       = $db->query($categories_);
$data1_        = $result_->fetch_assoc();
				
$link = "retailer/".cleanURL($data1_['Seo']).'/'.cleanURL($data2_['Seo']).'/'.cleanURL($row_web_['Seo']);
}
if($OrderType == "Torah & Resources"){
$SubCategories_ ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="4" AND `Id`="'.$row_web_['Category'].'"';
$result_       = $db->query($SubCategories_);
$data2_        = $result_->fetch_assoc();

$categories_ = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="4" AND  `Id`="'.$data2_['Cid'].'"';
$result_       = $db->query($categories_);
$data1_        = $result_->fetch_assoc();
				
$link = "torah-resources/".cleanURL($data1_['Seo']).'/'.cleanURL($data2_['Seo']).'/'.cleanURL($row_web_['Seo']);
}
if($OrderType == "Local Directory"){
$SubCategories_ ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="4" AND `Id`="'.$row_web_['Category'].'"';
$result_       = $db->query($SubCategories_);
$data3_        = $result_->fetch_assoc();


$city ='SELECT * FROM `city` WHERE `Status`="1" AND `Id`="'.$row_web_['City'].'"';
$result_       = $db->query($city);
$data2_        = $result_->fetch_assoc();

$province_ = 'SELECT * FROM `province` WHERE `Status`="1" AND `Id`="'.$data2_['ProvinceId'].'"';
$result_       = $db->query($province_);
$data1_        = $result_->fetch_assoc();

$categories_ = 'SELECT * FROM `categories` WHERE `Status`="1" AND   `Id`="'.$row_web_['Category'].'"';
$result_       = $db->query($categories_);
$data4_        = $result_->fetch_assoc();

				
$link = "listings-community-categories/".cleanURL($data2_['CitySeo']).'/'.cleanURL($data1_['ProvinceSeo']).'/'.cleanURL($data4_['Seo']).'/'.cleanURL($row_web_['Seo']);
}
					
					?>
                    
<li>  
<a href="<?=$link?>">
<?php echo $row_web_['CompanyWebsite']; ?> <span>(<?php echo $row_country_code['Country'];?>)</span>
</a>
</li>
					<?php 
					}
						echo '                        
 </ul>
 </article>                       
';
					}
				}
	echo '</div>';			
			}
		?>	

    
         
         
  	</div>
	</div>
    
   	<div id='sidebar'>
    <h3>Premium Ad</h3><br>

<?php require_once('ads-listings-search.php'); ?>


<div> 
<img src="<?=ADDRESS_SITE?>images/placeholder.jpg" > 
</div>
        <br>

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