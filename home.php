<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require("admin/connection.php");


?>





<!--Page Content-->
<div class="colorfulband d-flex">
    <div class="band1"></div>
    <div class="band2"></div>
    <div class="band3"></div>
    <div class="band4"></div>
    <div class="band5"></div>
    <div class="band6"></div>

  </div>

<div class="container home-page">
<div class="row mr-2">
<?php
  if(empty($_GET["id"])){
    
  $sql = "select * from product where categories_id = 20 order by name desc";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <form method="post" action="sepet/sepet2.php?id=<?=$row['id']?>">
          <img class="card-img-top" name="image" src="<?php echo $row["image"]?>" alt="Card image cap">
          <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
          <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
          <input type="hidden" name="name" value="<?php echo $row['name']?>">
          <input type="hidden" name="price" value="<?php echo $row['price']?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="addToCart" class="btn btn-dark btn-block my-2" value="Sepete Ekle">
        </form>
      </div>
    </div>
  </div>
  
<?php } ?>
<?php } ?>
  
  <?php
  if($_GET["id"] == 13){
  $_SESSION["categorie_id"] = 13;
  $sql = "select * from product where categories_id = 13 order by name desc";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <form method="post" action="sepet/sepet2.php?id=<?=$row['id']?>">
          <img class="card-img-top" name="image" src="<?php echo $row["image"]?>" alt="Card image cap">
          <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
          <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
          <input type="hidden" name="name" value="<?php echo $row['name']?>">
          <input type="hidden" name="price" value="<?php echo $row['price']?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="addToCart" class="btn btn-dark btn-block my-2" value="Sepete Ekle">
        </form>
      </div>
    </div>
  </div>
  
<?php } ?>
<?php } ?>


<?php
  if($_GET["id"] == 9){
    $_SESSION["categorie_id"] = 9;
  $sql = "select * from product where categories_id = 9 order by name desc";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <form method="post" action="sepet/sepet2.php?id=<?=$row['id']?>">
          <img class="card-img-top" name="image" src="<?php echo $row["image"]?>" alt="Card image cap">
          <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
          <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
          <input type="hidden" name="name" value="<?php echo $row['name']?>">
          <input type="hidden" name="price" value="<?php echo $row['price']?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="addToCart" class="btn btn-dark btn-block my-2" value="Sepete Ekle">
        </form>
      </div>
    </div>
  </div>
  
<?php } ?>
<?php } ?>

<?php
  if($_GET["id"] == 14){
  $_SESSION["categorie_id"] = 14;
  $sql = "select * from product where categories_id = 14 order by name desc";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <form method="post" action="sepet/sepet2.php?id=<?=$row['id']?>">
          <img class="card-img-top" name="image" src="<?php echo $row["image"]?>" alt="Card image cap">
          <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
          <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
          <input type="hidden" name="name" value="<?php echo $row['name']?>">
          <input type="hidden" name="price" value="<?php echo $row['price']?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="addToCart" class="btn btn-dark btn-block my-2" value="Sepete Ekle">
        </form>
      </div>
    </div>
  </div>
  
<?php } ?>
<?php } ?>

<?php
  if($_GET["id"] == 12){
  $_SESSION["categorie_id"] = 12;
  $sql = "select * from product where categories_id = 12 order by name desc";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <form method="post" action="sepet/sepet2.php?id=<?=$row['id']?>">
          <img class="card-img-top" name="image" src="<?php echo $row["image"]?>" alt="Card image cap">
          <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
          <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
          <input type="hidden" name="name" value="<?php echo $row['name']?>">
          <input type="hidden" name="price" value="<?php echo $row['price']?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="addToCart" class="btn btn-dark btn-block my-2" value="Sepete Ekle">
        </form>
      </div>
    </div>
  </div>
  
<?php } ?>
<?php } ?>

<?php
  if($_GET["id"] == 11){
    $_SESSION["categorie_id"] = 11;
  $sql = "select * from product where categories_id = 11 order by name desc";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <form method="post" action="sepet/sepet2.php?id=<?=$row['id']?>">
          <img class="card-img-top" name="image" src="<?php echo $row["image"]?>" alt="Card image cap">
          <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
          <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
          <input type="hidden" name="name" value="<?php echo $row['name']?>">
          <input type="hidden" name="price" value="<?php echo $row['price']?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="addToCart" class="btn btn-dark btn-block my-2" value="Sepete Ekle">
        </form>
      </div>
    </div>
  </div>
  
<?php } ?>
<?php } ?>


<?php
  if($_GET["id"] == 10){
    $_SESSION["categorie_id"] = 10;
  $sql = "select * from product where categories_id = 10 order by name desc";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <form method="post" action="sepet/sepet2.php?id=<?=$row['id']?>">
          <img class="card-img-top" name="image" src="<?php echo $row["image"]?>" alt="Card image cap">
          <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
          <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
          <input type="hidden" name="name" value="<?php echo $row['name']?>">
          <input type="hidden" name="price" value="<?php echo $row['price']?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="addToCart" class="btn btn-dark btn-block my-2" value="Sepete Ekle">
        </form>
      </div>
    </div>
  </div>
  
<?php } ?>
<?php } ?>

<?php
  if($_GET["id"] == 20){
    $_SESSION["categorie_id"] = 20;
  $sql = "select * from product where categories_id = 20 order by name desc";
  $result = mysqli_query($con,$sql);
  while($row=mysqli_fetch_assoc($result)) { ?>
  
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card "style="width: 18rem;">
      <div class="card-body  flex-row">
        <form method="post" action="sepet/sepet2.php?id=<?=$row['id']?>">
          <img class="card-img-top" name="image" src="<?php echo $row["image"]?>" alt="Card image cap">
          <h4 class="card-title d-flex justify-content-center"><?php echo $row["name"]?></h4>
          <h5 class=" text-success d-flex justify-content-center"><?php echo $row["price"]?> ₺</h5>
          <input type="hidden" name="name" value="<?php echo $row['name']?>">
          <input type="hidden" name="price" value="<?php echo $row['price']?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="addToCart" class="btn btn-dark btn-block my-2" value="Sepete Ekle">
        </form>
      </div>
    </div>
  </div>
  
<?php } ?>
<?php } ?>



</div> 
</div>
