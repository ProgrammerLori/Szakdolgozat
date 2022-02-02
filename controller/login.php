
<?php

if(isset($_POST['username']) and isset($_POST['pw'])) {
	$loginError = '';
	if(strlen($_POST['user']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['pw']) == 0) $loginError .= "Nem írtál be jelszót<br>";
	if($loginError == '') {
		$sql = "SELECT users_id FROM users WHERE username = '".$_POST['user']."' ";

		if(!$result = $conn->query($sql)) echo $conn->error;

		if ($result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
				$tanulo -> set_user($row['user_id'], $conn);
				if(md5($_POST['passw']) == $tanulo->get_jelszo()) {
					$_SESSION["user_id"] = $row['user_id'];
					$_SESSION["username"] = $tanulo->get_nev();
                    header('Location: index.php');
                    exit();
				}
				else $loginError .= 'Érvénytelen jelszó<br>';
			}
		}
		else $loginError .= 'Érvénytelen felhasználónév<br>';
	}
}


include 'view/login.php';



?>