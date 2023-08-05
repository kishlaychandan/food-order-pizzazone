<?php include('partials/menu.php')
?>




<div class="main-content">
 	<div class="wrapper">
 		<h1>update admin</h1>
<br>
<br>

<?php 

// get the idof selected admin

$id=$_GET['id'];
// create sql quary to get the detail
$sql="SELECT * FROM tbl_admin WHERE id=$id";
//execute the quary
$res=mysqli_query($conn, $sql);
//check whether the quary is exectude  or not
if ($res==true) {

	//check wheter data is available or not
$count = mysqli_num_rows($res);
// check we have admin data or not


	$row = mysqli_fetch_assoc($res);
	$full_name = $row['full_name'];
	$username = $row['username'];
	
}else
{
	//redicting to manage admin
	header('location:'.SITEURL.'admin/admin-manage.php');
}

?>


<form action="" method="POST">
	
<table class="tbl-30">
	<tr>
		<td>Full Name:</td>
		<td>
			<input type="text" name="full_name" value="<?php echo $full_name; ?>">
		</td>
	</tr>
	<tr>
		<td>Username:</td>
		<td>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="submit" name="submit" value="Update admin" class="btn-secondary">
		</td>
	</tr>
</table>

</form>

 	</div>
 </div>


 <?php 
// check whether the submit buttom is clicked or not


 if(isset($_POST['submit']))
 {
//echo "Button clicked";
//get all values from form to update
 	 $id = $_POST['id'];
 	 $full_name = $_POST['full_name'];
 	 $username = $_POST['username'];
// create a sql query to update admin

 	 $sql = "UPDATE tbl_admin SET 
 	 full_name = '$full_name',
 	 username = '$username'
 	 WHERE id='$id'";

 	 // execute the query
 	 $res = mysqli_query($conn, $sql);


if ($res==TRUE) {
	//creating a session to display message 
 $_SESSION['update']= "<div class='success'>Admin update SUccessfully</div>";
 //redirecting page to manage admin
 header("location:".SITEURL.'admin/manage-admin.php');

}else
{
		//creating a session to display message 
 $_SESSION['update']= "<div class='error'>fail to update admin</div>";
 //redirecting page to add admin
 header("location:".SITEURL.'admin/add-admin.php');
}





 }

 ?>



<?php include('partials/footer.php')
?>
