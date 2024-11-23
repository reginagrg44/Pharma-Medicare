
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="stle.css">
</head>
<body>
<?php include 'menu.php'; ?>

<section class="dashboard">

<div class="box-container">

   

   <div class="box">
     
      <h3>hi echo $number_of_orders; ?></h3>
      <p>order placed</p>
   </div>

   <div class="box">
     
      <h3>hi echo $number_of_products; ?></h3>
      <p>products added</p>
   </div>

   <div class="box">
      
      <h3>hi echo $number_of_users; ?></h3>
      <p>normal users</p>
   </div>

   <div class="box">
     
      <h3>hi echo $number_of_admins; ?></h3>
      <p>admin users</p>
   </div>

   <div class="box">
      
      <h3>hi echo $number_of_account; ?></h3>
      <p>total accounts</p>
   </div>

   <div class="box">
     
      <h3>hi echo $number_of_messages; ?></h3>
      <p>new messages</p>
   </div>

</div>

</section>
</body>
</html>



