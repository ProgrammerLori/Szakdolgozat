<?php 
include 'databaselogin.php' ;   


    echo "Bent vagyunk";
$sql = "INSERT INTO users (username,pw)
VALUES ('".$_POST['user']."','".$_POST['passw']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>