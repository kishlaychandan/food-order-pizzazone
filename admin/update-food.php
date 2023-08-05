<?php include('partials/menu.php') ?>
<?php
//check whaeteher id is set or not
if (isset($_GET['id']))
{
	//get all detail
	$id = $_GET['id'];
	//sql query to gett all the food
	$sql2 = "SELECT * FROM tbl_food WHERE id=$id";
	//execute the quary
	$res2 = mysqli_query($conn, $sql2);
	//get value based on query executed
	$row2 = mysqli_fetch_assoc($res2);
	//get the individual value of selected food
	$title = $row2['title'];
	$description = $row2['description'];
	$price = $row2['price'];
	$curren_image = $row2['image_name'];
	$current_category = $row2['category_id'];
	$featured = $row2['featured'];
	$active = $row2['active'];
}
else
{
	//redirect to manage food
	header('location:'.SITEURL.'admin/manage-food.php');
}
?>
<!-- main content start-->
<div class="main-content">
	<div class="wrapper">
		<h1>update food</h1>
		<br><br>
		
		<br><br>
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
					<td>Description</td>
					<td>
						<textarea name="description" cols="30" rows="5"><?php echo $description ?></textarea>
					</td>
				</tr>
				<tr>
					<td>Price:</td>
					<td>
						<input type="number" name="price" value="<?php echo $price ?>">
					</td>
				</tr>
				<tr>
					<td>Current image</td>
					<td>
						<?php
						if ($curren_image == "")
						{
							//image not availavle
							echo "<div class='error'>image not available.</div>";
						}
						else
						{
							//image available
						?>
						<img src="<?php echo SITEURL; ?>images/food/<?php echo $curren_image; ?>" width="100px;">
						<?php
						}
						?>
					</td>
				</tr>
				<tr>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>Category</td>
					<td>
						<select name="category">
							<?php
							//query to get active category
							$sql = "SELECT * FROM tbl_category WHERE active='Yes'";
							//executing the quary
							$res = mysqli_query($conn, $sql);
							//countt rows
							$count = mysqli_num_rows($res);
							//check whether category available or ot
							if ($count>0)
							{
								//category available
								while ($row=mysqli_fetch_assoc($res))
								{
									$category_title = $row['title'];
									$category_id = $row['id'];
									
							//echo "<option value='$category_id'>$category_title</option>";?>
							<option <?php if ($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
							<?php
							}
							}
							else
							{
							//category not available
							echo "<option value='0'>Category not availavle</option>";
							
							
							}
							?>
							
						</select>
					</td>
				</tr>
				<tr>
					<td>Featured</td>
					<td>
						<input <?php if ($featured=="Yes") {
							echo "checked";
						} ?> type="radio" name="featured" value="Yes">Yes
						<input <?php if ($featured=="No") {
							echo "checked";
						} ?> type="radio" name="featured" value="No">No
					</td>
				</tr>
				<tr>
					<td>active</td>
					<td>
						<input <?php if ($active=="Yes") {
							echo "checked";
						} ?> type="radio" name="active" value="Yes">Yes
						<input <?php if ($active=="No") {
							echo "checked";
						} ?> type="radio" name="active" value="No">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="curren_image" value="<?php echo $curren_image; ?>">
						<input type="submit" name="submit" value="Update Food" class="btn-secondary">
					</td>
				</tr>
			</table>
			
		</form>
		<?php
		if (isset($_POST['submit']))
		{
			//echo "string";
			//get all the detail from the form
			$id = $_POST['id'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$curren_image = $_POST['curren_image'];
			$category = $_POST['category'];
			$featured = $_POST['featured'];
			$active = $_POST['active'];
			//upload the image id selected
			//check whater upload btn is clicked or not
			if (isset($_FILES['image']['name']))
			{
				//upload btn clicked
				$image_name = $_FILES['image']['name'];//newimage name
				//check whether the file is availavle or not
				if ($image_name!="")
				{
					//Aimage is available
					//Auploading new image
					//rename image
					$ext =end(explode('.', $image_name)); //get the extension
					
					$image_name = "Food-name-".rand(0000,9999).'.'.$ext; //this will rename image
					//to uploade get source and destination path
					$src_path = $_FILES['image']['tmp_name'];//source path
					$dest_path = "../images/food/".$image_name; //destination path
					//upload te image
					$upload = move_uploaded_file($src_path, $dest_path);
					//check whether image is uploaded or not
					if ($upload==false)
					{
						//fail to upload
						$_SESSION['upload'] = "<div class='error'> fail to upload new image</div>";
						header('location:'.SITEURL.'admin/manage-food.php');
						//stop the process
						die();
					}
		// remove the image is uploded current image exist
					//b removing current imageif availavle
					if ($curren_image!="")
					{
						//current image is availavle
						// remove the image
						$remove_path = "../images/food".$curren_image;
						$remove = unlink($remove_path);
						//check whater image is removed or not
						if ($remove==false)
						{
							//failed to remove current iamge
								$_SESSION['remove-failed'] = "<div class='error'>failed to 	remove current image</div>";
							//redirect to manage food
							header('location:'.SITEURL.'admin/manage-food.php');
							//stop the process
							die();
						}
					}
				}else
				{
					//  deafault image when image is not selected
					$image_name = $curren_image;

				}
			}
			else
			{
				$image_name = $curren_image;//defalt image wnhen btn is not clicked
			}
			
			//update the food in db
			$sql3 = "UPDATE tbl_food SET
			title = '$title',
			description = '$description',
			price = '$title',
			image_name = '$image_name',
			category_id = '$category',
			featured = '$featured',
			active = '$active'
		WHERE id=$id ";
		//execute the sql query
		$res3 = mysqli_query($conn, $sql3);
		//check whether the query is executed or not
		if ($res3==true)
		{
			//query executed and food updated
			$_SESSION['update'] = "<div class='success'> Food updated succesfuslly</div>";
			header('location:'.SITEURL.'admin/manage-food.php');
		}
		else
		{
			//fail to upload food
			$_SESSION['update'] = "<div class='error'> fail to update food</div>";
			header('location:'.SITEURL.'admin/manage-food.php');
		}
			
		}
		?>
		
	</div>
</div>
<?php include('partials/footer.php') ?>