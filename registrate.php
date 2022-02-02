<?php 
include 'includes/db.inc.php';


    
$sql = "INSERT INTO users (username,pw,email)
VALUES ('".$_POST['user']."','".md5($_POST['passw'])."','".$_POST['email']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    ?><script>window.alert("Sikeres regisztráció.");</script><?php
    header('Location: index.php?page=login');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>





