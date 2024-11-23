<?php
include 'header.php';
include 'dbconnect.php';
 // Make sure to start the session

if (isset($_POST['order_btn'])) {
    $user_id = $_SESSION['user_id'];

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    $cart_query = mysqli_query($conn, "SELECT c.*, m.name AS product_name, m.price AS product_price
                                       FROM `cart` c
                                       JOIN `medicine` m ON c.medicine_id = m.id
                                       WHERE c.user_id = $user_id");

    $price_total = 0;
    $product_names = [];

    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_names[] = $product_item['product_name'] . ' (' . $product_item['quantity'] . ')';
            $product_price = number_format($product_item['product_price'] * $product_item['quantity']);
            $price_total += $product_price;
        }
    }

    $total_product = !empty($product_names) ? implode(', ', $product_names) : 'No products in the cart';

    $detail_query = mysqli_query($conn, "INSERT INTO `orders` (user_id, name, number, email, address, city, total_product, price_total)
                    VALUES ('$user_id', '$name', '$number', '$email', '$address', '$city', '$total_product', '$price_total')");

    if ($detail_query) {
        echo "
        <div class='order-message-container'>
        <div class='message-container'>
            <h3>Thank you for shopping!</h3>
            <div class='order-detail'>
                <span>" . $total_product . "</span>
                <span class='total'>Total: Rs" . $price_total . "/-</span>
            </div>
            <div class='customer-details'>
                <p>Your name: <span>" . $name . "</span></p>
                <p>Your number: <span>" . $number . "</span></p>
                <p>Your email: <span>" . $email . "</span></p>
                <p>Your address: <span>" . $city . ", " . $address . "</span></p>
                <p>(*Pay when product arrives*)</p>
            </div>
            <a href='medicine.php' class='btn'>Continue shopping</a>
        </div>
        </div>";
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'");
    } else {
        echo "Failed to place the order.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/shop.css">

</head>
<body>



<div class="container">

<section class="checkout-form">

   <h1 class="heading" style="margin-top: 100px;">complete your order</h1>
   
   
   <form name="myForm" action="" method="post"  onsubmit="return validateForm()">

   <div class="display-order">
   <?php
   $select_cart = mysqli_query($conn, "SELECT c.*, m.name AS product_name, m.price AS product_price
                                       FROM `cart` c
                                       JOIN `medicine` m ON c.medicine_id = m.id
                                       WHERE c.user_id = $user_id");
   
   $total = 0;
   $grand_total = 0;
   
   if (mysqli_num_rows($select_cart) > 0) {
      while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
         $price_total = number_format($fetch_cart['product_price'] * $fetch_cart['quantity']);
         $grand_total = $total += $price_total;
         ?>
         <span><?= $fetch_cart['product_name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
         <?php
      }
   } else {
      echo "<div class='display-order'><span>Your cart is empty!</span></div>";
   }
   ?>
   <span class="grand-total"> Grand total: Rs<?= $grand_total; ?>/- </span>
</div>

      <div class="flex">

      <!-- Form fillup -->

      
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" id="name" >
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="text" placeholder="enter your number" name="number" >
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required >
         </div>

         
         <div class="inputBox">
            <span>address </span>
            <input type="text" placeholder="e.g. balaju-manakamanatole" name="address" >
         </div>
         
         <div class="inputBox">
            <span>your city</span>
            <input type="text" placeholder="enter your city" name="city" >
         </div>
         
        
        
      </div>

      <input type="submit" value="order now" name="order_btn" class="btn" style="width:25%"  >
   </form>
   </div>

</section>

</div>



   
</body>

<script>
  
  function validateForm() {
            var name = document.forms["myForm"]["name"].value;
            var number = document.forms["myForm"]["number"].value;
            var email = document.forms["myForm"]["email"].value;
            var address = document.forms["myForm"]["address"].value;
            var city = document.forms["myForm"]["city"].value;

            if (name.trim() == "" || number.trim() == "" || email.trim() == "" || address.trim() == "" || city.trim() == "") {
                alert("All fields must be filled out");
                return false;
            }

            if (!isValidPhoneNumber(number)) {
                alert("Please enter a valid phone number starting with '98' no alphabetic character in number");
                return false;
            }

            if (!isValidName(name)) {
                alert("Name should only contain alphabetic characters");
                return false;
            }

            if (!isValidCity(city)) {
                alert("City should only contain alphabetic characters");
                return false;
            }

            return true; // Form will be submitted if all checks pass.
        }
        function isValidPhoneNumber(number) {
            // Check for a valid phone number starting with '98' and followed by digits
            var numberPattern = /^98\d+$/;
            return numberPattern.test(number);
        }

        function isValidName(name) {
            var namePattern = /^[a-zA-Z]+$/;
            return namePattern.test(name);
        }

        function isValidCity(city) {
            var cityPattern = /^[a-zA-Z\s]*$/;
            return cityPattern.test(city);
        }
    


</script>
</html>
