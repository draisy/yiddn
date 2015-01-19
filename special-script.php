<?php
$where =  "`Status`='1' AND `Banner2`!='' AND `stantard`!='' ";

if(isset($_GET['category']) && $_GET['category']!="")
	{
	$SubCategory='';
	$query_sub_category_get = 'SELECT * FROM `sub-categories` WHERE `Status`="1"
	AND `Seo`="'.$_GET['category'].'" AND `UseFor`="1" ';
	$result_sub_category_get = $db->query($query_sub_category_get);
	while($row_sub_category_get = $result_sub_category_get->fetch_assoc()){
	$SubCategory .= $row_sub_category_get['Id'].",";
	}
	$where .= "AND `Category1` IN (".$SubCategory."0) OR `Category2` = '".$SubCategory."'";
	}
	
if(isset($_GET['city']) && $_GET['city']!="")
	{
	$query_city_get = 'SELECT * FROM `city` WHERE `Status`="1" AND 
	`CitySeo`="'.$_GET['city'].'"';
	$result_city_get = $db->query($query_city_get);
	$row_city_get = $result_city_get->fetch_assoc();
	$where .= "AND `City`='".$row_city_get['Id']."'";
	}
	
if(isset($_GET['company'])  && $_GET['company']!="")
	{
	$query_company_get = 'SELECT * FROM `tb_ad_circular` WHERE `Status`="1"
	 AND `Seo`="'.$_GET['company'].'"';
	$result_company_get = $db->query($query_company_get);
	$row_company_get = $result_company_get->fetch_assoc();
	$where .= "AND `Id_Ad_circular`='".$row_company_get['Id_Ad_circular']."'";
	}
	
if(isset($_GET['keywords'])&& $_GET['keywords']!="" && $_GET['Location'] =="")
	{
	$where .= "
	AND `CompanyName`     like  '%".str_replace(' ', '%', $_GET['keywords'])."%'
	OR  `CompanyKeywords`  like  '%".str_replace(' ', '%', $_GET['keywords'])."%'
	OR  `Address`      like  '%".str_replace(' ', '%', $_GET['keywords'])."%'
	";
	
	}
	
if(isset($_GET['Location'])&& $_GET['Location']!="" && $_GET['keywords'] =="")
	{
	
		$row_city_get='';
		$stringToArray = explode(",",$_GET['Location']);
		$query_get_city = 'SELECT * FROM `city` WHERE `Status`="1" AND 
	 (`CountryId` LIKE "%'.$_GET['LocationSeo'].'%" AND `City` LIKE "%'.$stringToArray[0].'") ';
	  $result_get_city= $db->query($query_get_city);
		while($row_get_city = $result_get_city->fetch_assoc()){
			$row_city_get .= $row_get_city['Id'].",";
		}
	
	
	$where .= "AND `City` IN (".$row_city_get."0)";	

	}
	
if(isset($_GET['keywords']) && $_GET['keywords'] !="" && isset($_GET['Location']) && $_GET['Location']!="")
	{
$query_city_get = 'SELECT * FROM `city` WHERE `Status`="1" AND 
	`City` LIKE "%'.$_GET['Location'].'%" OR `CitySeo` LIKE "%'.$_GET['Location'].'%" ';
	$result_city_get = $db->query($query_city_get);
	$row_city_get = $result_city_get->fetch_assoc();
	$where .= "AND `City` = '".$row_city_get['Id']."'
	OR
	(
	 `CompanyName` LIKE '%".$_GET['keywords']."%' OR 
	 `CompanyKeywords` LIKE '%".$_GET['keywords']."%' OR
	 `Description` LIKE '%".$_GET['keywords']."%' OR
	  `AdTitle` LIKE '%".$_GET['keywords']."%' OR
	 `Address` LIKE '%".$_GET['keywords']."%' 
	)";  	
}


$large = 'SELECT * FROM `tb_ad_circular` WHERE `Status`="1" AND `large`!=""   Order By RAND() LIMIT 1';
$small = 'SELECT * FROM `tb_ad_circular` WHERE `Status`="1" AND `small`!=""   Order By RAND() LIMIT 1';



$page       = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit      = 500;
$startpoint = ($page * $limit) - $limit;        
$statement  = "`tb_ad_circular` WHERE   ".$where." ORDER By `CompanyName` ASC";
$query2     = "select * from {$statement} LIMIT {$startpoint} , {$limit}";
	
?>