<?php require_once('inc.files.php'); ?>
<!doctype html>
<html><head>
<meta charset="utf-8">

<title><?=$row_home->Title;?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/main.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
 <link href="css/slider.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">
<link href="css/flexslect.css" rel="stylesheet">
 <link rel="stylesheet" href="css/dropdown.css" />
<script type="text/javascript">
function CreateBookmarkLink(){
    var title = document.title;
    var url = window.location.href;
 
    if(window.sidebar && window.sidebar.addPanel){
         window.sidebar.addPanel(title, url, "");
    }else if(window.opera && window.print) {
         alert("Press Control + D to Make Us Your Home Page");
        return true;
    }else if(window.external){
         try{
            window.external.AddFavorite(url, title);
        }catch(e){
                        alert("Press Control + D to Make Us Your Home Page");
                }            
    }else{
        /* Other */
        alert("Press Control + D to Make Us Your Home Page");
    }
}
</script>
     
 <!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
 </head>
<body> 
 



<!--Header -->  
 <header id="header">  
  
 <div class="shell">
  <select id="mobilemenu" size="1"  name="mobilemenu">
            <option selected>Navigation</option>
    <option value="retailer">Retailers</option>  
         <option value="torah-and-resources">Torah Resources</option>
         <option value="services">Services</option>
         <option value="community">Community</option>
         <option value="entertainment">Entertainment</option>
         <option value="special-offers">Special Offers</a></option>
</select>
<script type="text/javascript">
 var urlmenu = document.getElementById( 'mobilemenu' );
 urlmenu.onchange = function() {
      window.location.replace( this.options[ this.selectedIndex ].value );
 };
</script>
            </select>
 
   
 
  <div id="nav-top">
  	<?php if(!isset($_SESSION['Yiddn_login_Id'])){?>
        <div id="loginContainer">
                    <a href="#" id="loginButton"><span>LOG IN</span></a>
                  <div id="loginBox">                
                    <form id="loginForm" method="post">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" />
                            </fieldset>
                            <input type="submit" id="login" value="Sign in" name="login" />
<!-- 
 <label for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>
-->     
 <span><a href="forgot-your-password">Forgot your password?</a></span>                   
</fieldset>
                       
                    </form>
                </div>
            </div>
            
  <img src="images/dot.png"> <a href="signup">JOIN</a>
  <?php }else{?>
   <span><a href="<?=ADDRESS_SITE?>dashboard">My Account</a> | <a href="logout">Logout</a></span>
  <?php }?>
  <a href="https://www.facebook.com/pages/Yiddncom-The-Worlds-Leading-Jewish-Web-Directory/711536155532760" target="_blank" class="facebook" title="Facebook"></a> 	
  <a href="https://twitter.com/Yiddn" target="_blank" class="twitter" title="Twitter"></a>
  
  
  
 </div>
 
 <div id="logo"><a href="<?=ADDRESS_SITE?>"><img src="images/logo.png" alt=""></a></div>
 <div id="tagline">If it’s Jewish and on the web, it's here</div>
 
 
 <div class="shellsearch">
  <form class="searchform" method="get"   action="search">
<input class="searchfield" type="text" placeholder='What are you looking for?' name="keywords" /> IN

<select id="yiddnsearch"  class="flexselect searchfield2" data-placeholder="All Locations" tabindex="2" name="president"  tabindex="2"  >

            <option value=""></option>

<?php
$City ="SELECT *,`city`.City AS CityTitle
FROM `city`
JOIN `tb_local`
ON `city`.Id=`tb_local`.City
GROUP BY `tb_local`.City
ORDER by CityTitle ASC
";
$result = $db->query($City);
$total  = $result->num_rows;
if($total > 0){
	while ($row = $result->fetch_assoc()) 
		{
		echo '<option value="'.$row[`city`.'CitySeo'].'">'.$row['CityTitle'].'</option>';	
		}
}
?>
</select>
 
  
<input class="searcbutton" type="submit" value="&nbsp;" name="Go" id="Go"/>
</form>
   </div>
   </div>
