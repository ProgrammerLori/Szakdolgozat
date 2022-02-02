<?php
 include 'includes/db.inc.php' 

?>

<table>

<form action="registrate.php" method="post" value="registration">
    <?php
echo "<h2>Regisztráció</h2>"
?>
							Felhasználó:<br><input type="text" name="user">
							<br>
							Jelszó: <br><input type="password" name="passw">
							<br>
							E-mail: <br><input type="text" name="email">
							<br>
						<input type="submit">