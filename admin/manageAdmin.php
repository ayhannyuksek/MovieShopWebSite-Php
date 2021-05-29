<?php
include "top.php";
$username="";
$email="";
$password="";

if(isset($_GET["id"]) && $_GET["id"]!=""){
    $id = $_GET["id"];
    $sql = "select * from admin_users where id = '$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row["username"];
    $email = $row["email"];
    $password = $row["password"];
 }

 if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(isset($_GET["id"]) && $_GET["id"]!=""){
       $sql = "update admin_users set username='$username',email='$email',password='$password' where id ='$id'";
       mysqli_query($con,$sql);
    }else{
       $sql = "insert into admin_users(username,email,password) values('$username','$email','$password')";
       mysqli_query($con,$sql);
    }
    header("location:adminUser.php");
    die();
   
 }





?>


<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Admins</strong><small> Form</small></div>
                           <form method="post">
                           <div class="card-body card-block">
                        
                           <div class="form-group">
                              <label for="username" class="form-control-label">Name</label>
                              <input type="text" name="username" placeholder="Enter username" class="form-control" required value="<?php echo $username?>">
                           </div>
                           <div class="form-group">
                              <label for="email" class=" form-control-label">Email</label>
                              <input type="text" name="email" placeholder="Enter email" class="form-control" required value="<?php echo $email?>">
                           </div>
                           <div class="form-group">
                              <label for="password" class=" form-control-label">Password</label>
                              <input type="password" name="password" placeholder="Enter password" class="form-control" required value="<?php echo $password?>">
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