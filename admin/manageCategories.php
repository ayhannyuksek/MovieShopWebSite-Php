<?php
include "top.php";
$categories="";

if(isset($_GET["id"]) && $_GET["id"]!=""){
   $id = $_GET["id"];
   $sql = "select * from categories where id = '$id'";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_assoc($result);
   $categories = $row["categories"];

}

if(isset($_POST["submit"])){
   $categories = $_POST["categories"];
   if(isset($_GET["id"]) && $_GET["id"]!=""){
      $sql = "update categories set categories= '$categories' where id ='$id'";
      mysqli_query($con,$sql);
   }else{
      $sql = "insert into categories(categories,status) values('$categories','1')";
      mysqli_query($con,$sql);
   }
   header("location:categories.php");
   die();
  
}


?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                           <form method="post">
                           <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Categories</label>
                              <input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories?>">
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