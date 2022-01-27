

<?php
//Database login -FL
$servername = "localhost";
$username = "Szakdoga";
$password = "/of4acR(b4dw6P5c";
$dbname = "Szakdolgozat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

?>

</html>