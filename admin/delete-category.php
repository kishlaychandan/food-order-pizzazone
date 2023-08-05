<?php

include('../config/constants.php');

// echo "wow";

// check whether  the id and image_name is set or not

if (isset($_GET['id']) AND isset($_GET['image_name'])) 
{
	//get the value and delete
	//echo "get value and delete";

$id = $_GET['id'];
$image_name = $_GET['image_name'];

//remove the physical image file if available
if ($image_name != "")
 {
	//image is available so remove it
	$path = "../images/category/".$image_name;
	//remove the image
	$remove = unlink($path);
//if fail to remove image then add and error message and  stop theprocess
	if ($remove==false)
	 {
		//set the sessionmessage
$_SESSION['remove'] = "<div class='error'>fail to remove category image</div>";
		// redirect tomanage category page
header('location:'.SITEURL.'admin/manage-category.php');

		//stop the process
		die();
	}
}

// delete data from db
//sql quary to delete from db
$sql = "DELETE FROM tbl_category WHERE id=$id";
//executing the quary
$res = mysqli_query($conn, $sql);

//check whater the dta is deleted or not
if ($res==true) 
{
	//set success message and redirect
	$_SESSION['delete'] = "<div class='success'>category delted succesfully</div>";
	//redirect to manager category
header('location:'.SITEURL.'admin/manage-category.php');
}
else
{
	//set fail message and redirect
	$_SESSION['delete'] = "<div class='error'>category delted fail</div>";
	//redirect to manager category
header('location:'.SITEURL.'admin/manage-category.php');
}


}
else
{
	//redirect to manage category page
	header('location:'.SITEURL.'admin/manage-category.php');
}

?>

