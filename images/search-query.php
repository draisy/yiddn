<?php
$where = " `Status`='1' AND `UseFor` IN ('2','3','4')";

if(isset($_GET['keywords']) && $_GET['keywords']!='' && $_GET['president'] =="")
	{
	$Category    ='';
	$record_id   ='';
	$subcat_id   ='';
	$cat_id      ='';
		
	$query_Keywords = "SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category,
	Id_Etailer AS ID,'etailer' as tablename
FROM `tb_etailer` 
WHERE  `Status`= '1' AND
	(
	 `CompanyName` LIKE '%".$_GET['keywords']."%' OR 
	 `ShortDescription` LIKE '%".$_GET['keywords']."%' OR 
	 `CompanyKeywords` LIKE '%".$_GET['keywords']."%' OR
	 `Description` LIKE '%".$_GET['keywords']."%' 
	 )

UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category,
Id_torah_resources AS ID,'torah' as tablename

FROM `tb_torah_resources` 
WHERE  `Status`= '1' AND
	(
	 `CompanyName` LIKE '%".$_GET['keywords']."%' OR 
	 `ShortDescription` LIKE '%".$_GET['keywords']."%' OR 
	 `CompanyKeywords` LIKE '%".$_GET['keywords']."%' OR
	 `Description` LIKE '%".$_GET['keywords']."%' 
	 )

UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category1 AS Category,
Id_Local AS ID ,'local' as tablename
FROM `tb_local` 
WHERE  `Status`= '1' AND
	(
	 `CompanyName` LIKE '%".$_GET['keywords']."%' OR 
	 `ShortDescription` LIKE '%".$_GET['keywords']."%' OR 
	 `CompanyKeywords` LIKE '%".$_GET['keywords']."%' OR
	 `Description` LIKE '%".$_GET['keywords']."%' 
	 )
";	

	
	
	
	$result_Keywords = $db->query($query_Keywords);
	while($row_Keywords = $result_Keywords->fetch_assoc()){
	
	$record_id   .= $row_Keywords['ID'].",";
	
	if($row_Keywords['Category']!="" && $row_Keywords['tablename'] == "local"){
	$cat_id   .= $row_Keywords['Category'].",";
	}

	if($row_Keywords['Category']!="" && $row_Keywords['tablename'] != "local"){
	$subcat_id   .= $row_Keywords['Category'].",";
	}
	
	

/*	if($row_Keywords['Category2']!=""){
	$subcat_id   .= $row_Keywords['Category2'].",";
	}
	if($row_Keywords['Category3']!=""){
	$subcat_id   .= $row_Keywords['Category3'].",";
	}
*/
$query_categories      = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor` IN ("2","3","4") OR `Id`="'.$row_Keywords['Category'].'"';
//OR `Id`="'.$row_Keywords['Category2'].'" OR `Id`="'.$row_Keywords['Category3'].'"																	
	$result_categories  = $db->query($query_categories);
	$row_categorie 		= $result_categories->fetch_assoc();
	$services_categor   = $row_categorie['Cid'];
	$Category .= $row_categorie['Cid'].",";
	}
	
	$where .= "
	AND `Title` like  '%".str_replace(' ', '%', $_GET['keywords'])."%'
	OR `Id` IN  (".$Category."0)
	";
	}
	
if(isset($_GET['president']) && $_GET['president']!='' && $_GET['keywords'] =="")
	{
	$services_get_city='';
	$category='';
	$record_id   ='';
	$subcat_id   ='';
	
	$stringToArray = explode(",",$_GET['president']);
	
	$query_city_get = 'SELECT * FROM `city` WHERE `Status`="1" AND 
	 (`City` LIKE "%'.$stringToArray[0].'") ';
	$result_city_get = $db->query($query_city_get);
	$row_city_get = $result_city_get->fetch_assoc();
	
	/*$query_services_get_city = 'SELECT * FROM `tb_etailer` WHERE `Status`="1"
	AND `City`="'.$row_city_get['Id'].'" ';*/
	
	
$query_services_get_city = "SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category,
	Id_Etailer AS ID,'etailer' as tablename
FROM `tb_etailer` 
WHERE  `Status`= '1' AND `City` = '".$row_city_get['Id']."'

UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category,
Id_torah_resources AS ID,'torah' as tablename

FROM `tb_torah_resources` 
WHERE  `Status`= '1' AND `City` = '".$row_city_get['Id']."'

UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category1,
Id_Local AS ID ,'local' as tablename
FROM `tb_local` 
WHERE  `Status`= '1' AND `City` = '".$row_city_get['Id']."'
";
	
	
	
	
	$result_services_get_city = $db->query($query_services_get_city);
	$total_results = $result_services_get_city->num_rows;
	if($total_results>0){
	while($row_services_get_city = $result_services_get_city->fetch_assoc()){
	$record_id   .= $row_services_get_city['ID'].",";
	$subcat_id   .= $row_services_get_city['Category'].",";	
			if($row_services_get_city['Category']!=""){
$query_categories      = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor` IN ("2","3","4") AND `Id`="'.$row_services_get_city['Category'].'"';
			$result_category     = $db->query($query_categories);
			$total_results = $result_category->num_rows;
				if($total_results>0){
				$row_categorie = $result_category->fetch_assoc();
				$category .= $row_categorie['Cid'].",";
				}
			  }
			  /*if($row_services_get_city['Category2']!=""){
			$query_categories      = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor` IN ("2","3","4") AND `Id`="'.$row_services_get_city['Category2'].'"';
			$result_category     = $db->query($query_categories);
			$total_results = $result_category->num_rows;
				if($total_results>0){
				$row_categorie = $result_category->fetch_assoc();
				$category .= $row_categorie['Cid'].",";
				}
			  }*/
			  /*if($row_services_get_city['Category3']!=""){
			$query_categories      = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor` IN ("2","3","4") AND `Id`="'.$row_services_get_city['Category3'].'"';
			$result_category     = $db->query($query_categories);
			$total_results = $result_category->num_rows;
				if($total_results>0){
				$row_categorie = $result_category->fetch_assoc();
				$category .= $row_categorie['Cid'].",";
				}
			  }*/
		  }
	    $where .= "AND `Id` IN  (".$category."0)";
		}else{
		$where .= "AND `Id`='0'";
		}
		
	}

