<?php
//include constants.php for siteurl
include('../config/constants.php');

//destory the session 
session_destroy();//unset $_SESSION['user']


//redirect to loginpage
header('location:'.SITEURL.'admin/login.php');
?>