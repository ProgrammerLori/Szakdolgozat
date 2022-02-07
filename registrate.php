<?php 
include 'includes/db.inc.php';


    
$sql = "INSERT INTO users (username,pw,email,gender)
VALUES ('".$_POST['username']."','".md5($_POST['passw'])."','".$_POST['email']."','".$_POST['gender']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    
    header('Location: index.php?page=login');?>
    <script>window.alert("Sikeres regisztráció.");</script><?php 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>





