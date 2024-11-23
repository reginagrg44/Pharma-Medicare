<?php
   include '../html/header.php';
    include '../html/dbconnect.php';
    
    $user_id = $_SESSION['user_id'];


if(isset($_POST['submit'])){

   
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $msg = mysqli_real_escape_string($conn, $_POST['message']);
 
    $select_message = mysqli_query($conn, "SELECT * FROM `contactus` WHERE  name = '$name' AND email = '$email' AND message = '$msg'") or die('query failed');
 
    if(mysqli_num_rows($select_message) > 0){
       $message[] = 'message sent already!';
    }else{
       mysqli_query($conn, "INSERT INTO `contactus`(user_id, name, email,  message) VALUES('$user_id', '$name', '$email', '$msg')") or die('query failed');
       $message[] = 'message sent successfully!';
    }
 
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=8, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Document</title>
</head>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<!-- <?php /* include '../html/header.php';*/ ?> -->
<body>
<div class="main-containers">
    <div class="containers">
        <div class="content">
            <div class="left-side">

                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Kathmandu, Nepal</div>
                    <div class="text-two">Gorkha</div>
                </div>

                <div class="Phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+0098 5467 299</div>
                    <div class="text-two">+0097 4122 675</div>
                </div>

                <div class="Email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">Robert123@gmail.com</div>
                    <div class="text-two">Alfie.90@gmail.com</div>
                </div>
            </div>

            <div class="right-side">
                <div class="topic-text">Send a message</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur odio ratione exercitationem voluptas quos similique soluta assumenda! Amet eius nesciunt debitis, sint at, possimu?</p>
            

            <form action="" method="POST">
                <div class="input-box">
                    
                    <input type="text" placeholder="Enter your name" id="name" name="name" required>
                </div>

                <div class="input-box">
                    
                    <input type="text" id="email" name="email"
                    
                    placeholder="Enter your email">
                </div>

                <div class="input-box message-box">
                    
                    <textarea placeholder="Enter your message" id="message" name="message" required></textarea>
                </div>

                <div class="button">
                    <input type="submit" value="Send Now" name="submit">
                </div>
          
                
            </form>
            </div>
        </div>
    </div>
    </div>