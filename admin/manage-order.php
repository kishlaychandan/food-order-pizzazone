<?php include('partials/menu.php') ?>


<div class="main-content">
     	<div class="wrapper">
     		<h1>Manage Order</h1>

               <br/>
               <br/><br/>

               <?php 
                if  (isset($_SESSION['update']))
                 {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                ?>
                <br><br>

               <table class="tbl-full">
                    <tr>
                         <th>S.n.</th>
                         <th>food</th>
                         <th>price</th><th>Qty.</th>
                         <th>Total</th>
                         <th>Order date</th>
                         <th>Status</th>
                         <th>Customer Name</th><th>Contact</th>
                         <th>Email</th>
                         <th>Address</th>
                         <th>Orderid</th>
                         <th>Action</th>
                         



                    </tr>

                    <?php
                    //get all the order from database
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";//display latest order at frist in admin
                    //execute quary
                    $res = mysqli_query($conn, $sql);
                    //count the rows
                    $count = mysqli_num_rows($res);

                    $sn = 1; //create default varialble
                    if ($count>0)
                     {
                        //order abailable
                        while ($row=mysqli_fetch_assoc($res))
                         {
                            //get all order detail
                            $id = $row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];
                            $odid = $row['odid'];

                            ?>
                             <tr>
                    <td><?php echo $sn++; ?></td>
                     <td><?php echo $food; ?></td>
                     <td><?php echo $price; ?></td>
                     <td><?php echo $qty; ?></td>
                     <td><?php echo $total; ?></td>
                     <td><?php echo $order_date; ?></td>

                     <td>
                        <?php 
if ($status=="ordered") {
    echo "<label>$status</label>";
}
elseif ($status=="on delivery") {
    echo "<label style='color: orange;'>$status</label>";
}
elseif ($status=="delivered") {
    echo "<label style='color: green;'>$status</label>";
}
elseif ($status=="cancelled") {
    echo "<label style='color: red;'>$status</label>";
}


                         ?>
                            


                        </td>

                     <td><?php echo $customer_name; ?></td>
                     <td><?php echo $customer_contact; ?></td>
                     <td><?php echo $customer_email; ?></td>
                     <td><?php echo $customer_address; ?></td>
                     <td><?php echo $odid; ?></td>
                     <td><a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id ?>" class="btn-secondary">upadte admin</a>
                         </td>
                    </tr> 

                            <?php


                        }

                    }
                    else
                    {
                        //order not available
                        echo "<tr><td colspan='12' class='error'>Order not Available</td></tr>";
                    }

                    ?>

                   
                    
               </table>
     	
     </div>



<?php include('partials/footer.php') ?>