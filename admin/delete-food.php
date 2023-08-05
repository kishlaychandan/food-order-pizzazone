<?php

include('../config/constants.php');

if (isset($_GET['id']) && isset($_GET['image_name']))//either use && or AND
 {
	//process to delete
	//echo "proces";

	//get id an dimage name
	$id = $_GET['id'];
	$image_name = $_GET['image_name'];


	//remove image if availabke
// check whether image is available or not
	if ($image_name != "")
	 {
		//it has image and need to remove from folder
		//get the image path
		$path = "../images/food/".$image_name;
		//remove image fromfolder
		$remove = unlink($path);

		//check whether the image is removed or not 
		if ($remove==false) 
		{
			//fail to remove image
			$_SESSION['upload'] = "<div class='error'>failed to remove image</div>";
			header('location:'.SITEURL.'admin/manage-food.php');
			die();
		}
	}
	//delete food from database

	$sql = "DELETE FROM tbl_food WHERE id=$id";
	//executed the quary
	$res = mysqli_query($conn, $sql);

	//check whwther query executed or ot
	// redirect to manage food with session message
	if ($res==true) 
	{
		//food deleted
		$_SESSION['delete'] = "<div class='success'>food deleted</div>";
			header('location:'.SITEURL.'admin/manage-food.php');
	}
	else
	{
		// fail to delete food
		$_SESSION['delete'] = "<div class='error'>fail to  delete food </div>";
			header('location:'.SITEURL.'admin/manage-food.php');
	}

	
}
else
{
	//redicet to manage food page
	//echo "redirect";
	$_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access </div>";
	header('location:'.SITEURL.'admin/manage-food.php');
}



?>