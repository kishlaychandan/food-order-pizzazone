<?php include('partials/menu.php') ?>
<!-- main content start-->
<div class="main-content">
	<div class="wrapper">
		<h1>Add food</h1>
		<br><br>
		<?php
		if (isset($_SESSION['upload']))
		{
			echo $_SESSION['upload'];
			unset($_SESSION['upload']);
		}
		?>
		<br><br>
		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>
						Title:
					</td>
					<td>
						<input type="text" name="title" placeholder="titleof tehe food">
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<textarea name="description" cols="30" rows="5" placeholder="description of food"></textarea>
					</td>
				</tr>
				<tr>
					<td>Price:</td>
					<td>
						<input type="number" name="price">
					</td>
				</tr>
				<tr>
					<td>Select image</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>Category</td>
					<td>
						<select name="category">
							<?php
							//code to display category from database
							//1 create sqlto get all active category from db
							$sql = "SELECT * FROM tbl_category WHERE active='yes'";
							//executing the quary
							$res = mysqli_query($conn , $sql);
							//count rows to check whether we have category or not
							$count = mysqli_num_rows($res);
							//if count is greater then zero  we have categorty else we doth have
							if ($count>0)
							{
								//wehave category
								while ($row=mysqli_fetch_assoc($res))
								{
									//get the deatail of category
									$id =$row['id'];
									$title = $row['title'];
							?>
							<option value="<?php echo $id; ?> "><?php echo $title; ?></option>
							<?php
							}
							}
							else
							{
							//we do not have category
							?>
							<option value="0">No category Found</option>
							<?php
							}
							//display on dropdown
							?>
							
							
						</select>
					</td>
				</tr>
				<tr>
					<td>Featured</td>
					<td>
						<input type="radio" name="featured" value="Yes">Yes
						<input type="radio" name="featured" value="No">No
					</td>
				</tr>
				<tr>
					<td>active</td>
					<td>
						<input type="radio" name="active" value="Yes">Yes
						<input type="radio" name="active" value="No">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Food" class="btn-secondary">
					</td>
				</tr>
			</table>
			
		</form>
		<?php
		//check whether button is clicked or not
		if(isset($_POST['submit']))
		{
			//Add food into db
			//echo "clicked";
			///get the data from form
		$title=$_POST['title'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$category=$_POST['category'];
		//check whether radio btn feature and active are checke or ot
		if (isset($_POST['featured']))
		{
			$featured =$_POST['featured'];
		}
		else
		{
			$featured= "No"; // setting default value
		}
		if (isset($_POST['active']))
		{
			$active =$_POST['active'];
		}
		else
		{
			$active= "No"; // setting default value
		}
			//upload image if selected
		// check whether slellect image is clicked or not upload only if it is selected
		if (isset($_FILES['image']['name']))
		{
			//get the details of the selected image
			$image_name = $_FILES['image']['name'];
			//check whether the image is selected or not upload image oly if it selected
			if ($image_name != "")
			{
				//image is selceted
				//rename the image
				$ext = end(explode('.', $image_name));
				
				// create new name for image
				$image_name = "Food-name-".rand(0000,9999).'.'.$ext;//new image name
				//upload theimage
				//get the src path and destination path
				//source path is the current loaction
				$src = $_FILES['image']['tmp_name'];
				//destination path image to uploaded
				$des = "../images/food/".$image_name;
				//finally upload the food
				$upload = move_uploaded_file($src, $des);
				//check whther image uploded or not
				if ($upload==false)
				{
					//failed to upload image
					//redirect withmessage
					$_SESSION['upload'] = "<div class='error'>Fail to upload image</div>";
					header('location:'.SITEURL.'admin/add-food.php');
					//stop process
					die();
							}
			}
		}
		else
		{
			$image_name = ""; //setting default value  blank
		}
			//insert into db
		//create a sql quary to save or add food
		$sql2 = "INSERT INTO tbl_food SET
		title = '$title',
		description = '$description',
		price = $price,
		image_name = '$image_name',
		category_id = $category,
		featured= '$featured',
		active = '$active'
		";
		//Execute the quary
		$res2 = mysqli_query($conn, $sql2);
		//check whather data insertedor not
		if ($res2==true)
		{
			//data inserted succefully
			$_SESSION['add'] = "<div class='success'>Food added succefully</div>";
			header('location:'.SITEURL.'admin/manage-food.php');
		}
		else
		{
			//fail
			$_SESSION['add'] = "<div class='error'>fail to add food</div>";
			header('location:'.SITEURL.'admin/manage-food.php');
		}
			//redirect with emssageto manage food page
		}
		?>
	</div>
</div>
<?php include('partials/footer.php') ?>