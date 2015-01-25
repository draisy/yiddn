 
<header id="header">   
 <div class="shell">
 <nav class="navbar-mini-menu">
        <div class="menu-select">
          <span class="menu-actual">
            <strong>Navigation</strong>
          </span>
          <span class="btn-select">
            
          </span>
        </div>
        <ul class="mini-menu-options">
<li><a href="retailer">Retailers</a></li>  
         <li><a href="torah-and-resources">Torah Resources</a></li>
         <li><a href="entertainment">Entertainment</a></li>
         <li><a href="community">Community</a></li>
         <li><a href="seasonal">Seasonal</a></li>
         <li><a href="special-offers">Special Offers</a></li>
          
        </ul>  
      </nav>
 
 
 
 
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
-->                            <span style="color:000;"><a href="forgot-your-password" style="color:000;">Forgot your password?</a></span>
                        </fieldset>
                      
                    </form>
                </div>
            </div>
  <img src="<?=ADDRESS_SITE?>images/dot.png"> <a href="<?=ADDRESS_SITE?>signup">JOIN</a>
  <?php }else{?>
   <span style="margin-top:15px;"><a href="<?=ADDRESS_SITE?>dashboard">My Account</a> | <a href="<?=ADDRESS_SITE?>logout">Logout  </a> </span>
  <?php }?>
      <a href="https://www.facebook.com/pages/Yiddncom-The-Worlds-Leading-Jewish-Web-Directory/711536155532760" target="_blank" class="facebook" title="Facebook"></a> 	
  <a href="https://twitter.com/Yiddn" target="_blank" class="twitter" title="Twitter"></a>

  <div class="shellsearch">
  <form class="searchform" method="get"   action="<?=ADDRESS_SITE?>search">
<input class="searchfield" type="text" placeholder='What are you looking for?' name="keywords" /> IN
<select id="yiddnsearch" class="flexselect searchfield2" name="president" data-placeholder="All Locations" tabindex="2" placeholder='City'>
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
 
<div id="logo">
<a href="<?=ADDRESS_SITE?>"><img src="<?=ADDRESS_SITE?>images/logo.png" alt=""></a>
</div>
  
   </div>
 
  </header>