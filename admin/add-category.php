<?php include('partials/menu.php') ?>
<!-- main content start-->
<div class="main-content">
	<div class="wrapper">
		<h1>Add category</h1>
		<br><br>
		<?php
		if (isset($_SESSION['add']))
		{
			echo $_SESSION['add'];
			unset($_SESSION['add']);
		}
		if (isset($_SESSION['upload']))
		{
			echo $_SESSION['upload'];
			unset($_SESSION['upload']);
		}
		?>
		<br><br>
		<!-- add category form-->
		<form action="" method="POST" enctype="multipart/form-data">
			
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td>
						<input type="text" name="title" placeholder="category title">
					</td>
				</tr>
				<tr>
					<td>
						select image:
					</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>
						Featured:
					</td>
					<td>
						<input type="radio" name="featured" value="Yes"> Yes
						<input type="radio" name="featured" value="No"> No
					</td>
				</tr>
				<tr>
					<td>
						Active:
					</td>
					<td>
						<input type="radio" name="active" value="Yes"> Yes
						<input type="radio" name="active" value="No"> No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add category" class="btn-secondary">
					</td>
				</tr>
				
			</table>
		</form>
		<?php
		//check submit is clicked or not
		if (isset($_POST['submit'])) {
			// echo "cliked";
			//get value from cateogory form
		$title = $_POST['title'];
			//for radio inout we  whether btn is select or not
		if (isset($_POST['featured']))
		{
			// get value from form
			$featured = $_POST['featured'];
		}else{
			//set the defalt value
			$featured = "No";
		}
			if (isset($_POST['active'])) {
				$active =$_POST['active'];
			}else
			{
				$active = "No";
			}
		//check whether image is selected or not and set image name accordingly
			//print_r($_FILES['image']);
			//die();//break the code here
			if (isset($_FILES['image']['name']))
			{
				//upload the image
				//to upload image we need image name,source pathe and destination path
				$image_name = $_FILES['image']['name'];
		//upload the image if image is  selected
				if ($image_name != "")
				{
					
			
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
			header('location:'.SITEURL.'admin/add-category.php');
			//stop the process
			die();
		}
		}
			}
			else
			{
				//dont upload image and set the image name value as a blank
				$image_name="";
			}
		// create sql quary insert into database
			$sql = "INSERT INTO tbl_category SET
			title='$title',
			image_name='$image_name',
			featured='$featured',
			active='$active' ";
			//execute the quary and save in db
			$res= mysqli_query($conn, $sql);
			// check quary executed or not
			if ($res==true)
			{
				$_SESSION['add'] = "<div class='success'> category added succefully.</div>";
				//redirect to manage category page
				header('location:'.SITEURL.'admin/manage-category.php');
			}else
			{
				//fail to add category
				$_SESSION['add'] = "<div class='error'> fail to added category.</div>";
				//redirect to manage category page
				header('location:'.SITEURL.'admin/add-category.php');
			}
		}
		?>
	</div>
</div>
<?php include('partials/footer.php') ?>