<?php

require("admin/connection.php");
require("admin/functions.php");

$sql = "select * from categories order by categories asc";
$result = mysqli_query($con,$sql);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stil.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="SHORTCUT ICON" href="./img/turkuazAdress.png">
    
    
    <title>Livadi Movie Shop</title>
</head>
<body>

<!--Navigation bar-->

<nav class="navbar nav-head navbar-custom " >
    <div class="container-md">
        <div>
        <a href="index.php"  class="navbar-brand d-flex">
            <img src="./img/turkuaz logo.png" >
        </a>
        </div>
        <form class="d-flex">
            <input class="form-control me-2 " type="search" placeholder="Film veya kategori arayın.." aria-label="Search">
            <button class="btn custom-btn " type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg>
            </button>
        </form>   
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><ion-icon name="person-outline"></ion-icon>
            
          <?php 
          if(isset($_SESSION["LOGIN"]) && $_SESSION["USERNAME"] != ""){

            echo $_SESSION["USERNAME"];
          }else{
            echo "Giriş";
          }
          ?> 
          </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="admin/login2.php">Admin giriş</a>
                
                
                <?php 
                if(isset($_SESSION["LOGIN"]) && $_SESSION["USERNAME"] != ""){
                  
                  echo "<a class='dropdown-item' href='userLogout.php'>Logout</a>";
                    
                }else{
                  echo "<a class='dropdown-item' href='userLogin.php'>Giriş yap</a>";
                  echo "<a class='dropdown-item' href='register2.php'>Üye ol</a>";
                }
                ?> 
                
              </div>
            <a href="sepet/sepet2.php" class="sepetBtn btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg> Sepetim <span class=" badge cart-count">0</span>   
            </a> 
        </div>
    </div>
</nav>


<!--Colorful band-->
<div class="colorfulband d-flex">
    <div class="band1"></div>
    <div class="band2"></div>
    <div class="band3"></div>
    <div class="band4"></div>
    <div class="band5"></div>
    <div class="band6"></div>

</div>




<!--Card navigation bar-->
<div class="card-header d-flex justify-content-center">
  <ul class="nav nav-tabs card-header-tabs">
    <li class="nav-item">
      <div class="category-bar dropdown">
        <button class="btn dropdown-toggle nav-link custom-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Türüne Göre Filmler</button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
 
        <?php
        while($row=mysqli_fetch_assoc($result)){?>
        
        <a class="dropdown-item" href="index.php?id=<?=$row['id']?>"><?php echo $row["categories"]?></a>
        <hr class="dropdown-divider">
      
        <?php } ?>

      </div>
    </li>
    <li class="nav-item" >
      <a class="nav-link active" data-toggle="tab" href="#tab1">Livadi Top List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab2">Kült Filmler</a>
    </li>
    
  </ul>
</div>




  
