<table>
			<tr>
				<th colspan="3">
					<?php

					if(!empty($_SESSION["user_id"])) {
						echo "Üdv ".$_SESSION['username']."!";
						?>
						<br>
						
						<form action="belepes.php" method="get">
							<input type="submit" name="logout" value="Kilépés">
						</form>
						<?php
					}
					
						
						else echo "<h2>Belépés</h2>";

						?>
						<form action="index.php?page=login" method="post">
							Felhasználó:<br><input type="text" name="user">
							<br>
							Jelszó: <br><input type="password" name="pw">
							<br>
                           <a href="index.php?page=registration"> <?php echo"Még nincs felhasználód? Regisztrálj!"?></a><br>
						<input type="submit">
						</form>
						<?php						
					
				?>
				</th>
			</tr>
		</table>