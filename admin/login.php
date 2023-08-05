<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login food order</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<style>
		.login{
			background: rgba(0,0,0, .5);
			border-radius: 15px;
			height: 350px;
			width: 350px;
		}
		span{
			font-size: 22px;

		}
		input{
			height: 25px;
			width: 80%;
			border-radius: 8px;
			padding: 5px;
			margin-top: 5px;
		}
	</style>
</head>
<body style="background: url('../images/ocean.jpg');">

<div class="login">
	<h1 class="text-center">Log In</h1>
	<br><br>

	<?php 

if (isset($_SESSION['login'])) {
	echo $_SESSION['login'];
	unset($_SESSION['login']);
}



if (isset($_SESSION['no-login-message'])) {
	echo $_SESSION['no-login-message'];
	unset($_SESSION['no-login-message']);
}



	?>
	<br><br>

	<form action="" method="POST"class="text-center">
		<span>Username:</span><br>
		<input type="text" name="username" placeholder="enter name"><br><br>
		<span>Password:</span><br>
		<input type="password" name="password" placeholder="enter password"><br><br>
		<input type="submit" name="submit" value="Log IN" class="btn-primary" style="border: none;margin-bottom: 10px">
		
	</form>


	<p class="text-center">By Kishlay</p>
</div>

</body>
</html>


<?php

//check submit btn click or not
if (isset($_POST['submit'])) {
	//get data from login form
	$username = $_POST['username'];
	$password = md5($_POST['password']);


	//check wheter the user with data exist or not
	$sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
	//extecute the quary
	$res = mysqli_query($conn, $sql);

// to check whether user exist o rnot

	$count = mysqli_num_rows($res);


	if ($count==1) {
		//user availavle and login success
		$_SESSION['login'] = "<div class='success'>Login succesful</div>";
		$_SESSION['user'] = $username;//to checkwhater user is login or not and logut is unset
		//rediret to dashbord
		header('location:'.SITEURL.'admin/');
	}else{

		//not availave

		$_SESSION['login'] = "<div class='error text-center'>Login fail username or pass not match</div>";
		//rediret to dashbord
		header('location:'.SITEURL.'admin/login.php');
	}


}

?>