</header> 



<!--/Header -->
 
 <!--Navigation -->
	<nav>
 <div class="shell">
		<ul class="nav clearfix">
	<li><a href="retailer">Retailers</a>
<div class="container-4">
<?php
				/*-----------Jewish E-Tailers-----------*/
$count=1;
$Categories ="SELECT * FROM `categories` WHERE Status='1' AND `UseFor`='2' AND `Mf`='yes' ORDER BY `Title` ASC LIMIT 9";
$result = $db->query($Categories);
$total  = $result->num_rows;
if($total > 0){
	while ($row = $result->fetch_assoc()) 
		{
		$counter = $count++;	
			if($counter=='1'){
				echo '<div class="col1"><ul>';
			}
				echo '<li><a href="retailer/'.$row['Seo'].'">'.$row['Title'].'</a></li>';	
			if($counter=='5'){
				echo '</ul></div>';	
				$count=1;
			}
		}
}
?>
			<div class="col4">
 				<ul>
					<li><a href="retailer">See All</a></li>
				</ul>
			</div>
</div>
    
    </li>
	<li>
		<a href="torah-and-resources">Torah Resources</a>
<div class="container-4">
<?php
				/*-----------Torah & Resources-----------*/
$count=1;
$Categories ="SELECT * FROM `categories` WHERE Status='1' AND `UseFor`='4' AND `Mf`='yes' ORDER BY `Title` ASC LIMIT 9";
$result = $db->query($Categories);
$total  = $result->num_rows;
if($total > 0){
	while ($row = $result->fetch_assoc()) 
		{
		$counter = $count++;	
			if($counter=='1'){
				echo '<div class="col1"><ul>';
			}
				echo '<li><a href="torah-resources/'.$row['Seo'].'">'.$row['Title'].'</a></li>';	
			if($counter=='5'){
				echo '</ul></div>';	
				$count=1;
			}
		}
}
?>
			<div class="col4">
 				<ul>
					<li><a href="torah-and-resources">See All</a></li>
				</ul>
			</div>
</div>	
	</li>
	
	<li><a href="entertainment">Entertainment</a>
<div class="container-4">
<?php
				/*-----------Entertainment-----------*/
$count=1;
$Categories ="SELECT * FROM `categories` WHERE Status='1' AND `UseFor`='5' AND `Mf`='yes' ORDER BY `Title` ASC LIMIT 9";
$result = $db->query($Categories);
$total  = $result->num_rows;
if($total > 0){
	while ($row = $result->fetch_assoc()) 
		{
		$counter = $count++;	
			if($counter=='1'){
				echo '<div class="col1"><ul>';
			}
				echo '<li><a href="entertainment/'.$row['Seo'].'">'.$row['Title'].'</a></li>';	
			if($counter=='5'){
				echo '</ul></div>';	
				$count=1;
			}
		}
}
?>
			<div class="col4">
 				<ul>
					<li><a href="entertainment">See All</a></li>
				</ul>
			</div>
</div>			
	 
      <li><a href="community">Community</a>
        
        <div class="container-4">
<?php
$count=1;
$city ="SELECT * FROM `city` WHERE Status='1' AND `Mf`='yes' ORDER BY `City` ASC LIMIT 9";
$result = $db->query($city);
$total  = $result->num_rows;
if($total > 0){
	while ($row = $result->fetch_assoc()) 
		{
$province ="SELECT * FROM `province` WHERE Status='1' AND `Id`='".$row['ProvinceId']."'";
$num = $db->query($province);
$rows = $num->fetch_assoc();
		$counter = $count++;	
			if($counter=='1'){
				echo '<div class="col1"><ul>';
			}
				echo '<li><a href="listings-community/'.$row['CitySeo'].'/'.$rows['ProvinceSeo'].'">'.$row['City'].', '.$rows['Province'].'</a></li>';	
			if($counter=='5'){
				echo '</ul></div>';	
				$count=1;
			}
		}
}
?>

			<div class="col4">
 				<ul>
					<li><a href="community">See All</a></li>
				</ul>
			</div>
            
