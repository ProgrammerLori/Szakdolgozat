<?php



 
include 'includes/db.inc.php';

if(isset($_POST['username']) and isset($_POST['passw'])and isset($_POST['email'])) {
	$loginError = '';
	if(strlen($_POST['username']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['passw']) == 0) $loginError .= "Nem írtál be jelszót<br>";
  if(strlen($_POST['email']) == 0) $loginError .= "Nem írtál be emailt<br>";
	if($loginError == '') {
		
  $un = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
  $em = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
  if(mysqli_num_rows($un)) {
      exit('This username already exists');
      header('Location: index.php?page=login');
  }elseif(mysqli_num_rows($em)){
    exit('This email is already registered');
  }

else{
$sql = "INSERT INTO users (username,pw,email,gender)
VALUES ('".mysqli_real_escape_string($conn,$_POST['username'])."','".md5($_POST['passw'])."','".mysqli_real_escape_string($conn,$_POST['email'])."','".mysqli_real_escape_string($conn,$_POST['gender'])."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    
    header('Location: index.php?page=login');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
    }
  }
}
include 'view/registration.php';
?>


