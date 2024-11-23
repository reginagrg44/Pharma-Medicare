<?php
   include '../html/dbconnect.php';
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }}
   // session_start();
   // $admin_id =  $_SESSION['admin_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../css/admin.css">

</head>
<body>

<header class="header">

   <div class="flex">

      <a href="admin_dashboard.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_dashboard.php">Dashboard</a>
         <a href="admin_products.php">Medicines</a>
         <a href="admin_orders.php">Orders</a>
         <a href="admin_users.php">Users</a>
         <a href="admin_contactus.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <!-- <p>username : <span>
            <?php // echo $_SESSION['admin_name']; ?>
         </span></p> -->
         <!-- <p>email : <span>
            <?php //echo $_SESSION['admin_email']; ?>
         </span></p> -->
         <a href="../html/logout.php" class="delete-btn">logout</a>
         <div>new <a href="../loginpage/login-register.php">login</a> | <a href="../loginpage/login-register.php">register</a></div>
      </div>

   </div>

</header>
<script src="../js/admin.js"></script>