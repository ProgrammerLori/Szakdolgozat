<?php
 include 'includes/db.inc.php' ;


?>



<form action="index.php?page=registration" method="post" >
	
<?php
	
	echo'<div class="middle">';
	echo $registrationError;
	echo "<h2>Regisztráció</h2>"
?>
							Felhasználó:<br><input type="text" pattern="[A-Za-z0-9\_\ ]{1,20}" name="username" required>
							<br>
							Jelszó: <br><input type="password" name="password" id="password" required>
							<br>
							Jelszó ismét: <br><input type="password" name="password1" id="password1" required>
							<br>
							E-mail: <br><input type="email" name="email">
							<br>
							<span id = "message" > </span>
							Neme:<br><input type="radio" name="gender" value="0">Férfi<br><input type="radio" name="gender" value="1">Nő

							<br>
							
						<input type="submit">
</form>
</div>
<script>
    document.getElementById('password1').oninput=document.getElementById('password').oninput=function (){
        if( document.getElementById('password').value != document.getElementById('password1').value ){
            document.getElementById('message').innerHTML="A jelszók nem egyeznek!<br>";
        }else document.getElementById('message').innerHTML="";
	}
		</script>
	