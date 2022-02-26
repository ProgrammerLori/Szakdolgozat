<?php
 include 'includes/db.inc.php' ;
echo $loginError;

?>

<table>

<form action="index.php?page=registration" method="post" value="registration">
    <?php
echo "<h2>Regisztráció</h2>"
?>
							Felhasználó:<br><input type="text" name="username">
							<br>
							Jelszó: <br><input type="password" name="passw" id="passw">
							<br>
							Jelszó ismét: <br><input type="password" name="passw1" id="passw1">
							<br>
							E-mail: <br><input type="text" name="email">
							<br>
							<span id = "message" > </span>
							Neme:<br><input type="radio" name="gender" value="0">Férfi<br><input type="radio" name="gender"value="1">Nő

							<br>
							
						<input type="submit">
</form>
<script>
    document.getElementById('passw1').oninput=document.getElementById('passw').oninput=function (){
        if( document.getElementById('passw').value != document.getElementById('passw1').value ){
            document.getElementById('message').innerHTML="A jelszók nem egyeznek!<br>";
        }else document.getElementById('message').innerHTML="";
	}
		</script>
	