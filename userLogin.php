<?php

require("admin/connection.php");
require("admin/functions.php");
$message = "";
if(isset($_POST["submit"])){
	$Uemail=get_safe_value($con,$_POST["Uemail"]);
	$Upassword=get_safe_value($con,$_POST["Upassword"]);
	$sql = "select * from user_info where Uemail = '$Uemail' and Upassword='$Upassword'";
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
<!------ Include the above in your HEAD tag ---------->

  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Forgot Password</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form method="post">
				<div class="group">
					<label for="Uusername" class="label">Email</label>
					<input id="user" type="text" name="Uemail" class="input" placeholder="enter email" required>
				</div>
				<div class="group">
					<label for="Upassword" class="label">Password</label>
					<input id="pass" type="password" name="Upassword" class="input" data-type="password" placeholder="enter password" required>
				</div>
				<div class="group">
					<input type="submit" name="submit" class="button" value="Sign In">
				</div>
				</form>
				

				<div class="hr"></div>
			
			
			
			</div>
			<div class="for-pwd-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" type="text" name="email" class="input" placeholder="enter email adress">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Reset Password">
				</div>
				
				<div class="hr"></div>
			</div>
		</div>
	</div>
</div>
