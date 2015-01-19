<?php require_once('inc.files.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> | Community</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
	<div id='article'  style='width:100%;'>
        
        <h1>community
</h1>
    <p style="font-style:italic;">Yiddn.com has hundreds of listings in Jewish communities around the world.</p>
       
        
       
<?php
$c = 1;
echo '<div style="float:left; display:inline-block;" class="thirty" >'; 


$city ="SELECT *,`city`.City AS CityTitle
FROM `city`
JOIN `tb_local`
ON `city`.Id=`tb_local`.City
GROUP BY `tb_local`.City
ORDER by CityTitle ASC
";


$count=1;
//$city ="SELECT * FROM `city` WHERE Status='1' ORDER BY `City` ASC";
$result = $db->query($city);
$total  = $result->num_rows;
while ($row = $result->fetch_assoc()){
	$b = $c++;
echo '<article id="maincategory-commnity" style="width:100%;">
	   <ul>';		
$province ="SELECT * FROM `province` WHERE Status='1' AND `Id`='".$row['ProvinceId']."'";
$num = $db->query($province);
while ($rows = $num->fetch_assoc()){			
echo '<li><h3><a href="listings-community/'.$row[`city`.'CitySeo'].'/'.$rows['ProvinceSeo'].'">'.$row['CityTitle'].', '.$rows['Province'].'</a></h3></li>';
		}
echo "</ul></article>"; 

if ($b==round(($total/3))){
	echo "</div><div style='float:left; display:inline-block;' class='thirty'>";
	$c = 1;
	}

}


echo '</div>';
?>
       
  	</div>
	</div>
    
    
    
 
		
	</div>
    
     
    
    
    </section>
<div class="cl">&nbsp;</div>


 <div class="ad1"> 
  <h2>Your listing is FREE! <a class="add-btn" href="dashboard">Add yours here.</a></h2>
    
	<h3>Premium Ads</h3>
   <img src="images/test.jpg" > 
   </div>
   
    <div class="cl">&nbsp;</div>

    
    <!-- Footer -->
 <?php require_once('inc.footer.php'); ?>

 <!-- /Footer -->
 


      
         
 
        
 
 
 
  
<!-- Java Script -->      

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
    <script src="js/liquidmetal.js" type="text/javascript"></script>
    <script src="js/jquery.flexselect.js" type="text/javascript"></script>
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
</body>
</html>