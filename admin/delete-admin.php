<?php

//include constant.php file
include('../config/constants.php');

//get id to delete admin
$id = $_GET['id'];


//2. create sql todelete

$sql = " DELETE FROM tbl_admin WHERE id=$id";
//execute the quary
$res = mysqli_query($conn, $sql);
//chech wheter executed succefully or not
if($res==true){
	//echo "Admin Deleted";
//to dosplay message
	$_SESSION['delete'] = "<div class='success'>admin deleted succefully</div>";
	//redirect tomanage admin
	header('location:'.SITEURL.'admin/manage-admin.php');
}else{
	//echo "fail to delete";
	$_SESSION['delete'] = "<div class='error'>failed to delete admin try again</div>";
	header('location:'.SITEURL.'admin/manage-admin.php');
}

// redirect mangage admin page 



?>
