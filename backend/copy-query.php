<?php

require_once('include/config.php'); 
require_once('include/user-check.php'); 
	$dir = $_GET['directory'];
	$id = base64_decode($_GET['i']);
	$category = $_GET['category'];
	$current = $_GET['current'];

	switch ($dir) {
    case "1":
        $dir = "ad_circular";
        break;
    case "2":
       $dir = "etailer";
	   $order = "Jewish E-Taile";
        break;
	case "3":
		$dir = "local";
		$order = "Local Directory";
		break;
    case "4":
         $dir = "torah_resources";
		 $order = "Torah & Resources";
        break;
    case "5":
       $dir = "entertainment";
        break;
    case "6":
         $dir = "services";
        break;
    case "7":
         $dir = "seasonal";
        break;		
	}
	
	if (($dir != "local") && ($current != "local")) {
			$sql  = "INSERT INTO `tb_$dir` (`OrderId`, `CompanyName`, `CompanyAddress`, `CompanyEmail`, `CompanyWebsite`, `CompanyLogo`, `ShortDescription`, `Description`, `Agent`, 
		`CompanyKeywords`, `Category`, `upgrade`, `Premium`, `Banner`, `Category2`, `upgrade2`, `Premium2`, `Banner2`, `Category3`, `upgrade3`, `Premium3`, `Banner3`, `City`, `PaymentPlan`,
		`Coupon`, `Seo`, `DateAdded`, `Status`, `Userid`, `OrderType`, `step`, `Telephone`) SELECT `OrderId`, `CompanyName`, `CompanyAddress`, `CompanyEmail`, `CompanyWebsite`, `CompanyLogo`, `ShortDescription`, `Description`, `Agent`, 
		`CompanyKeywords`, `Category`, `upgrade`, `Premium`, `Banner`, `Category2`, `upgrade2`, `Premium2`, `Banner2`, `Category3`, `upgrade3`, `Premium3`, `Banner3`, `City`, `PaymentPlan`,
		`Coupon`, `Seo`, `DateAdded`, `Status`, `UserId`, `OrderType`, `step`, `Telephone` FROM `tb_$current` Where  `Id_$current`='".$id."'";
	
		$res = mysqli_query($db, $sql);
		/*
		if ($res) {
			echo 'success';
		}
		else{
			echo mysqli_error($db);
		}
		*/		
		$UPDATE = "UPDATE `tb_$dir` SET `Category`='".$category."', `OrderType`='".$order."' where  `Id_$dir`=LAST_INSERT_ID()";		
		$run = mysqli_query($db, $UPDATE);
		if ($run) {
			echo 'Success!';
		}
		else {
			echo 'Error, please try again. ';
		}
	}	

	elseif ( ($current == "local") && ($dir != "local")) {
	$sql  = "INSERT INTO `tb_$dir` (`OrderId`, `CompanyName`, `CompanyAddress`, `CompanyEmail`, `CompanyWebsite`, `CompanyLogo`, `ShortDescription`, `Description`, `Agent`, 
		`CompanyKeywords`, `upgrade`, `Premium`, `Banner`, `upgrade2`, `Premium2`, `Banner2`, `upgrade3`, `Premium3`, `Banner3`, `City`, `PaymentPlan`,
		`Coupon`, `Seo`, `DateAdded`, `Status`, `UserId`, `OrderType`, `step`, `Telephone`) SELECT `OrderId`, `CompanyName`, `CompanyAddress`, `CompanyEmail`, `CompanyWebsite`, `CompanyLogo`, `ShortDescription`, `Description`, `Agent`, 
		`CompanyKeywords`, `upgrade`, `Premium`, `Banner`, `upgrade2`, `Premium2`, `Banner2`,`upgrade3`, `Premium3`, `Banner3`, `City`, `PaymentPlan`,
		`Coupon`, `Seo`, `DateAdded`, `Status`, `UserId`, `OrderType`, `step`, `Telephone` FROM `tb_$current` Where  `Id_$current`='".$id."'";
		$res = mysqli_query($db, $sql);
				
		$UPDATE = "UPDATE `tb_$dir` SET `Category`='".$category."', `OrderType`='".$order."' where  `Id_$dir`=LAST_INSERT_ID()";		
		$run = mysqli_query($db, $UPDATE);
		if ($run) {
			echo 'Success!';
		}
		else {
			echo 'Error, please try again.';
		}
	}	
	else {
	
	$sql  = "INSERT INTO `tb_$dir` (`OrderId`, `CompanyName`, `CompanyAddress`, `CompanyEmail`, `CompanyWebsite`, `CompanyLogo`, `ShortDescription`, `Description`, `Agent`, 
		`CompanyKeywords`, `upgrade`, `Premium`, `Banner`, `upgrade2`, `Premium2`, `Banner2`, `upgrade3`, `Premium3`, `Banner3`, `City`, `PaymentPlan`,
		`Coupon`, `Seo`, `DateAdded`, `Status`, `UserId`, `OrderType`, `step`, `Telephone`) SELECT `OrderId`, `CompanyName`, `CompanyAddress`, `CompanyEmail`, `CompanyWebsite`, `CompanyLogo`, `ShortDescription`, `Description`, `Agent`, 
		`CompanyKeywords`, `upgrade`, `Premium`, `Banner`, `upgrade2`, `Premium2`, `Banner2`,`upgrade3`, `Premium3`, `Banner3`, `City`, `PaymentPlan`,
		`Coupon`, `Seo`, `DateAdded`, `Status`, `UserId`, `OrderType`, `step`, `Telephone` FROM `tb_$current` Where  `Id_$current`='".$id."'";
		$res = mysqli_query($db, $sql);
				
		$UPDATE = "UPDATE `tb_$dir` SET `Category1`='".$category."', `OrderType`='".$order."' where  `Id_$dir`=LAST_INSERT_ID()";
		$run = mysqli_query($db, $UPDATE);
		if ($run) {
			echo 'Success!';
		}
		else {
			echo 'Error, please try again.';
		}
	}	
	//echo "<script>window.open('edit-torah-and-resources?i=".$_GET['i']."','_self')</script>";
	?>
	
