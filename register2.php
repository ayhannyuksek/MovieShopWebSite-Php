<?php
	require("admin/connection.php");
	require("admin/functions.php");	
	$username="";
	$email="";
	$password="";
	$message="";
	if(isset($_POST["register"])){
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		
		
	   
	 
	 $sql = "select * from user_info where Uemail = '$email'";
	 $result = mysqli_query($con,$sql);
	 $num = mysqli_num_rows($result);

	 if($num > 0){
		phpAlert("Email has already exist."); 
	 }else{
		$sql = "insert into user_info(Uusername,Uemail,Upassword) values('$username','$email','$password')";
		mysqli_query($con,$sql);
		header("location:index.php");
	 die();
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
	<title>User Register</title>
<!------ Include the above in your HEAD tag ---------->

  <div class="login-wrap">
	<div class="login-html ">
		<div class="login-form mb-5 ">
		<h3 class="text-center mb-6 m-0">USER REGISTER</h3>
                <form method="post">
				<div class="group">
					<label for="username" class="label">Username</label>
					<input id="username" type="text" name="username" class="input" data-type="text" placeholder="Enter username" required>
				</div>
                <div class="group">
					<label for="email" class="label">Email Adress</label>
					<input id="email" type="text" name="email" class="input" data-type="text" placeholder="Enter email adress" required >
				</div>
				<div class="group">
					<label for="password" class="label">Password</label>
					<input id="password" type="password" name="password" class="input" data-type="password" placeholder="Enter password"required >
				</div>
                
				<div class="group">
					<input type="submit" name="register" class="btn btn-dark btn-block" value="Sign Up">
					<a class=" btn mt-1 " href="userLogin.php">Do you already have an account?</a>
				</div>
				<div class="hr"></div>
			</div>
			</form>

				<div class="hr"></div>
			
		</div>
	</div>
</div>
