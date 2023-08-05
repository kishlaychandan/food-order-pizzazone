<?php include('partials-front/menu.php'); ?>



<div class="container-fluid bg-dark d-print-none">
  <div class="row">
    <img src="images/pizza.jpg" alt="banner" style="height:300px; width: 100%; object-fit: cover; box-shadow: 10px;" />
  </div>
  
</div>
<!-- end page banner-->
<div class="container">
  <h2 class="text-center my-4">Order status</h2>
  <center><form method="post" action="">
    <div class="form-group row">
      
      <label class="offset-sm-3 col-form-label">ORDER_ID::*</label><br><br>
      <div><input class="form-control mx-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="order_id" autocomplete="off" value=""><br><br>
    </div>
    <div>
      <input class="btn btn-primary mx-4" value="View" type="submit" name="submit" onclick="">
      
    </div>
  </div>
</form>
</center>
</div>


<div class="justify-container-center">
<center>
    
    <button class="btn btn-primary" type="button" onclick="javascript:window.print();">Print receipt</button></td>
   </center> 


</div>

<?php

//check submit btn click or not
if (isset($_POST['submit'])) {
  //get data from 
  $order_id = $_POST['order_id'];


  //check wheter the user with data exist or not
  $sql = "SELECT * FROM tbl_order WHERE odid='$order_id'";
  //extecute the quary
  $res = mysqli_query($conn, $sql);

 if ($res->num_rows > 0) {
  $row = $res->fetch_assoc();
  echo '<center><table>';
   echo '<tr>';
    echo '<th>Order Detail</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Order id</td><td>'.$row["odid"].'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Order Status</td><td>'.$row["status"].'</td>';
    echo '</tr>';
   echo '</table></center>';
 }
   else{
    echo "Invalid id";
   }



}

?>

<?php include('partials-front/footer.php'); ?>
