<?php 
require_once('include/_header.php'); 
?>
<!-- Main -->
<div id="main">
<div class="master">
<div class="clr">&nbsp;</div>
<div id="big-sale"><?php require_once('newsTicker.php'); ?></div>
<div class="clr">&nbsp;</div>
<div class="center-div">



      
   
    


<h2 class="cityareaname"><?php 

	$query3 = 'select * from `city` WHERE `CitySeo` =  "'.$info[0].'" AND `Status`="1"';
    $result_city = $db->query($query3);
    $row_city = $result_city->fetch_assoc(); 
	echo $row_city['City'] .", " .$info[1];?></h2>    
<label style="float:right; margin-top: -30px;">
Sort / Filter by
<select  class="searching" onChange="document.location.href=this.value"> 
	<option value="">Select</option>
	<?php

	$get_Category1='';
	$query = 'SELECT * FROM `tb_local` WHERE `Status`="1"  AND ( `City`="'.$row_city_get['Id'].'" OR `City2`="'.$row_city_get['Id'].'" OR `City3`="'.$row_city_get['Id'].'") group by Category1';
	$result = $db->query($query);
	$total_results = $result->num_rows;
	$categories = array();
	while ($rows = $result->fetch_assoc())
	{
	$query3 = 'SELECT * FROM `categories` WHERE `Id` = "'.$rows['Category1'].'" ORDER BY `Title` ASC';
	$res = $db->query($query3);
		
		while ($row = $res->fetch_assoc()) 
		{	
		  $categories[] = $row['Title']; 
		  asort($categories);
		} 
	}	
		foreach($categories as $category) {
			?>
			<option value="<?php echo $info[0].'_'.$category;?>" <?php if ($category == $row['Title']){echo ' selected ="selected"';}?>>
			<?php echo $category;?></option>
		<?php }?>
		</select>
		</label>
		<br />

    <h1 style="text-align:left;"> Complete Directory Listing</h1><br />
<br />

