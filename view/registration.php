<?php
 include 'includes/db.inc.php' 

?>

<table>

<form action="index.php?page=registration" method="post" value="registration">
    <?php
echo "<h2>Regisztráció</h2>"
?>
							Felhasználó:<br><input type="text" name="username">
							<br>
							Jelszó: <br><input type="password" name="passw">
							<br>
							Jelszó ismét: <br><input type="password" name="passw1">
							<br>
							E-mail: <br><input type="text" name="email">
							<br>
							
							Neme:<br><input type="radio" name="gender" value="0">Férfi<br><input type="radio" name="gender"value="1">Nő
							<br>
							
						<input type="submit">