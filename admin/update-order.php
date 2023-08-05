<?php include('partials/menu.php') ?>



 <div class="main-content">
     	<div class="wrapper">
     		<h1>update order</h1>
     		<br/>
<br/>



<?php
//check whether id s set or not
if (isset($_GET['id']))
 {
	//get the order details
	$id=$_GET['id'];

	//get all other detail baised on id
	//sql query to get the order detail
	$sql = "SELECT * FROM tbl_order WHERE id=$id";
	//Execute quary
	$res = mysqli_query($conn, $sql);
	//count rows
	$count = mysqli_num_rows($res);
	if ($count==1)
	 {
		//detail available
		$row=mysqli_fetch_assoc($res);

		$food = $row['food'];
		$price = $row['price'];
		$qty = $row['qty'];
		$status = $row['status'];
		$customer_name = $row['customer_name'];
		$customer_contact = $row['customer_contact'];
		$customer_email = $row['customer_email'];
		$customer_address = $row['customer_address'];
	}
	else
	{
		//detail not abailale
		//redirect to manage order
		header('location:'.SITEURL.'admin/manage-order.php');
	}
}
else{
	//redirect to manage order
	header('location:'.SITEURL.'admin/manage-order.php');
}

?>

<form action="" method="POST">
	<table class="tbl-30">
<tr>
	
	<td>Food Name</td>
	<td>
		<b><?php echo $food; ?></b>
	</td>
</tr>
<tr>
	<td>
		Price:
	</td>
	<td>
		<b>$<?php echo $price; ?></b>
	</td>
</tr>
<tr>
	<td>Qty</td>
	<td>
		<input type="number" name="qty" value="<?php echo $qty; ?>">
	</td>
</tr>
<tr>
	<td>Status</td>
	<td>
		<select name="status">
			<option <?php if ($status=="ordered") {
				echo "selected";
			} ?> value="ordered">Ordered</option>
			<option <?php if ($status=="on delivery") {
				echo "selected";
			} ?> value="on delivery">on delivery</option>
			<option <?php if ($status=="delivered") {
				echo "selected";
			} ?> value="delivered">delivered</option>
			<option <?php if ($status=="cancelled") {
				echo "selected";
			} ?> value="cancelled">cancelled</option>
			
		</select>
	</td>
</tr>
<tr>
	<td>
		Customer Name
	</td>
	<td>
		<input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
	</td>

</tr>
<tr>
	<td>
		Customer contact
	</td>
	<td>
		<input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
	</td>

</tr>
<tr>
	<td>
		Customer email
	</td>
	<td>
		<input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
	</td>

</tr>
<tr>
	<td>
		Customer Address
	</td>
	<td>
		<textarea name="customer_address"  cols="30" rows="5"><?php echo $customer_address; ?></textarea>
	</td>

</tr>
<tr>
	<td colspan="2">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="price" value="<?php echo $price; ?>">
		<input type="submit" name="submit" value="Update Order" class="btn-secondary">
	</td>
</tr>
		
	</table>
	
</form>


<?php
//check whether update btn is clicked or not 
if (isset($_POST['submit']))
 {
 	//echo "string";
 	//get all value frpm form
 	$id = $_POST['id'];
 	$price = $_POST['price'];
 	$qty = $_POST['qty'];
 	$total = $price * $qty;
 	$status = $_POST['status'];
 	$customer_name = $_POST['customer_name'];
 	$customer_contact = $_POST['customer_contact'];
 	$customer_email = $_POST['id'];
 	$customer_address = $_POST['customer_address'];


 	//update the value
 	$sql2 = "UPDATE tbl_order SET 
 	qty = $qty,
 	total = $total,
 	status = '$status',
 	customer_name = '$customer_name',
 	customer_contact = '$customer_contact',
 	customer_email = '$customer_email',
 	customer_address = '$customer_address'
 	WHERE id=$id
 	
 	";
 	//execute the query
 	$res2 = mysqli_query($conn, $sql2);


 	//check whater updated or not

 	//redirect to manage order with message

 	if ($res2==true)
 	 {
 		//updated
 		$_SESSION['update'] = "<div class='success'>Order updated</div>";
 		header('location:'.SITEURL.'admin/manage-order.php');
 	}
 	else
 	{
 		//fail to update
 		$_SESSION['update'] = "<div class='error'>Order updated fail</div>";
 		header('location:'.SITEURL.'admin/manage-order.php');
 	}
}

?>


</div>
</div>
<?php include('partials/footer.php') ?>
