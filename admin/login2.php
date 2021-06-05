<?php

require("connection.php");
require("functions.php");
$message = "";
if(isset($_POST["submit"])){
	$username=get_safe_value($con,$_POST["username"]);
	$password=get_safe_value($con,$_POST["password"]);
	$sql = "select * from admin_users where username = '$username' and password='$password'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);

	if($num > 0 ){
		$_SESSION["ADMIN_LOGIN"] = 'yes';
		$_SESSION["ADMIN_USERNAME"] = $username;
		header("location:categories.php");
		header("location:categories.php");
		die();
	}else{
		
	}
}

?>

	<link rel="stylesheet" type="text/css" href="login.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="SHORTCUT ICON" href="./img/turkuazAdress.png">
	<title>Admin login</title>
<!------ Include the above in your HEAD tag ---------->

<div class="login-wrap">
	<div class="login-html">
		<div class="login-form">
			<h3 class="text-center mb-6 mt-0">ADMIN LOGIN</h3>
                <form method="post">
				<div class="group">
					<label for="username" class="label mt-5">Admin Username</label>
					<input id="username" type="text" name="username" class="input" data-type="text" placeholder="Enter username" required>
				</div>
               
				<div class="group">
					<label for="password" class="label">Admin Password</label>
					<input id="password" type="password" name="password" class="input" data-type="password" placeholder="Enter password"required >
				</div>
                
				<div class="group">
					<input type="submit" name="submit" class="btn btn-dark btn-block" value="LOGIN">
				</div>
				<div class="hr"></div>
			</div>
			</form>

				<div class="hr"></div>
			
		</div>
	</div>
</div>
