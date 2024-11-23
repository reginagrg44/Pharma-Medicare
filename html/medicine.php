<?php

 include 'header.php';
include 'dbconnect.php';
// session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['add_to_cart'])){

   // $product_name = $_POST['product_name'];
   // $product_price = $_POST['product_price'];
   // $product_image = $_POST['product_image'];
   $product_quantity = 1;
  $medicine_id=$_POST['id'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE medicine_id = '$medicine_id' AND user_id=$user_id");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`( `user_id`, `quantity`, `medicine_id`) VALUES ('$user_id','$product_quantity','$medicine_id')");
      // $insert_product = mysqli_query($conn, "INSERT INTO `cart` (`user_id`, `name`, `price`, `quantity`, `image`, `medicine_id`) VALUES('$user_id','$product_name', '$product_price', '$product_image', '$product_quantity',$medicine_id)");
      $message[] = 'product added to cart succesfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/shop.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>



<div class="container">

<section class="products">

   <h1 class="heading" style="margin-top:100px">OUR MEDICINE</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `medicine`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="../admin/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <input type="hidden" name="id" value="<?php echo $fetch_product['id']; ?>">
            <div class="price">Rs <?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>


</body>
</html>