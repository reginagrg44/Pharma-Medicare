<?php
session_start();
session_unset();   //kati memory leko xa esle release gardinxa
session_destroy();

echo"Session deleted";
header("location:../loginpage/login-register.php");

?>