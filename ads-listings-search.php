<?php
/*$Search  =  
"SELECT CompanyName, OrderType, CompanyWebsite, City,  Seo, Banner, Banner2, Banner3, 'Category1' AS Category   FROM `tb_local` WHERE  `Status` = 1 AND (CompanyName LIKE '%".$_GET['keywords']."%') $whereCity

UNION

(SELECT  CompanyName, OrderType, CompanyWebsite, City, Seo, Banner, Banner2, Banner3, Category   FROM `tb_torah_resources` WHERE `Status` = 1 AND (CompanyName LIKE '%".$_GET['keywords']."%') $whereCity )

UNION 

(SELECT  CompanyName, OrderType, CompanyWebsite, City, Seo, Banner, Banner2, Banner3, Category   FROM `tb_etailer` WHERE `Status` = 1 AND (CompanyName LIKE '%".$_GET['keywords']."%') $whereCity )";*/

$Search  =  
"
SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category, Banner, Banner2, Banner3
FROM `tb_etailer` 
WHERE `Status`='1' AND `Id_Etailer` IN (".$record_id_etailer."0) 

UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category, Banner, Banner2, Banner3
FROM `tb_torah_resources` 
WHERE `Status`='1' AND `Id_torah_resources` IN (".$record_id_torah."0) 

UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category1, Banner, Banner2, Banner3 
FROM `tb_local` 
WHERE `Status`='1' AND `Id_Local` IN (".$record_id_local."0) 


";


$result = $db->query($Search);
$total  = $result->num_rows;
if($total > 0){
	while ($data_row = $result->fetch_assoc()) 
		{
	$city        = $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$data_row['City'].'"');
	$city_code   = $city->fetch_assoc();			
	
	
$OrderType =  $data_row['OrderType'];
if($OrderType == "Jewish E-Taile"){
$SubCategories_ ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="2" AND `Id`="'.$data_row['Category'].'"';
$result_       = $db->query($SubCategories_);
$data2_        = $result_->fetch_assoc();

$categories_ = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="2" AND  `Id`="'.$data2_['Cid'].'"';
$result_       = $db->query($categories_);
$data1_        = $result_->fetch_assoc();
				
$link = "retailer/".cleanURL($data1_['Seo']).'/'.cleanURL($data2_['Seo']).'/'.cleanURL($data_row['Seo']);
}
if($OrderType == "Torah & Resources"){
$SubCategories_ ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="4" AND `Id`="'.$data_row['Category'].'"';
$result_       = $db->query($SubCategories_);
$data2_        = $result_->fetch_assoc();

$categories_ = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="4" AND  `Id`="'.$data2_['Cid'].'"';
$result_       = $db->query($categories_);
$data1_        = $result_->fetch_assoc();
				
$link = "torah-resources/".cleanURL($data1_['Seo']).'/'.cleanURL($data2_['Seo']).'/'.cleanURL($data_row['Seo']);
}
if($OrderType == "Local Directory"){
$SubCategories_ ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="4" AND `Id`="'.$data_row['Category'].'"';
$result_       = $db->query($SubCategories_);
$data3_        = $result_->fetch_assoc();


$city ='SELECT * FROM `city` WHERE `Status`="1" AND `Id`="'.$data_row['City'].'"';
$result_       = $db->query($city);
$data2_        = $result_->fetch_assoc();

$province_ = 'SELECT * FROM `province` WHERE `Status`="1" AND `Id`="'.$data2_['ProvinceId'].'"';
$result_       = $db->query($province_);
$data1_        = $result_->fetch_assoc();

$categories_ = 'SELECT * FROM `categories` WHERE `Status`="1" AND   `Id`="'.$data_row['Category'].'"';
$result_       = $db->query($categories_);
$data4_        = $result_->fetch_assoc();

				
$link = "listings-community-categories/".cleanURL($data2_['CitySeo']).'/'.cleanURL($data1_['ProvinceSeo']).'/'.cleanURL($data4_['Seo']).'/'.cleanURL($data_row['Seo']);
}
					
					?>		
				
<?php if($data_row['Banner']!=""){?>   
<div>
<a href="<?=$link?>" class="btn btn-default venoboxframe" data-type="iframe" title="<?=$data_row['CompanyName'];?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner'];?>" /></span>
</a>

</div>
<br>
<?php }?>


<?php  /*if($city_code['Id']==$data_row['City2'] && $data_row['Banner2']!=""){?>
<div>
<a href="<?=$link?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner2'];?>" />
</a>
</div>
<br>
<?php /*}*/?>

<?php /*if($city_code['Id']==$data_row['City3'] && $data_row['Banner3']!=""){?>
<div>
<a href="<?=$link?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner3'];?>" />
</a>
</div>
<br>
<?php /*}*/?>

	
	<?php }
}
?>

