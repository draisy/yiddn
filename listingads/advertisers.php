<?php require_once('include/_header.php'); ?>
<!-- Main -->
<div id="main">
<div class="master">
<div class="clr">&nbsp;</div>
<div id="big-sale"><?php require_once('newsTicker.php'); ?></div>
<div class="clr">&nbsp;</div>
    <div class="inner-col-left">
	<h1 class="headline" style="margin-left:32px;">Advertisers</h1>
	<h4 class="headline" style="margin-left:32px;">Reach the people who matter most.</h4>
	<br/>
	<div class="inner-text" style="margin-right:10px;"><p style="line-height:125%">Yiddn.com places your message in front of the people you most want 
	to reach — Jewish customers and consumers. A basic listing is free in most categories. Or reach farther with graphic ads and multiple listings 
	throughout the site. Whether you do business on the Internet, or are looking for local traffic in your community, Yiddn.com will help direct your 
	best customers to your door.
	<br/>
	<ol style="margin-left:75px;font-size:16px;">
		<li>Free Listing. Include your business info on Yiddn.com. Your listing is placed in the appropriate category or community listing. </li>
		<li>Paid Listing. Your listing is featured on its category page with a graphic banner and bold, pop-up description of your product or service. 
		You will also be able to cross reference your business or organization in up to 2 other categories.</li>
	<li>Premium Listing. In addition to the listings above, your business or organizations enters the rotation for extra large graphic banners on our major landing pages. 
	And your promotions will be included in our email blasts to Yiddn.com members.</li>
	<li>Non-profit Listing. Non-profit and chesed organizations are invited to place a paid listing with us for a small nominal fee. Please contact us for details.</li>
	</ol>
	</p>
	
	<p style="margin-top:-30px;"> <?php if(isset($_SESSION['Yiddn_login_Id'])){?>
      <a href="<?php echo ADDRESS_SITE;?>dashboard" class="dashboard" style="width:205px">
	  <?php }else{?>
	  <a href="<?php echo ADDRESS_SITE;?>member-area" class="dashboard" style="width:205px"><?php }?>
	  Advertiser Enrollment Form</a>
	  </p></div>
	  <!--<p class="member-txt">
		<strong><em>Yiddn.com is more than a directory — it’s a community.</em></strong></p>
<p style="color:#000; line-height:125%;">By joining our site you become one of thousands of Yiddn who want a faster, easier way to find Jewish resources on the web, and to see a safer Internet for our families. Your membership includes:
	<ol style="margin-left:50px; line-height:150%;">
		<li>Complimentary listing of your organization or business (if you have one).</li>
		<li>Access to our BookMark function, enabling you to save and share favorite links on the site.</li>
		<li>Email updates of new listings and features, as well as special promotions in your area. </li>
	</ol>
</p>	
	 --> 
<!--	  
	  Log in or join us today to take advantage of our member benefits:
		<ul>
		  <li>Bookmark your sites, take notes and access them anywhere</li>

		  <li>Add your own FREE listings</li>

	     <li>Advertise effectively to all Jewish markets</li>

		 <li>& many more!</li>
	    </ul>
	  </p>	
-->	  
     
    </div>
  <?php require_once('include/_right_col.php'); ?>
   <div class="clr">&nbsp;</div>
    <br />
	<?php require_once('include/_col_bottom.php'); ?>
  </div>
  <!-- End Main --> 
  
</div>
<div class="clr">&nbsp;</div>
<?php require_once('include/_footer.php'); ?>
