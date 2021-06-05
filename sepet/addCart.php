<?php
session_start();
require("../admin/connection.php");

if(isset($_POST["addToCart"])){
    $username = $_SESSION["USERNAME"];
    if(isset($_SESSION["cart".$username])){

        $session_array_id = array_column($_SESSION["cart".$username],"id");
        
        if(!in_array($_GET["id"],$session_array_id)){
            $session_array = array(
                'id' => $_GET["id"],
                'name' => $_POST["name"],
                'price' => $_POST["price"],
                'quantity' => $_POST["quantity"],
                
            );
            $_SESSION['cart'.$username][] = $session_array;
            $ayhan= $_SESSION["categorie_id"];
            header("location:../index.php?id=$ayhan");
           
            
        }else{
            for ($i = 0; $i < sizeof($session_array_id); $i++) {
                
                if($_SESSION["cart".$username][$i]["id"] == $_GET["id"]){
                    
                    $_SESSION["cart".$username][$i]["quantity"] = $_SESSION["cart".$username][$i]["quantity"] +  $_POST["quantity"];
                    $ayhan= $_SESSION["categorie_id"];
                    header("location:../index.php?id=$ayhan");

                    
                }
              }
              
        }
        
        #print_r($_SESSION["cart"][$_GET["id"]]["quantity"]);
        
    }
    else{
        $session_array = array(
            'id' => $_GET["id"],
            'name' => $_POST["name"],
            'price' => $_POST["price"],
            'quantity' => $_POST["quantity"],
            
        );
        $_SESSION['cart'.$username][] =$session_array;
    }
}




?>