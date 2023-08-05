<?php
//Authorization access control

// check wheter the user is login or not
if (!isset($_SESSION['user']))// if user seeion is not set
 {
	//user is not loged in

	// redirect to login page message
	$_SESSION['no-login-message'] = "<div class='error text-center'>please login to accesss admin panal.</div>";
	//redirect to login page
	header('location:'.SITEURL.'admin/login.php');


}

?>