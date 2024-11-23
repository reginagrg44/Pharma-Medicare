
<?php
 session_start();
include '../html/dbconnect.php';

 $user_id = $_SESSION['user_id'];

$username="NO user";
if (!isset($_SESSION['user_email'])){
    $_SESSION['errorMsg']="You are not logged in";
    header("location:../loginpage/login-register.php");
 }
 else{
//     $username=$_SESSION['email'];
    

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome CSS Responsive Navigation menus  </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.2.1/hamburgers.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/newtry.css">
</head>
<body>
    <header>
       
        

       <input type ="checkbox" name ="" id ="chk1">
        <div class="logo"><img src="../images/logo.jpg" alt="" width="110px"></div>
            <div class="search-box">
                <!-- <form>
                    <input type ="text" name ="search" id ="srch" placeholder="Search">
                    <button type ="submit"><i class="fa fa-search"></i></button>
                </form> -->
            </div>
            <ul>
                <li><a href="../html/main.php">Home</a></li>
                <li><a href="../html/medicine.php">Medicine</a></li>
                <li><a href="../html/orders.php">Order</a></li>
                <li><a href="../contactUs/contact.php">Contact</a></li>
                <li>
                    <!-- <a href="#"><i class="fa fa-heart"></i></a> -->
                    <!-- <a href="#"><i class="fa fa-user" id="user-btn"></i></a> -->
                    <div id="user-btn" class="fas fa-user" ></div>
                    <?php
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart); 
            ?>
                    <a href="../html/cart.php"><i class="fas fa-shopping-cart"></i>
                <span>(<?php echo $cart_rows_number; ?>)</span></a>
                      
                </li>
            </ul>
            <div class="menu">
                <label for="chk1">
                <i class="fa-solid fa-bars" style="color: #fcfcfc;"></i>
                </label>
            </div> 
            <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="../html/logout.php" class="delete-btns">logout</a>
    </header>

    <script src="../js/header.js"></script>