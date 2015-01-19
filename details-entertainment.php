<?php 
require_once('inc.files.php');
$categories = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="5" AND  `Seo`="'.$backpath2.'"';
$result       = $db->query($categories);
$data1        = $result->fetch_assoc();
$SubCategories ='SELECT * FROM `sub-categories` WHERE `Status`="1" AND  `UseFor`="5" AND `Seo`="'.$backpath3.'"';
$result       = $db->query($SubCategories);
$data2        = $result->fetch_assoc();
$tb_entertainment = 'SELECT * FROM `tb_entertainment` WHERE `Status`="1" AND `Seo` LIKE "%'.str_replace("-", "%", $pathInfo).'%" AND (`Category`="'.$data2['Id'].'" OR `Category2`="'.$data2['Id'].'"  OR `Category3`="'.$data2['Id'].'")  ORDER BY `CompanyWebsite` ASC';
$result       = $db->query($tb_entertainment);
$data3        = $result->fetch_assoc();
$city     =  $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$data3['City'].'"');
$city_code = $city->fetch_assoc();			
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$row_home->Title;?> | Entertainment | <?=$data1['Title']?> | <?=$data2['Title']?> | <?=$data3['CompanyName']?></title>
<meta name="keywords" content="<?=$row_home->Title;?>, Entertainment, <?=$data1['Title']?>, <?=$data2['Title']?>, <?=$data3['CompanyName']?>" />
<meta name="Description" content="<?=$row_home->Title;?> Entertainment, <?=$data1['Title']?>, <?=$data2['Title']?>, <?=$data3['CompanyName']?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link href="<?=ADDRESS_SITE?>css/inner.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/reset.css" type="text/css" media="all" />
<link href="<?=ADDRESS_SITE?>css/innermedia.css" rel="stylesheet">
<link href="<?=ADDRESS_SITE?>css/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/dropdown.css" />
<link rel="stylesheet" href="<?=ADDRESS_SITE?>css/tables.css" />
<style>
 #content-main {
padding: 0;
position: relative;
margin-top: 0px;
} 
 </style>

  </head>
<body>




 
        
   	<section id="content-main">
    <div class="shell">
    
    <div id="main">
	<div id='article'>
        
           <!--<h2><?php //echo $data3['CompanyName']; ?></h2>-->

  <article style=" background:none; margin:0; float:left; width:98%; margin-right:10px;">   
<?php if($data3['CompanyLogo']!=""){?>
<img class="CompanyLogo" src="<?php echo ADDRESS_SITE;?>images/CompanyLogo/<?php echo $data3['CompanyLogo']; ?>" width="200" />
<?php }else{?>
<img class="CompanyLogo" src="<?php echo ADDRESS_SITE;?>images/Picture-Not-Available.gif" width="200" />
<?php }?>
<table style="border:0;">
    <thead>
        </thead>
    <tr>
      <td width="16%" data-title="Order ID" style="color:#96257F">Website</td>
      <td width="84%" colspan="4" data-title="Listing Type">
<?php if($data3['CompanyWebsite']!=""){?>
<a href="http://<?php echo $data3['CompanyWebsite']; ?>" target="_blank"><?php echo $data3['CompanyWebsite']; ?></a>
<?php }?>
       </td>
    </tr>
    <tr>
      <td data-title="Order ID" style="color:#96257F">Email</td>
      <td colspan="4" data-title="Listing Type">
<?php if($data3['CompanyEmail']!=""){?>
<?php echo $data3['CompanyEmail']; ?>
<?php }?>
      </td>
    </tr>
    <?php if($data3['CompanyAddress']!="" && $data3['CompanyAddress']!="CompanyAddress"){?>
    <tr>
      <td data-title="Order ID" style="color:#96257F">Address:</td>
         <td colspan="4" data-title="Listing Type">
	 <a href="https://www.google.com/maps/place/<?php echo $data3['CompanyAddress'] ?>" target="_blank"><?php echo $data3['CompanyAddress']; ?></a>
    </td>
    </tr>
    
     <?php }?>
<?php if($data3['Telephone']!="" && $data3['Telephone']!="Telephone"){
	$tele_num=$data3['Telephone'];
	$tele_num=str_replace("-","",$tele_num);
	$tele_num=str_replace(".","",$tele_num);
	$tele_num=str_replace(" ","",$tele_num);
	$tele_num=str_replace("(","",$tele_num);
	$tele_num=str_replace(")","",$tele_num);
	?>
<tr>
  <td data-title="Order ID" style="color:#96257F">Telephone:</td>
  <td colspan="4" data-title="Listing Type">
   <a href="tel:<?php echo $data3['Telephone']; ?>"><?php echo $tele_num; ?></a>
  </td>
</tr>
<?php }?>
   
    <?php if($city_code['Country']!=""){?>
    <tr>
      <td data-title="Order ID" style="color:#96257F">Location:</td>
      <td colspan="4" data-title="Listing Type">

<?php echo $city_code['Country']; ?>

            </td>
    </tr>
    <?php }?>
      
 <?php if($data3['ShortDescription']!="ShortDescription"){?>        
       <tr>
         <td colspan="5" data-title="Order ID"><span style="color:#96257F; line-height:40px;">Short Description: </span><br>

<?php echo $data3['ShortDescription']; ?>

            </td>
       </tr>
       <?php } ?>
        <?php if($data3['Description']!="Description"){?>  
       <tr>
         <td colspan="5" data-title="Order ID"><span style=" color:#96257F; line-height:40px;">Description: </span><br>

<?php echo $data3['Description']; ?>

           </td>
       </tr>
      <?php }?> 
      
 <?php if(
 $data3['ShortDescription']!="ShortDescription" && 
 $data3['ShortDescription']!="" || 
 $data3['Description']!="Description" && 
 $data3['Description']!=""
 ){?>        
      <tr>
         <td colspan="5"> 
    <br>
    <br>
    <br>
    <br>
<form method="post" action="<?=ADDRESS_SITE;?>bookmark-action" style="margin-right:20px;">
  <input type="hidden" name="UserId" 	  value="<?php if(isset($_SESSION['Yiddn_login_Id'])){echo $_SESSION['Yiddn_login_Id'];}else{echo "0";}?>" />
  <input type="hidden" name="Url"    	  value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
  <input type="hidden" name="CompanyUrl"  value="<?php echo $data3['CompanyWebsite']; ?>" />
  <input type="hidden" name="Modal"  	  value="myModal<?php echo $data3['Id_Entertainmnet']; ?>" />
  <input type="hidden" name="CompanyName" value="<?php echo $data3['CompanyName']; ?>" />
  <input type="hidden" name="OrderType"   value="Entertainment" />
  <input type="submit" name="Bookmark"    value="" class="Bookmark" />
  </form>
            </td>
       </tr>

<?php }?>        
       </table>         
  </form> </article>
	</div>
	</div>
    
    
    
	 
		
	</div>
    
     
    
    
    </section>
 
    
 
        
 
 
 
  
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