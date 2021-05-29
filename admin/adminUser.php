<?php

include "top.php";

$sql = "select * from admin_users order by email asc";
$result = mysqli_query($con,$sql);

if(isset($_GET["type"])&&$_GET["type"]!=""){
   $type= $_GET["type"];
   if($type == "delete"){
      
      $id = $_GET["id"];
      $delete_sql ="delete from admin_users where id ='$id'";
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
                           <h4 class="box-title">Admins</h4>
                           <h4 class="box-link"><a href="manageAdmin.php">Add Admin</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th >ID</th>
                                       <th >Username</th>
                                       <th>Email</th>
                                       <th>Password</th>
                                       <th>Editting</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   $i=1; 
                                   while($row=mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row["id"] ?></td>
                                       <td><?php echo $row["username"] ?></td>
                                       <td><?php echo $row["email"] ?></td>
                                       <td><?php echo $row["password"] ?></td>
                                       <td>
                                          <?php
                                             echo "<a href='manageAdmin.php?id=".$row["id"]."'>Edit</a>&nbsp;";

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