if(isset($_GET['president']) && $_GET['president']!="" && isset($_GET['keywords']) && $_GET['keywords']!="" ){
    
	
	$services_get_city='';
	$category='';
	$record_id   ='';
	$subcat_id   ='';
	
	
	$stringToArray = explode(",",$_GET['president']);
	$query_city_get = 'SELECT * FROM `city` WHERE `Status`="1" AND 
	 (`CountryId` LIKE "%'.$_GET['president'].'%" AND `City` LIKE "%'.$stringToArray[0].'") ';
	$result_city_get = $db->query($query_city_get);
	$row_city_get = $result_city_get->fetch_assoc();
	
	$query_services_get_city = 'SELECT * FROM `tb_etailer` WHERE `Status`="1"
	AND `City`="'.$row_city_get['Id'].'" 
	AND
	(
	 `CompanyName` LIKE "%'.$_GET['keywords'].'%" OR 
	 `ShortDescription` LIKE "%'.$_GET['keywords'].'%" OR 
	 `CompanyKeywords` LIKE "%'.$_GET['keywords'].'%" OR
	 `Description` LIKE "%'.$_GET['keywords'].'%" 
	 )
	';
	
	
	$query_services_get_city = "SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category,
	Id_Etailer AS ID,'etailer' as tablename
FROM `tb_etailer` 
WHERE  `Status`= '1' AND `City` = '".$row_city_get['Id']."' AND
	(
	 `CompanyName` LIKE '%".$_GET['keywords']."%' OR 
	 `ShortDescription` LIKE '%".$_GET['keywords']."%' OR 
	 `CompanyKeywords` LIKE '%".$_GET['keywords']."%' OR
	 `Description` LIKE '%".$_GET['keywords']."%' 
	 )


UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category,
Id_torah_resources AS ID,'torah' as tablename

FROM `tb_torah_resources` 
WHERE  `Status`= '1' AND `City` = '".$row_city_get['Id']."' AND
	(
	 `CompanyName` LIKE '%".$_GET['keywords']."%' OR 
	 `ShortDescription` LIKE '%".$_GET['keywords']."%' OR 
	 `CompanyKeywords` LIKE '%".$_GET['keywords']."%' OR
	 `Description` LIKE '%".$_GET['keywords']."%' 
	 )


UNION

SELECT CompanyName, OrderType, CompanyWebsite, City, Seo, Category1,
Id_Local AS ID ,'local' as tablename
FROM `tb_local` 
WHERE  `Status`= '1' AND `City` = '".$row_city_get['Id']."' AND
	(
	 `CompanyName` LIKE '%".$_GET['keywords']."%' OR 
	 `ShortDescription` LIKE '%".$_GET['keywords']."%' OR 
	 `CompanyKeywords` LIKE '%".$_GET['keywords']."%' OR
	 `Description` LIKE '%".$_GET['keywords']."%' 
	 )


";
	

	
	$result_services_get_city = $db->query($query_services_get_city);
	$total_results = $result_services_get_city->num_rows;
	if($total_results>0){
	while($row_services_get_city = $result_services_get_city->fetch_assoc()){
	$record_id   .= $row_services_get_city['Id_Etailer'].",";
	$subcat_id   .= $row_services_get_city['Category'].",";	
			if($row_services_get_city['Category']!=""){
			$query_categories      = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor` IN ("2","3","4") AND `Id`="'.$row_services_get_city['Category'].'"';
			$result_category     = $db->query($query_categories);
			$total_results = $result_category->num_rows;
				if($total_results>0){
				$row_categorie = $result_category->fetch_assoc();
				$category .= $row_categorie['Cid'].",";
				}
			  }
			  if($row_services_get_city['Category2']!=""){
			$query_categories      = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor` IN ("2","3","4") AND `Id`="'.$row_services_get_city['Category2'].'"';
			$result_category     = $db->query($query_categories);
			$total_results = $result_category->num_rows;
				if($total_results>0){
				$row_categorie = $result_category->fetch_assoc();
				$category .= $row_categorie['Cid'].",";
				}
			  }
			  if($row_services_get_city['Category3']!=""){
			$query_categories      = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor` IN ("2","3","4") AND `Id`="'.$row_services_get_city['Category3'].'"';
			$result_category     = $db->query($query_categories);
			$total_results = $result_category->num_rows;
				if($total_results>0){
				$row_categorie = $result_category->fetch_assoc();
				$category .= $row_categorie['Cid'].",";
				}
			  }
		  }
	    $where .= "AND `Id` IN  (".$category."0)";
	}
	
   
}

$categoreis ="select * from `categories` WHERE ".$where." ORDER By Title ASC";
?>