<div class="clr"></div>
<div class="inner-col-right" style="width:320px; float:right; margin-right:0px; margin-top:-72px; border-left:1px dotted #ccc;">   <?php
	$result = $db->query($query2);
	$total_results = $result->num_rows;
	$count = 0;
	if($total_results>0){
		echo '<div class="clr">&nbsp;</div>
		<h1 style="text-align:center !important; margin-left:57px;">Premium Ads</h1><br />
		<!--<div style="text-align:center !important"><a href="#listings" id="listings">Click here</a> to view the complete directory listings</div><br />-->';
	while ($row = $result->fetch_assoc()) 
	{
	$count++;
	$country_code     =  $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$row_city_get['Id'].'"');
	$row_country_code = $country_code->fetch_assoc();			

	?>    
    
        
<?php if($row_city_get['Id']==$row['City'] && $row['Banner']!="" && $row['Category1']==$row_category['Id']){?>
<div class="box">
<a class="big-link" data-reveal-id="myModal<?php echo $row['Id_Local']; ?>" href="<?php echo ADDRESS_SITE;?>view-detail-local-director/<?php echo $row['Seo']; ?>" >
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $row['Banner'];?>" /> </a>
</div>

<?php }?>

<?php if($row_city_get['Id']==$row['City2'] && $row['Banner2']!="" && $row['Category1']==$row_category['Id']){?>
<div class="box">
<a class="big-link" data-reveal-id="myModal<?php echo $row['Id_Local']; ?>" href="<?php echo ADDRESS_SITE;?>view-detail-local-director/<?php echo $row['Seo']; ?>" >
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $row['Banner2'];?>" /> </a>
</div>
<?php }?>


<?php if($row_city_get['Id']==$row['City3'] && $row['Banner3']!="" && $row['Category1']==$row_category['Id']){?>
<div class="box">
<a class="big-link" data-reveal-id="myModal<?php echo $row['Id_Local']; ?>" href="<?php echo ADDRESS_SITE;?>view-detail-local-director/<?php echo $row['Seo']; ?>" >
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $row['Banner3'];?>" /> </a>
</div>

<?php }?>

<div id="myModal<?php echo $row['Id_Local']; ?>" class="reveal-modal" align="center">
						<h1 style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['CompanyName']; ?> <a class="close-reveal-modal" style="text-align:right; float:right; padding-right:5px;">X Close</a></h1> 
                            <div class="listings-div3">
                            <?php if($row['CompanyLogo']!=""){?>
                            <img src="<?php echo ADDRESS_SITE;?>images/CompanyLogo/<?php echo $row['CompanyLogo']; ?>" />
                            <?php }else{?>
                            <img src="<?php echo ADDRESS_SITE;?>images/Picture-Not-Available.gif"  />
                            <?php }?>
                            <div class="name">
<strong>Website:</strong> <a href="http://<?php echo $row['CompanyWebsite']; ?>" target="_blank"><?php echo $row['CompanyWebsite']; ?></a>
</div>

<?php if($row['CompanyEmail']!=""){?>
<div class="name">
<strong>Email:</strong> <?php echo $row['CompanyEmail']; ?>
</div>

<?php }?>
<?php if($row['CompanyAddress']!="" && $row['CompanyAddress']!="CompanyAddress"){?>

<div class="name">
<strong>Address:</strong> <?php echo $row['CompanyAddress']; ?>
</div>

<?php }?>
<?php if($row_country_code['Country']!=""){?>
<div class="name">
<strong>Location:</strong> <?php echo $row_country_code['Country']; ?>
</div><br />
<?php }?>

   <!--<div class="date"><?php echo $row['DateAdded']; ?></div>-->
		<div class="clr">&nbsp;</div><br />
		<?php if($row['ShortDescription']!="ShortDescription"){?>  
        <div class="description">
        <?php echo  "<div class='clr'>&nbsp;</div>".$row['ShortDescription'];?>
        </div><br />
        <?php } ?>
		
		<?php if($row['Description']!="Description"){?>  
        <div class="description">
        <?php echo $row['Description'];?>
        </div><br />
        <?php } ?>
   <div class="clr">&nbsp;</div><br />
  <form method="post" action="../bookmark-action">
  <input type="hidden" name="UserId" 	  value="<?php if(isset($_SESSION['Yiddn_login_Id'])){echo $_SESSION['Yiddn_login_Id'];}else{echo "0";}?>" />
  <input type="hidden" name="Url"    	  value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
  <input type="hidden" name="CompanyUrl"  value="<?php echo $row['CompanyWebsite']; ?>" />
  <input type="hidden" name="Modal"  	  value="myModal<?php echo $row['Id_Local']; ?>" />
  <input type="hidden" name="CompanyName" value="<?php echo $row['CompanyName']; ?>" />
  <input type="hidden" name="OrderType"   value="Local Directory" />
  <input type="submit" name="Bookmark"    value=""class="Bookmark" />
  </form>
                            <span class='st_facebook'></span>
                            <span class='st_twitter'></span>
                            <span class='st_linkedin'></span>
                            <span class='st_googleplus'></span>
                            <span class='st_pinterest'></span>
                            <span class='st_email'></span>
                            <span class='st_sharethis'></span>
                            
                            
                            <script type="text/javascript">var switchTo5x=true;</script>
                            <script type="text/javascript" src="../js/buttons.js"></script>
                            <script type="text/javascript">stLight.options({publisher: "67f93f04-fc6a-415b-b08f-158e2e51f406", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                            
                            </div>

                    </div>

        
        
<?php }?>
<?php
$folder =  "listingads/local-directory/";
$filetype = '*.*';
$files = glob($folder.$filetype);
$count = count($files);
for ($i = 0; $i < 1; $i++) {
	if($files[$i]!="listingads/local-directory/Thumbs.db"){
	echo '<div class="box">';
	echo'<a class="big-link" data-reveal-id="AModal-'.$i.'">';
  	  echo '<img src="../'.$files[$i].'" alt="'.$i.'" />';
	echo '</div>';
	}
	echo '<div id="AModal-'.$i.'" class="reveal-modal" align="center">';
                    $filenames=file('listingads/'.$i.'-local-ad.txt');
                    foreach($filenames as $fname)
                    {
                    echo $fname;
                    }
					
echo '</div>'; 
}
?></div>

<div class="inner-col-left" style="width:740px; border:0;">
  <div class="torah-and-resources" style="width:740px;">

	<?php
	

	$query_categories   = 'SELECT * FROM `categories` WHERE `Status`="1" AND `Title`="'.$info[1].'" ORDER BY `Title` ASC';
	$query_category		= $db->query($query_categories);
	$total_results = $query_category->num_rows;
	if($total_results>0){
	while ($rows = $query_category->fetch_assoc()){
	
	$country_code     =  $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$row_city_get['Id'].'"');
	$row_country_code = $country_code->fetch_assoc();	
	
	$query1 = 'SELECT * FROM `tb_local` WHERE `Status`="1"   AND `Category1`='.$rows['Id'].' AND (`City`='.$row_city_get['Id'].' OR `City2`='.$row_city_get['Id'].' OR `City3`='.$row_city_get['Id'].')  ORDER BY `CompanyWebsite` ASC';
	$result = $db->query($query1);
	$total_results = $result->num_rows;
	$count = 0;
//	echo "<span class='categorie_title'>".$rows['Title']."</span><br />";
	if($total_results>0){
		
		while ($row = $result->fetch_assoc()) 
				{
				$count++;
	
	?>
    				<div class="web_url" style="width:330px;">
                        
						<a  class="big-link" data-reveal-id="xmyModal<?php echo $row['Id_Local']; ?>" href="http://<?php echo $row['CompanyWebsite']; ?>" target="_blank"   <?php if($row['upgrade']!="" && $row['upgrade']!="N/A." && $row_city_get['Id']==$row['City']){echo 'style="font-weight:bold;"';}elseif($row['upgrade2']!="" && $row['upgrade2']!="N/A." && $row_city_get['Id']==$row['City2']){echo 'style="font-weight:bold;"';}elseif($row['upgrade3']!="" && $row['upgrade3']!="N/A." && $row_city_get['Id']==$row['City3']){echo 'style="font-weight:bold;"';}?>>
						<?php echo $row['CompanyWebsite']; ?> 
						<!--<span>( -->
						<?php /*echo $row_country_code['Country']; */?>
						<!--) </span> -->
						</a>
					</div>
   
                    <div id="xmyModal<?php echo $row['Id_Local']; ?>" class="reveal-modal" align="center">
						<h1 style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['CompanyName']; ?> <a class="close-reveal-modal" style="text-align:right; float:right; padding-right:5px;">X Close</a></h1> 
                            <div class="listings-div3">
                            <?php if($row['CompanyLogo']!=""){?>
                            <img src="<?php echo ADDRESS_SITE;?>images/CompanyLogo/<?php echo $row['CompanyLogo']; ?>" />
                            <?php }else{?>
                            <img src="<?php echo ADDRESS_SITE;?>images/Picture-Not-Available.gif"  />
                            <?php }?>
                            <div class="name">
<strong>Website:</strong> <a href="http://<?php echo $row['CompanyWebsite']; ?>" target="_blank"><?php echo $row['CompanyWebsite']; ?></a>
</div>

<?php if($row['CompanyEmail']!=""){?>
<div class="name">
<strong>Email:</strong> <?php echo $row['CompanyEmail']; ?>
</div>

<?php }?>
<?php if($row['CompanyAddress']!="" && $row['CompanyAddress']!="CompanyAddress"){?>

<div class="name">
<strong>Address:</strong> <?php echo $row['CompanyAddress']; ?>
</div>

<?php }?>
<?php if($row_country_code['Country']!=""){?>
<div class="name">
<strong>Location:</strong> <?php echo $row_country_code['Country']; ?>
</div><br />

<?php }?>
   <!--<div class="date"><?php echo $row['DateAdded']; ?></div>-->
   <div class="clr">&nbsp;</div>
	    <?php if($row['ShortDescription']!="ShortDescription"){?>  
        <div class="description">
        <?php echo  "<div class='clr'>&nbsp;</div>".$row['ShortDescription'];?>
        </div><br />
        <?php } ?>
		
		<?php if($row['Description']!="Description"){?>  
        <div class="description">
        <?php echo $row['Description'];?>
        </div><br />
        <?php } ?>
   <div class="clr">&nbsp;</div><br />
  <form method="post" action="../bookmark-action">
  <input type="hidden" name="UserId" 	  value="<?php if(isset($_SESSION['Yiddn_login_Id'])){echo $_SESSION['Yiddn_login_Id'];}else{echo "0";}?>" />
  <input type="hidden" name="Url"    	  value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
  <input type="hidden" name="CompanyUrl"  value="<?php echo $row['CompanyWebsite']; ?>" />
  <input type="hidden" name="Modal"  	  value="xmyModal<?php echo $row['Id_Local']; ?>" />
  <input type="hidden" name="CompanyName" value="<?php echo $row['CompanyName']; ?>" />
  <input type="hidden" name="OrderType"   value="Local Directory" />
  <input type="submit" name="Bookmark"    value=""class="Bookmark" />
  </form>
                            <span class='st_facebook'></span>
                            <span class='st_twitter'></span>
                            <span class='st_linkedin'></span>
                            <span class='st_googleplus'></span>
                            <span class='st_pinterest'></span>
                            <span class='st_email'></span>
                            <span class='st_sharethis'></span>
                            
                            
                            <script type="text/javascript">var switchTo5x=true;</script>
                            <script type="text/javascript" src="../js/buttons.js"></script>
                            <script type="text/javascript">stLight.options({publisher: "67f93f04-fc6a-415b-b08f-158e2e51f406", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                           
                            </div>
                    </div>
					
				<?php 
				}// End While
		echo '<div class="clr">&nbsp;</div><br>';
		} //End if 
	}// End While 
	}//End if
	?> 
<div class="clr">&nbsp;</div>
      </div>
      
<div class="clr">&nbsp;</div>

          
     
 
      <br />

 <h3 class="jewe">Your listing is FREE!<br /> <a href="<?php echo ADDRESS_SITE;?>local">Add yours here.</a></h3>
  <?php }?> 
    
  
<br />
<br />
<?php
//echo pagination($statement,$limit,$page);
?>        
</div>
 
    </div>
    <!--//2 Column --> 
   <?php require_once('include/_col_bottom.php'); ?>    
  </div>
  <!-- End Main --> 
</div>
<div class="clr">&nbsp;</div>
<?php require_once('include/_footer.php'); ?>