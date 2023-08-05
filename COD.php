<?php

include('config/constants.php');

?>

<html>

  <head>
    <title> Pizza Zone </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/COD.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>

  
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  
    



        <div class="container">
          <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon"></span> Order Placed Successfully.</h1>
          </div>
        </div>
        <br>

<h2 class="text-center"> Thank you for Ordering at Pizza Zone! The ordering process is now complete.</h2>
<?php

$oid = $_SESSION['orderid'];

?>
<h3 class="text-center"> <strong>Your Order Number:</strong> <span style="color: blue;"><?php echo $oid  ?></span> </h3>

        </body>

</html>