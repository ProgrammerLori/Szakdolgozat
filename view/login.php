	<?php
		if(empty($_SESSION["users_id"])) {

			if(isset($_POST['username'])) {
				echo $loginError;
			}
				else echo "<h2>Belépés</h2>";
				?>
		<form action="index.php?page=login" method="post">
			Felhasználónév:<br><input type="text" name="username">
			<br>
			Jelszó: <br><input type="password" name="passw">
			
			<br>
			<a href="index.php?page=registration"> <?php echo"Még nincs felhasználód? Regisztrálj!"?></a>
			<br>
			<br>
			<input type="submit">
			
		</form>
		
	<?php						
		}
	?>					
				

        