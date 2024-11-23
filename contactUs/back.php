 <!-- <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_pharmacy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name=$_POST["name"];
$email=$_POST["email"];
$message=$_POST["message"];


$sql = "INSERT INTO contactus (name,email,message) VALUES ('$name','$email','$message')";

if ($conn->query($sql) === TRUE) {
  // $message[] = 'Message sent sucessfully'; 
  header('location:contact.php');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>






 -->
