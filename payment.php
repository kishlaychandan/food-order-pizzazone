<?php

include('config/constants.php');
?>

<html>

  <head>
    <title> pizza zone </title>
<style type="text/css">
    table{
        width: 50%;
        font-size: 18px;
        margin: auto;
        text-align: center;
    }
</style>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/payment.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  
    <script type="text/javascript">
      

     
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
<table>
    <tr><td colspan="2"><b>Order Detail</b></td></tr>
    <tr>
        <td>
            Food Name 
        </td>
        <td>
            <?php echo $_POST["food"]; ?>
        </td>
    </tr>
     <tr>
        <td>
            Price
        </td>
        <td>
            <?php echo $_POST["price"]; ?>
        </td>
    </tr>
    <tr>
        <td>
            Quantity
        </td>
        <td>
            <?php echo $_POST["qty"]; ?>
        </td>
    </tr>
    <tr>
        <td>
            Name
        </td>
        <td>
            <?php echo $_POST["full-name"]; ?>
        </td>
    </tr>
    <tr>
        <td>
            Phone No
        </td>
        <td>
            <?php echo $_POST["contact"]; ?>
        </td>
    </tr>
    <tr>
        <td>
            Email
        </td>
        <td>
            <?php echo $_POST["email"]; ?>
        </td>
    </tr>
    <tr>
        <td>
            Address
        </td>
        <td>
            <?php echo $_POST["address"]; ?>
        </td>
    </tr>
</table>
<?php
if (isset($_POST['submit']))
 {
    //get all detail from the form
    $food = $_POST['food'];
       $price =  $_POST["price"];
    $qty = $_POST["qty"];
    $total = $qty * $price;
    $order_date = date("Y-m-d h:i:sa");
    $status = "Ordered"; //ordered on delivery date
    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
    $num1 = rand(1000,9999); 
  $num2 = rand(1000,9999); 
  $num3 = rand(1000,9999);
  $orderid = $num1.$num2.$num3;


    //save the order in the database
    //create sql to dsave the data
    $sql2 ="INSERT INTO tbl_order SET 
food = '$food',
price = $price,
qty = $qty,
total = $total,
order_date = '$order_date',
status = '$status',
customer_name = '$customer_name',
customer_contact = '$customer_contact',
customer_email = '$customer_email',
customer_address = '$customer_address',
odid = '$orderid'

    ";

    //echo $sql2; die();

    //execute the quary
    $res2 = mysqli_query($conn, $sql2);

    //check whether query executed succesfully
    if ($res2==true) 
    {
       // query executed and order saved
        $_SESSION['orderid'] = $orderid;
        
        
    }
    else
    {
        //fail to save order
        $_SESSION['order'] = "<div class='error text-center'>fail to  order food</div>";
        
    }

}


?>

 <?php

  

 
   


        ?>
        
<h1 class="text-center">Grand Total: &#8377;<?php echo "$total"; ?>/-</h1>
<h5 class="text-center">including all service charges. (no delivery charges applied)</h5>
<br>
<h1 class="text-center">
  <a href="index.php"><button class="btn btn-warning"><span class="glyphicon "></span> Go back to HOme</button></a>
  <a href="onlinepay.php"><button class="btn btn-success"><span class="glyphicon "></span> Pay Online</button></a>
  <form action="COD.php" method="POST">
  <button class="btn btn-success" name="submit"><span class="glyphicon"></span> Cash On Delivery</button>
</form>
</h1>
        


<br><br><br><br><br><br>
        </body>
</html>