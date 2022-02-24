<?php



 
include 'includes/db.inc.php';
$loginError = '';
if(isset($_POST['username']) and isset($_POST['passw'])and isset($_POST['email'])) {
	
	if(strlen($_POST['username']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['passw']) == 0) $loginError .= "Nem írtál be jelszót<br>";
  if(strlen($_POST['email']) == 0) $loginError .= "Nem írtál be emailt<br>";
 
  if($_POST['passw']!=$_POST['passw1'])$loginError .= "Nem egyeznek a jelszavak<br>";
	

	if($loginError == '') {
		
<<<<<<< Updated upstream
  $un = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
  $em = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['email']."'");

  if(mysqli_num_rows($un)) {
      exit('This username already exists');
      header('Location: index.php?page=login');
    }elseif(mysqli_num_rows($em)){
    exit('This email is already registered');
  }else{
  $sql = "INSERT INTO users (username,pw,email,gender,premium,followers,likes)
  VALUES ('".mysqli_real_escape_string($conn,$_POST['username'])."','".md5($_POST['passw'])."','".mysqli_real_escape_string($conn,$_POST['email'])."','".mysqli_real_escape_string($conn,$_POST['gender'])."','0','0','0')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      
      header('Location: index.php?page=login');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
      }
    
=======
    $un = mysqli_query($conn, "SELECT username FROM users WHERE username = '".$_POST['username']."'");
    $em = mysqli_query($conn, "SELECT email FROM users WHERE email = '".$_POST['email']."'");
    if(mysqli_num_rows($un)) {
        exit('This username already exists');
        
    }elseif(mysqli_num_rows($em)){
      exit('This email is already registered');
    }else{
      $sql = "INSERT INTO users (username,pw,email,gender,premium,followers,likes)
      VALUES ('".mysqli_real_escape_string($conn,$_POST['username'])."','".md5($_POST['passw'])."','".mysqli_real_escape_string($conn,$_POST['email'])."','".mysqli_real_escape_string($conn,$_POST['gender'])."','0','0','0')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
      $sql="SELECT users_id FROM users WHERE username='".$_POST['username']."'";
    
      if(!$result = $conn->query($sql)) echo $conn->error;
    
      if ($result->num_rows > 0) {
        
      if($row = $result->fetch_assoc()) {
       
        $tanulo -> set_user($row['users_id'], $conn);
        $_SESSION['prof_id'] = $row['users_id'];
        
      }
      echo "<br>".$_SESSION['users_id']."<br>";
    }
      $sql="SELECT picture_id FROM pictures WHERE picture_name='pictures/default.jpg'";
      if(!$result = $conn->query($sql)) echo $conn->error;
    
        if(!$result->num_rows > 0){
          
          if($row = $result->fetch_assoc()) {

              $p_photo -> set_photo($row['picture_id'], $conn);
              $_SESSION['prof_id'] = $row['picture_id'];
             
          }
        }
      
      $sql = "INSERT INTO profile_pics (users_id,picture_id)
        VALUES ('".$_SESSION['prof_id']."','".$_SESSION['picture_id']."')";
        
          if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('Location: index.php?page=login');
        } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
      }

    
        
>>>>>>> Stashed changes
  }

}
<<<<<<< Updated upstream
=======
  
>>>>>>> Stashed changes
include 'view/registration.php';


?>