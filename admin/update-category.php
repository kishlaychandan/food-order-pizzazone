<?php include('partials/menu.php') ?>



 <div class="main-content">
     	<div class="wrapper">
     		<h1>update category</h1>
     		<br/>
<br/>

<?php

//check whether the id is set or not
if(isset($_GET['id']))
 {
	//get the id and all other detail
	//echo "GEtting the data";
	$id = $_GET['id'];
	//create sql quary to get all other details
	$sql = "SELECT * FROM tbl_category WHERE id=$id";

	//ececute the quray
	$res = mysqli_query($conn, $sql);
	//count the rows to check whete its valid or not
	$count = mysqli_num_rows($res);

	if ($count==1) {
		//get all data
		$row = mysqli_fetch_assoc($res);
		$title = $row['title'];
		$current_image = $row['image_name'];
		$featured = $row['featured'];
		$active = $row['active'];


	}else
	{
		//redirect to manage category with emessage
		$_SESSION['no-category-found'] = "<div class='error'>category not found</div>";
		header('location:'.SITEURL.'admin/manage-category.php');
	}
}
else
{
	//redirect to manage Category
	header('location:'.SITEURL.'admin/manage-category.php');

}


?>


<form action="" method="POST" enctype="multipart/form-data">
<table class="tbl-30">
	<tr>
		<td>
			Title:
		</td>
		<td>
			<input type="text" name="title" value="<?php echo $title ?>">
		</td>
	</tr>
	<tr>
		<td>
			Current image
		</td>
		<td>
			<?php
			if ($current_image != "")
			 {
				//display the image
				?>
				<img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image ?>" width="150px">

				<?php
			}else
			{
				//dispay message
				echo "<div class='error'>Image not added</div>";
			}

			?>
		</td>
	</tr>
	<tr>
		<td> new image:</td>
		<td>
			<input type="file" name="image">
		</td>

	</tr>

	<tr>
		<td>Featured:</td>
		<td>
			<input <?php if ($featured=="Yes") { echo "checked";
			} ?> type="radio" name="featured" value="Yes">Yes
			<input <?php if ($featured=="No") { echo "checked";
			} ?> type="radio" name="featured" value="No">No
		</td>
	</tr>
	<tr>
		<td>Active:</td>
		<td>
			<input <?php if ($active=="Yes") { echo "checked";
			} ?> type="radio" name="active" value="Yes">Yes
			<input <?php if ($active=="No") { echo "checked";
			} ?> type="radio" name="active" value="No">No
		</td>
	</tr>
	<tr>
		<td>
			<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="submit" name="submit" value="Update category" class="btn-secondary">
		</td>
	</tr>

</table>
</form>
<?php

if(isset($_POST['submit'])) 
{
	//echo "Cliked";
//get all vales from our form
	$id = $_POST['id'];
 $title = $_POST['title'];
 $image_name = $_POST['current_image'];
 $featured = $_POST['featured'];
 $active = $_POST['active'];

 // update new image if selected
//check image is selected or not
 if (isset($_FILE['image']['name'])) 
 {
 	//get the imagedetail
 	$image_name = $_FILE['image']['name'];
 	//check wheteher is image is available or not
 	if ($image_name != "")
 	 {
 		//image available
 		// A upload the new image

//auto rename our image
		//get extension of our image
		$ext = end(explode('.',  $image_name));
		//rename image name  eg specialfood.jpg
		$image_name = "Food_Category_".rand(000, 999).'.'.$ext;   //e.g food_category_843


		$source_path =$_FILES['image']['tmp_name'];
		$destination_path = "../images/category/".$image_name;


		//finally upload the image
		$upload = move_uploaded_file($source_path, $destination_path);


		//check wheter image is uploaded or not 
		//and if not uploaded we will stop the process and redirect with error message
if ($upload==false) 
{
	$_SESSION['upload'] = "<div class='error'>Failed to upload </div>";
	//redirect to add category
	header('location:'.SITEURL.'admin/manage-category.php');
	//stop the process
	die();
}

 		// B.remove the current image if available
if ($current_image!="")
 {
	$remove_path = "../images/category/".$current_image;
$remove = unlink($remove_path);

//check whether the image is removed or not
//if failed to remove the display message and stop the process
if ($remove==false)
 {
	//failed to remove image
	$_SESSION['failed-remove'] = "<div class='error'>failed toremove current image</div>";
	header('location:'.SITEURL.'admin/manage-category.php');
	die();//stop process
}

}


 	}
 	else
 	{
 		$image_name = $current_image;
 	}
 }
 else
 {
 	$image_name = $current_image;
 }



 // update the database
 $sql2 = "UPDATE tbl_category SET 
 title = '$title',
 image_name = '$image_name',
 featured = '$featured',
 active = '$active'
 WHERE id=$id
 ";

 //ececuting the query
 $res2 = mysqli_query($conn, $sql2);


 //reddirect to manage cetogory with message
 //check whether executed or not

 if ($res2==true)
  {
 	//category updated
 	$_SESSION['update'] = "<div class='success'> category updated succesfully.</div>";
 	header('location:'.SITEURL.'admin/manage-category.php');
 }
 else
 {
 	//fail to update
 	$_SESSION['update'] = "<div class='error'> category updated fail.</div>";
 	header('location:'.SITEURL.'admin/manage-category.php');
 }


}


?>


</div>
</div>

<?php include('partials/footer.php') ?>