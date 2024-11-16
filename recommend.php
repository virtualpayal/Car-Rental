<?php
$userRentalHistory = array();

        // Simulated user rental history
if(isset($_SESSION['login'])){
    echo "<script>
    let d = document.getElementById('hiddenr');
    d.style.display = 'block';
    </script>";
    if(isset($_SESSION['user-data'])){
            foreach($_SESSION['user-data'] as $key => $value){
                foreach($value as $key2 => $value2){
                    $userRentalHistory[] = $value2;
                }
        }
    }
}
foreach($userRentalHistory as $key){
// Simulated vehicles data
$sql = "SELECT tblvehicles.VehiclesTitle, tblbrands.BrandName, tblvehicles.PricePerDay, tblvehicles.FuelType, tblvehicles.ModelYear, tblvehicles.id, tblvehicles.SeatingCapacity, tblvehicles.VehiclesOverview, tblvehicles.Vimage1 
FROM tblvehicles 
JOIN tblbrands ON tblvehicles.VehiclesBrand = tblbrands.id 
WHERE tblbrands.BrandName = :eid";
$query = $dbh -> prepare($sql);

$query-> bindParam(':eid', $key, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{  
?>  

<div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a>
<ul>
<li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</li>
<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
</ul>
</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
<span class="price">Nrp<?php echo htmlentities($result->PricePerDay);?> /Day</span> 
</div>
<div class="inventory_info_m">
<p><?php echo substr($result->VehiclesOverview,0,70);?></p>
</div>
</div>
</div>
<?php }}}?>
