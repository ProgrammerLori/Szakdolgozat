<?php
 include 'databaselogin.php' 
?>




<table>
<form  method="post" action="registration.php">
<?php


?>

                    Userid:<br><input type="text" name="user"as $userid>
                    <br>
					Felhasználó:<br><input type="text" name="user"as $nev>
					<br>
					Jelszó: <br><input type="password" name="pw" as $pass>
					<br>
                    <input type="submit"> 
    <?php
if(isset($_POST['submit'])){  
 $sql = "INSERT INTO users (user_id,username,pw)
VALUES ('$userid','$nev', '$pass')";

    
echo "talán";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>
                        
</form>

<!--<form action="registration.php" method="post">
    Username: <input type="text" name="un"><br>
    Password: <input type="password" name="passw" ><br>
    E-mail: <input type="text" name="email"><br>
    Gender:
    <input type="radio" id="male" name="gender" value="Male">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="Female">
    <label for="female">Female</label><br>
    
  <input type="submit" value="Sign up">
</form>

</table>-->
 
 
