<?php

require("admin/connection.php");
require("admin/functions.php");
$message = "";
if(isset($_POST["submit"])){
	$email=get_safe_value($con,$_POST["Uemail"]);
	$password=get_safe_value($con,$_POST["Upassword"]);
	$sql = "select * from user_info where Uemail = '$email' and Upassword='$password'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
	$Uusername = $row["Uusername"];
	


	if($num > 0 ){
		$_SESSION["LOGIN"] = 'yes';
		$_SESSION["USERNAME"] = $Uusername;

		header("location:index.php");
		die();
	}else{
		
	}
}

?>
	<link rel="stylesheet" type="text/css" href="userLogin.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="SHORTCUT ICON" href="./img/turkuazAdress.png">
	<title>User Login</title>
<!------ Include the above in your HEAD tag ---------->

<div class="login-wrap">
	<div class="login-html">
		<div class="login-form">
			<h3 class="text-center mb-6 mt-0">USER LOGIN</h3>
                <form method="post">
				<div class="group">
					<label for="username" class="label mt-5">Email Adress</label>
					<input id="username" type="text" name="Uemail" class="input" data-type="text" placeholder="Enter email" required>
				</div>
               
				<div class="group">
					<label for="password" class="label">Password</label>
					<input id="password" type="password" name="Upassword" class="input" data-type="password" placeholder="Enter password"required >
				</div>
                
				<div class="group">
					<input type="submit" name="submit" class="btn btn-dark btn-block" value="LOGIN">
					<a class=" btn mt-1 " href="register2.php">Don't have an account?</a>
				</div>
				<div class="hr"></div>
				
			</div>
			
			</form>

				<div class="hr"></div>
			
		</div>
	</div>
</div>
