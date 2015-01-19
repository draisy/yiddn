<?php require_once('inc.files.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$row_home->Title;?> - Special Offers</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
 <link href="css/inner.css" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
<link href="css/innermedia.css" rel="stylesheet">
<link href="css/newform.css" rel="stylesheet">
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
    
    
    
    
    <div id="main" style="width:90%;">
    <h1>The Best Deals on the Web</h1>
    <p>Our merchants often offer promotions exclusively for Yiddn.com users.
</p><br>

    
	 <div class="section group">
     
	<div class="col span_1_of_3">
	<div  class="specialsearch">
    <form method="get" class="newform">
    <h3 style=" color:#8A0E6E">Filter By Ads</h3>
    
          <h5>Categories:</h5>
<label class="label">
<select name="category"  class="searching">
<option value="">Select</option>
<?php
$query_category = 'SELECT * FROM `categories` WHERE `Status`="1" AND `UseFor`="1"  ORDER By Title ASC';
$result_category = $db->query($query_category);
while ($row_category = $result_category->fetch_assoc()){ 			
?>
<optgroup label="<?php echo $row_category['Title'];?>">
<?php
$query_sub_category = 'SELECT * FROM `sub-categories` WHERE `Status`="1" AND `UseFor`="1"  AND `Cid`="'.$row_category['Id'].'"  ORDER By Title ASC';
$result_sub_category = $db->query($query_sub_category);
while ($row_sub_category = $result_sub_category->fetch_assoc()){ 			
?>
<option value="<?php echo $row_sub_category['Seo'];?>" <?php if(isset($_GET['category'])&& $_GET['category']==$row_sub_category['Seo']){echo ' selected="selected"';}?>>&nbsp;
<?php echo $row_sub_category['Title'];?>
</option>
<?php }?>
</optgroup>
<?php }?>
</select>   
</label>
<br>
 <h5>City:</h5>
<label class="label">

<select name="city"  class="searching">
<option value="">Select</option>
<?php
$query = 'SELECT * FROM `country` WHERE `Status`="1" ORDER By `Country` ASC';
$result = $db->query($query);
while ($row = $result->fetch_assoc()) 
{	
?>
<optgroup label="<?php echo $row['Country'];?>">
<?php
$query_city = 'SELECT * FROM `city` WHERE `Status`="1" AND `CountryId`="'.$row['Id'].'" ORDER By City ASC';
$result_city = $db->query($query_city);
while ($row_city = $result_city->fetch_assoc()) 
{	
?>
<option value="<?php echo $row_city['CitySeo'];?>" <?php if(isset($_GET['city'])&& $_GET['city']==$row_city['CitySeo']){echo ' selected="selected"';}?>>
<?php echo $row_city['City'];?>
</option>
<?php }?>
</optgroup>
<?php }?>
</select>


</label>

 <br>
  <h5>Company:</h5>
<label class="label">
<select name="company"  class="searching">
<option value="">Select</option>
<?php
$query_com = 'SELECT * FROM `tb_ad_circular` WHERE `Status`="1" ORDER By CompanyName ASC';
$result_com = $db->query($query_com);
while ($row_com = $result_com->fetch_assoc()) 
{	
?>
<option value="<?php echo $row_com['Seo'];?>" <?php if(isset($_GET['company'])&& $_GET['company']==$row_com['Seo']){echo ' selected="selected"';}?>>
<?php echo $row_com['CompanyName'];?>
</option>
<?php }?> 
</select>
</label>
 <input type="submit" class="go" />
   
</form>
    </div> 

	</div>

<?php require_once('special-script.php'); ?>

<div class="col span_2_of_3">	



<?php 
$result2 = $db->query($query2);
$total = $result2->num_rows;
if($total > 0 ){
$count = 0;
while ($row = $result2->fetch_assoc()) 
	{	
		if($row['Banner2']!="")
		{?>
    <div class="col"  <?php if($count==1){echo 'style="margin-right:18px;"';}else{echo "";$count=0;}?>>
    <img src="images/Banner/<?php echo $row['Banner2'];?>" style="width: 305px;  height: 170px;" />
    </div>
		<?php 
		}
	}
}else{
echo "<h4>Slicha! We can't find anything for your search terms. How about trying again with fewer keywords, or consider adding a listing yourself?
</h4>";	
}
?>
</div>
    
     
     
 
</div>
	</div>
    
    
    
	 
		
	</div>
    
     
    
    
    </section>
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
 <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/login.js"></script>
<script src="js/custom.js"></script>
<!-- Java Script -->



</body>
</html>