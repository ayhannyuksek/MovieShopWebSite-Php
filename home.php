<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require("admin/connection.php");
$sql = "select * from product order by name desc";
$result = mysqli_query($con,$sql);


?>





<!--Page Content-->
<div class="colorfulband d-flex">
    <div class="band1"></div>
    <div class="band2"></div>
    <div class="band3"></div>
    <div class="band4"></div>
    <div class="band5"></div>
</div>

<div class="container home-page">
<div class="row mr-2">
  
  
  <?php
  
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <img class="card-img-top"  src="<?php echo $row["image"]?>" alt="Card image cap">
        <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
        <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
        <a product-id="<?php echo $row["id"];?>" class="add-cart btn btn-dark d-flex justify-content-center mt-5 addToCartBtn"  ><span><ion-icon size="large" name="cart-outline"></ion-icon></span></a>
      </div>
    </div>
  </div>

<?php } ?>


</div> 
</div>