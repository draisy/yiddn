<div id='sidebar'>
    <ul id="menu">
    <h2>Local Listings Only</h2>
    <!--<li><a href="#" class="active">All Locations</a></li>-->
    <li><a href="community">All Locations</a></li>
    <?php
    $City ="SELECT * FROM `city` WHERE Status='1' ORDER BY `City` ASC";
    $result = $db->query($City);
    $total  = $result->num_rows;
    if($total > 0){
    while ($row = $result->fetch_assoc()) 
    {
    $province ="SELECT * FROM `province` WHERE Status='1' AND `Id`='".$row['ProvinceId']."'";
    $num = $db->query($province);
    $rows = $num->fetch_assoc();
    echo '<li><a href="listings-community/'.$row['CitySeo'].'/'.$rows['ProvinceSeo'].'">'.$row['City'].', '.$rows['Province'].'</a></li>';		
    }
    }
    ?>
    </ul>
</div>