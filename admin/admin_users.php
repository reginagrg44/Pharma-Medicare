
<?php

include '../html/dbconnect.php';

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:login.php');
// }

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `user` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>

   
<?php include 'admin_menu.php'; ?>

<section class="users">

   <h1 class="title"> user accounts </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
   
         <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> First Name : <span><?php echo $fetch_users['FirstName']; ?></span> </p>
         <p> Last Name : <span><?php echo $fetch_users['LastName']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['Email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['usertype'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['usertype']; ?></span> </p>
         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>








<!-- custom admin js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>

