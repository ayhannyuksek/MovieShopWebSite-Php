<?php


include "addCart.php";
#var_dump($_SESSION["cart"]);
$total = 0;
$username = $_SESSION["USERNAME"];
if(isset($_GET["action"])){
    
    if($_GET["action"]=="remove"){
        foreach($_SESSION["cart".$username] as $key => $value){
            if($value["id"]==$_GET["id"]){
                unset($_SESSION["cart".$username]["$key"]);
            }
        }
    }
}



?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="sepet.css" />
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
        
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                       <?php if(empty($_SESSION['cart'.$username])){?>

                       <?php }else{?>
                            <?php foreach($_SESSION['cart'.$username] as $key => $value){ ?>
                                <tr>
                                <td></td>
                                <td><?php echo $value['name'];?></td>
                                <td>In stock</td>
                                <td><input class="form-control" type="text" value="<?php echo $value['quantity'];?>" /></td>
                                <td class="text-right"><?php echo $value['price']*$value["quantity"];?> TL</td>
                                <td class="text-right"><a href="sepet2.php?action=remove&id=<?php echo $value['id'];?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove </a> </td>
                            </tr>
                
                            <?php 
                                $total = $total + $value["price"]*$value["quantity"];} ?>
                  
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><?php echo $total;?> TL</td>
                        </tr>

                        
                        <?php  } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <?php if($total >= 150){?>
                            <td class="text-right">0.00 TL</td>
                            <?php }else{?>
                                <td class="text-right">9.99 TL</td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <?php if(empty($_SESSION["cart"])){?>
                                <td class="text-right"><strong>0.00 TL</strong></td>
                            <?php }else{ ?>

                            <?php if($total >= 150){?>
                                <td class="text-right"><strong><?php echo $total;?> TL</strong></td>
                            <?php }else{?>
                                <td class="text-right"><strong><?php echo $total + 9.99;?> TL</strong></td>
                            <?php } ?>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="../index.php" class="btn btn-lg btn-block btn-light text-uppercase">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="payment.php" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

