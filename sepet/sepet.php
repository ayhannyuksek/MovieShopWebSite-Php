<?php
session_start();

if(isset($_SESSION["shoppingCart"])){
    $shoppingCart = $_SESSION["shoppingCart"];

    $total_count = $shoppingCart["summary"]["total_count"];
    $total_price = $shoppingCart["summary"]["total_price"];
    $shopping_products = $shoppingCart["products"];

}else{
    $total_count = 0;
    $total_price = 0.0;
}



?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../stil.css" />
<link rel="stylesheet" type="text/css" href="sepet.css" />



<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">ALIŞVERİŞ SEPETİM</h1>
        <h3>Sepette toplam <strong><?php echo $total_count;?></strong> ürün</h3>
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
                        
                           <?php foreach($shopping_products as $product){ ?>
                                <tr>
                                    <td><img class="cart-img" src="<?php echo $product['image'];?>" /> </td>
                                    <td><?php echo $product["name"];?></td>
                                    <td>In stock</td>
                                    <td><span><a href="cart_db.php?p=incCount&product_id=<?php echo $product["id"];?>" class="btn btn-xs btn-success">+</a></span><input class="form-control" type="text" value="<?php echo $product['count'];?>" /><span><a href="cart_db.php?p=decCount&product_id=<?php echo $product["id"];?>" class="minus btn btn-xs btn-danger">-</a></span></td>
                                    <td class="text-right"><?php echo $product["price"]*$product['count'];?> TL</td>
                                    <td class="text-right"><button product-id="<?php echo $product["id"];?>" class="btn btn-sm btn-danger removeFromCartBtn"><i class="fa fa-trash"></i> </button> </td>
                                </tr>
                            <?php } ?>
       

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><?php echo $total_price;?> TL</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <?php 
                            if($total_price > 150){?>
                                <td class="text-right">0.0 TL</td>
                            <?php }else{ ?>
                                    
                            <td class="text-right">9.99 TL</td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <?php 
                            if($total_price > 150){?>
                                
                                <td class="text-right"><strong><?php echo $total_price;?> TL</strong></td>

                            <?php }else{ ?>
                                <td class="text-right"><strong><?php echo $total_price + 9.99?> TL</strong></td>
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
                    <a class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include "../footer.php";


?>