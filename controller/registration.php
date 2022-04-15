<?php


$registrationError = '';
if(isset($_POST['username']) and isset($_POST['password'])and isset($_POST['email'])) {
	if(strlen($_POST['username']) == 0) $registrationError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['password']) == 0) $registrationError .= "Nem írtál be jelszót<br>";
  if(strlen($_POST['email']) == 0) $registrationError .= "Nem írtál be emailt<br>";
  if($_POST['password']!=$_POST['password1'])$registrationError .= "Nem egyeznek a jelszavak<br>";
  if(strlen($_POST['username']) >= 20)$registrationError .= "Túl hosszú a név";

	if($registrationError == '') {
    $un = mysqli_query($conn, "SELECT username FROM users WHERE username = '".$_POST['username']."'");
    $em = mysqli_query($conn, "SELECT email FROM users WHERE email = '".$_POST['email']."'");

    if(mysqli_num_rows($un)) {
        exit('Ez a felhasználónév már létezik.');
    }elseif(mysqli_num_rows($em)){
      exit('Ez az email már regisztrálva van.');
    }else{
        $sql = "INSERT INTO users (username,pw,email,gender)
        VALUES ('".htmlspecialchars(mysqli_real_escape_string($conn,$_POST['username']))."','".md5($_POST['password'])."','".htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email']))."','".htmlspecialchars(mysqli_real_escape_string($conn,$_POST['gender']))."')";
        if ($conn->query($sql) === TRUE) {
            echo "Sikeres regisztráció ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql="SELECT users_id FROM users WHERE username='".$_POST['username']."'";
        if(!$result = $conn->query($sql)) echo $conn->error;
        if ($result->num_rows > 0) { 
          if($row = $result->fetch_assoc()) {
              $tanulo -> set_user($row['users_id'], $conn);
              $_SESSION['profuser_id'] = $row['users_id'];
          }
        }
        $sql="SELECT picture_id FROM pictures WHERE picture_name='pictures/default.jpg' AND picture_id=1";
        if(!$result = $conn->query($sql)) echo $conn->error;
        if($result->num_rows > 0){
          if($row = $result->fetch_assoc()) {
              $p_photo -> set_photo($row['picture_id'], $conn);
              $_SESSION['prof_id'] = $row['picture_id'];     
          }
        }
          
        $sql = "INSERT INTO profile_pics (users_id,picture_id)
        VALUES ('".$_SESSION['profuser_id']."','".$_SESSION['prof_id']."')";
        if($conn->query($sql) === TRUE) {
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