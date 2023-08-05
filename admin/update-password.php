
<?php include('partials/menu.php') ?>


<!-- main content start-->
      <div class="main-content">
     	<div class="wrapper">
     		<h1>Update password</h1>
     		<br><br>

     		<?php
if(isset($_GET['id'])) {
	$id=$_GET['id'];
}

     		?>


<form action="" method="POST">

<table class="tbl-30">
	<tr>
		<td>current Password:</td>
		<td>
			<input type="password" name="current_password" placeholder="current pass">
		</td>

	</tr>
	<tr>
		<td>
			New password:
		</td>
		<td>
			<input type="password" name="new_password" placeholder="new password">
		</td>
	</tr>
	<tr>
		<td>
			confirm password:
		</td>
		<td>
			<input type="password" name="confirm_password" placeholder="confirm password">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="hidden" name="id" value="<?php echo $id;  ?>">
			<input type="submit" name="submit" value=" Change password" class="btn-secondary">
		</td>
	</tr>
	
</table>

	
</form>


     	</div>
     </div>


<?php

//check where submit is ckiked
if (isset($_POST['submit']))
 {
//echo "clicked";

	//get data frfom form

	$id=$_POST['id'];
	$current_password=md5($_POST['current_password']);
	$new_password=md5($_POST['new_password']);
	$confirm_password=md5($_POST['confirm_password']);

	// check whether user with current id  and current pass
	$sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

	//execute quary 
	$res = mysqli_query($conn, $sql);

if ($res==true) {
	//check data is abailavle or not
	$count=mysqli_num_rows($res);
if ($count==1) {
	

	//user exst and pass can be change
	//echo "user found";

	//check whether new pass is eual to cpass
	if ($new_password==$confirm_password) {
		//update pass

$sql2 = "UPDATE tbl_admin SET 
password='$new_password'
WHERE id=$id
";
//check exectued or not
$res2 = mysqli_query($conn, $sql2);
//check query executed or not
if ($res2==true) {
	//display success message
$_SESSION['change-pass'] = "<div class='success'>pass change succefully.</div>";
		//redirect 
		header('location:'.SITEURL.'admin/manage-admin.php');
	}


	}else{

		//display error

		$_SESSION['change-pass'] = "<div class='error'> fail to change pass.</div>";
		//redirect 
		header('location:'.SITEURL.'admin/manage-admin.php');
	}



	}else
	{
		//redire manage admin with message
		$_SESSION['pass-not-match'] = "<div class='error'>pass did not match.</div>";
		//redirect 
		header('location:'.SITEURL.'admin/manage-admin.php');
	}

}else{

	//set message and redirect

		//user not found
		$_SESSION['user-not-found'] = "<div class='error'>User not found.</div>";
		//redirect 
		header('location:'.SITEURL.'admin/manage-admin.php');
}


}
	










?>



   <?php include('partials/footer.php') ?>