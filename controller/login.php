
<?php

if(isset($_POST['username']) and isset($_POST['passw'])) {
	$loginError = '';
	if(strlen($_POST['username']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['passw']) == 0) $loginError .= "Nem írtál be jelszót<br>";
	if($loginError == '') {
		$sql = "SELECT users_id FROM users WHERE username = '".mysqli_real_escape_string($conn,$_POST['username'])."' ";

		if(!$result = $conn->query($sql)) echo $conn->error;

		if ($result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
				$tanulo -> set_user($row['users_id'], $conn);
				if(md5($_POST['passw']) == $tanulo->get_pw()) {
					$_SESSION['users_id'] = $row['users_id'];
					$_SESSION['username'] = $tanulo->get_username();
					$_SESSION['email'] = $tanulo->get_email();
					$_SESSION['gender'] = $tanulo->get_gender();
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