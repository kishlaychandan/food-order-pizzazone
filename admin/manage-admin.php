
<?php include('partials/menu.php') ?>


<!-- main content start-->
      <div class="main-content">
     	<div class="wrapper">
     		<h1>Manage Admin</h1>
<br/>
<br/>

<?php 
// display message
if(isset($_SESSION['add']))
{
     echo $_SESSION['add'];//display session message 
     unset($_SESSION['add']);//remove message
}


//delete message 
if(isset($_SESSION['delete']))
{
     echo $_SESSION['delete'];
      unset($_SESSION['delete']);
}

//update message 
if(isset($_SESSION['update']))
{
     echo $_SESSION['update'];
      unset($_SESSION['update']);
}

//update pass user not found
if(isset($_SESSION['user-not-found']))
{
     echo $_SESSION['user-not-found'];
      unset($_SESSION['user-not-found']);
}


//pass and cpass not match

if(isset($_SESSION['pass-not-match']))
{
     echo $_SESSION['pass-not-match'];
      unset($_SESSION['pass-not-match']);
}

//cahne pass message

if(isset($_SESSION['change-pass']))
{
     echo $_SESSION['change-pass'];
      unset($_SESSION['change-pass']);
}

?>


<br/>
<br/>

               <!-- button to add admin-->
               <a href="add-admin.php" class="btn-primary"> Add Admin</a>
               <br/>
               <br/><br/>

               <table class="tbl-full">
                    <tr>
                         <th>S.N.</th>
                         <th>Full Name</th>
                         <th>Username</th><th>Action</th>
                    </tr>


<?php 
// to fetch all data
$sql = "SELECT * FROM tbl_admin";
// execute the quary
$res = mysqli_query($conn, $sql);

//check whether iits executed or not
if($res==TRUE)
{
     //count row  to check whether we have data in database

     $count =mysqli_num_rows($res);//function to get all the row in database

$sn=1; //create a veriavleand assigne the value 
     //check the number of rows

     if($count>0)
     {
// we have data in db 
while($rows=mysqli_fetch_assoc($res)){
     //using while loop all the  dat from datbase 
     //and loop will run as long as all data fetch

     //get indiviual data
     $id=$rows['id'];
     $full_name=$rows['full_name'];
     $username=$rows['username'];

     //display the value in our table
     ?>

<tr>
                    <td><?php echo $sn++ ?>.</td>
                     <td><?php echo $full_name; ?></td>
                     <td><?php echo $username; ?></td>
                     <td>
                        <a href="<?php echo  SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a>
                        <a href="<?php echo  SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                         <a href="<?php echo  SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a></td>
                    </tr>
                     


     <?php 
}
     }else
     {
          //we not have data
     }
}

?>


                     
                     
                    
               </table>
     		
     	
     </div>
     <!-- main content start-->
     
     <?php include('partials/footer.php') ?>