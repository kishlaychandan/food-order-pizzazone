<?php include('partials/menu.php')
?>


 <div class="main-content">
 	<div class="wrapper">
 		<h1>Add admin</h1>
 		<br/>
 		<br/>

 		<?php 
if(isset($_SESSION['add']))
{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
}
 		?>
 		<form action="" method="POST">
 		
 			<table class="tbl-30">
 				<tr>
 					<td> Full Name:</td>
 					<td><input type="text" name="full_name" placeholder="enter name"></td>
 				</tr>
 				<tr>
 					<td> USer Name:</td>
 					<td><input type="text" name="username" placeholder="user name"></td>
 				</tr>
 				<tr>
 					<td> Password:</td>
 					<td><input type="password" name="password" placeholder="your password"></td>
 				</tr>
 				<tr>
 					<td colspan="2">
 						<input type="submit" name="submit" value=" Add Admin" class="btn-secondary">
 					</td>
 				</tr>

 			</table>

 		</form>
 	</div>
 </div>

<?php include('partials/footer.php')
?>


<?php
  //take value from form and save to database
if(isset($_POST['submit']))
{
	//taking data from form
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
// insert data into database
	$sql = "INSERT INTO tbl_admin SET
	full_name='$full_name',
	username='$username',
	password='$password'
	";

	//execute quary and save data in datbase
	$res = mysqli_query($conn, $sql) or die(mysqli_error());
	//data is inserted or not

if ($res==TRUE) {
	//creating a session to display message 
 $_SESSION['add']= "<div class='success'>Admin Added SUccessfully</div>";
 //redirecting page to manage admin
 header("location:".SITEURL.'admin/manage-admin.php');

}else
{
		//creating a session to display message 
 $_SESSION['add']= "<div class='error'>fail to Add admin</div>";
 //redirecting page to add admin
 header("location:".SITEURL.'admin/add-admin.php');
}


} 

?>
