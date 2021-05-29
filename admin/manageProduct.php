<?php
include "top.php";
$categories_id="";
$name="";
$price="";
$image_url="";

if(isset($_GET["id"]) && $_GET["id"]!=""){
    $id = $_GET["id"];
    $sql = "select * from product where id = '$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $categories_id = $row["categories_id"];
    $name = $row["name"];
    $price = $row["price"];
    $image_url = $row["image"];
 }

 if(isset($_POST["submit"])){
    $categories_id = $_POST["categories"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $image_url = $_POST["image"];

    if(isset($_GET["id"]) && $_GET["id"]!=""){
       $sql = "update product set categories_id='$categories_id',name='$name',price='$price',image='$image_url' where id ='$id'";
       mysqli_query($con,$sql);
    }else{
       $sql = "insert into product(categories_id,name,price,image,status) values('$categories_id','$name','$price','$image_url','1')";
       mysqli_query($con,$sql);
    }
    header("location:product.php");
    die();
   
 }





?>


<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                           <form method="post">
                           <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Categories</label>
                              <select class="form-control" name="categories"> 
                                    <option>Select Category</option>
                                    <?php
                                    $sql = "select id , categories from categories order by categories asc";
                                    $result = mysqli_query($con,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        if($row['id']==$categories_id){
                                            echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                        }else{
                                            echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                        }
                                 }
                
                                ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="name" class=" form-control-label">Name</label>
                              <input type="text" name="name" placeholder="Enter movie name" class="form-control" required value="<?php echo $name?>">
                           </div>
                           <div class="form-group">
                              <label for="price" class=" form-control-label">Price</label>
                              <input type="text" name="price" placeholder="Enter price" class="form-control" required value="<?php echo $price?>">
                           </div>
                           <div class="form-group">
                              <label for="image" class=" form-control-label">Image URL</label>
                              <input type="text" name="image" placeholder="Enter Url" class="form-control" required value="<?php echo $image_url?>">
                           </div>
                           <button id="payment-button" type="submit"  name="submit" class="btn btn-lg btn-info btn-block">
                              <span id="payment-button-amount">Submit</span>
                           </button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>


<?php
include "footerAdmin.php";
?>