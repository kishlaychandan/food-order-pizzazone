<?php include('partials-front/menu.php'); ?>

<?php

//check whater food id is set or not
if (isset($_GET['food_id']))
 {
   //get the food id and detail of the selected food
    $food_id = $_GET['food_id'];
    //get the detail of the selected food
    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
    //execute the quary
    $res = mysqli_query($conn, $sql);
    //count the row
    $count = mysqli_num_rows($res);
    //check whether the data is abailable or not
    if ($count==1)
     {
        //we have data
        //get the data from db
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];

    }
    else
    {
        //food not available 
        //redirect to home page 
        header('location:'.SITEURL);
    }
 }
 else
 {
    //redirect to homepage
    header('location:'.SITEURL);
 }

?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="payment.php" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
<?php
//check whether image is abaialable or not 
if ($image_name=="")
 {
   //image not abailable
    echo "<div class='error'>image not available</div>";

}
else
{
    //image is abailable
    ?>
<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
    <?php
}


?>




                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3> <?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price"><?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Your Name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder=" 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder=" example@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder=" Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php include('partials-front/footer.php'); ?>