</div>
        </li>     
		
         <li><a href="seasonal">Seasonal</a></li>    
        <li><a href="special-offers">Special Offers</a></li> 
</ul>
        </div>
   
        
      
	</nav>
<!--/Navigation -->

   
        <!--Slider -->
<section class="skdslider">
 <ul id="slider">
<li><img src="images/1.jpg" /></li>
   </ul>
              
		</section>
		<!--/Slider -->
        
        <!-- Browse Content -->
        
         <section class="centershell">
         <div class="shell">
         
         <a href="listings" title="If it’s Jewish, we have it." class="masterTooltip"> 
        <article id="center-col">
        <figure><img src="images/browse.png" class="one"></figure> 
        </article>
 		</a>  
      
        
          <a href="community" title="What’s available in your neck of the woods?" class="masterTooltip"> 
        <article id="center-col">
        <figure><img src="images/search-by-community.png" class="two"></figure> 
        </article>
 		</a>  
        
        
          <a href="advertise" title="Reach the people that matter most." class="masterTooltip"> 
        <article id="center-col">
        <figure><img src="images/list-with-yiddn.png"></figure> 
        </article>
 		</a>  
       
               
 		</div>
        
 
        <div class="shell">
        <p class="browse-text">All the search results you want — and none of the ones you don’t. Search by key word and location… or just browse around for the finest Jewish resources on the web.</p>
        </div>
        
        
          <!-- bookmar area -->
        
          <div class="shell">
          <a href="my-bookmarks" title="A guide to using Yiddn’s powerful bookmark feature." class="masterTooltip"> 
       
        <article id="col-5">
        <figure><img src="images/my-bookmark.png"></figure> 
        </article>
 		</a> 
        
        
          <a href="submit-a-site" title="Find a great site not listed yet? Tell us about it here." class="masterTooltip"> 
        <article id="col-5">
        <figure><img src="images/spread-the-world.png"></figure> 
        </article>
 		</a> 
        
        
                  <a href="javascript:CreateBookmarkLink();" title="Make us your home page on Firefox, Chrome or Safari." class="masterTooltip"> 
         <article id="col-5">
        <figure><img src="images/make-us-home.png"></figure> 
        </article>
 		</a> 
        
        
          <a href="news-letter" title="Add your email for our newsletter and for new listings & offers." class="masterTooltip"> 
        <article id="col-5">
        <figure><img src="images/keep-in-touch.png"></figure> 
        </article>
 		</a> 
        
        
          <a href="#" title="Check out all the Yiddn resources in our listings!" class="masterTooltip"> 
        <article id="col-5">
        <figure><img src="images/in-the-catskills.png"></figure> 
        </article>
 		</a> 
        
          <!-- /bookmar area -->
        
        
        
         <p class="intro">
         Yiddn.com is a comprehensive directory of Jewish merchants, services and organizations that has been carefully collected and filtered. We search the web for retailers and resources that are useful for our Orthodox Jewish audience, and organize them into searchable categories the areas of retailers, Torah resources, services, and entertainment. Our listings span virtually all aspects of Jewish life in dozens of major Jewish communities around the world..
        </div>
        
 </section>
        
        <!-- /Browse Content -->
         
 
        
 
  
<!-- Java Script -->     

<script src="js/jquery.min.js" type="text/javascript"></script>
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
	  
	  $("select.flexselect").flexselect({
  allowMismatch: true,
  inputNameTransform:  function(name) { return "new_" + name; }
});
	  
	  
	  
    </script>  
    
    
 <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
  	<script src="js/modernizr.js"></script>
     <script src="js/jquery.easing.min.js"></script>
 <script src="js/login.js"></script>
 <script src="js/slider.js"></script>
 <script src="js/custom.js"></script>
  <!-- Java Script -->
  
<!-- Footer -->
<?php require_once('inc.footer.php'); ?>
<!-- /Footer -->
<?php require_once('confirmkey.php'); ?>


</body>
</html>