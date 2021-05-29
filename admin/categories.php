<?php

include "top.php";
$sql = "select * from categories order by categories asc";
$result = mysqli_query($con,$sql);

if(isset($_GET["type"])&&$_GET["type"]!=""){
   $type= $_GET["type"];
   if($type == "status"){
      $operation = $_GET["operation"];
      $id = $_GET["id"];
   
   if($operation == "active"){
      $status = "1";
   }else{
      $status = "0";
   }   
   $update_status ="update categories set status = '$status' where id ='$id'";
   mysqli_query($con,$update_status);

   }
   if($type == "delete"){
      
   $id = $_GET["id"];
   $delete_sql ="delete from categories where id ='$id'";
   mysqli_query($con,$delete_sql);

   }
}


?>

<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                           <h4 class="box-link"><a href="manageCategories.php">Add Categories</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th >ID</th>
                                       <th>Categories</th>
                                       <th>Status</th>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   $i=1; 
                                   while($row=mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row["id"] ?></td>
                                       <td><?php echo $row["categories"] ?></td>
                                       <td>
                                          <?php
                                          if($row["status"]==1){
                                             echo "<a href='?type=status&operation=deactive&id=".$row["id"]."'>Active</a>&nbsp;";
                                          }else{
                                             echo "<a href='?type=status&operation=active&id=".$row["id"]."'>Deactive</a>&nbsp;";
                                          }

                                             echo "<a href='manageCategories.php?id=".$row["id"]."'>Edit</a>&nbsp;";

                                             echo "<a href='?type=delete&id=".$row["id"]."'>Delete</a>&nbsp;";
                                          $i = $i + 1
                                          ?>
                                       </td>
                                    </tr>
                                    
                                    <?php } ?>
                                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>


<?php

include "footerAdmin.php";
?>