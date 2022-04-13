<?php
if (isset($_POST['userdel'])) {
   $sql = "SELECT users_id FROM users WHERE users_id = ".$_SESSION['searched_user_id'];
    if(!$result = $conn->query($sql)) echo $conn->error;
    if($result->num_rows > 0){
       $sql="DELETE FROM users WHERE users_id = ".$_SESSION['searched_user_id'];
        if(!$result = $conn->query($sql)) echo $conn->error;
    }
}
if (isset($_POST['del'])) {
    $sql="SELECT picture_name FROM pictures WHERE picture_id=".$_POST['voteid'];
    if(!$result = $conn->query($sql)) echo $conn->error;
    if($result->num_rows > 0){
        if($row = $result->fetch_assoc()) {
            unlink($row['picture_name']);
        }
    }
    $sql="DELETE FROM pictures WHERE picture_id=".$_POST['voteid'];
    if(!$result = $conn->query($sql)) echo $conn->error; 
}

$_SESSION['searched_user_id']="";
$sql = "SELECT users_id FROM users WHERE username = '".$search."'";

if (isset($_POST['userdel'])) {
   $sql = "SELECT users_id FROM users WHERE users_id = ".$_SESSION['searched_user_id'];
    if(!$result = $conn->query($sql)) echo $conn->error;
    if($result->num_rows > 0){
       $sql="DELETE FROM users WHERE users_id = ".$_SESSION['searched_user_id'];
        if(!$result = $conn->query($sql)) echo $conn->error;
    }
}

if (isset($_POST['del'])) {
    $sql="SELECT picture_name FROM pictures WHERE picture_id=".$_POST['selected_picture_id'];
    if(!$result = $conn->query($sql)) echo $conn->error;
    if($result->num_rows > 0){
        if($row = $result->fetch_assoc()) {
            unlink($row['picture_name']);
        }
    }
    $sql="DELETE FROM pictures WHERE picture_id=".$_POST['selected_picture_id'];
    if(!$result = $conn->query($sql)) echo $conn->error;
}

$_SESSION['searched_user_id']="";
$sql = "SELECT users_id FROM users WHERE username = '".$_SESSION['search']."'";
    if(!$result = $conn->query($sql)) echo $conn->error;
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()) {
            $tanulo -> set_user($row['users_id'], $conn);
                $_SESSION['searched_user_id'] = $row['users_id'];
                $_SESSION['searched_username'] = $tanulo->get_username();
                $_SESSION['searched_email'] = $tanulo->get_email();
                $_SESSION['searched_gender'] = $tanulo->get_gender();
               
        }
    }

$sql = "SELECT picture_id FROM profile_pics WHERE users_id = '".$_SESSION['searched_user_id']."'";

if(!$result = $conn->query($sql)) echo $conn->error;
if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
        $p_photo -> set_photo($row['picture_id'], $conn);
        
            $_SESSION['searched_picture_id'] = $row['picture_id'];
            $_SESSION['searched_picture_name'] = $p_photo->get_picture_name();

    }
}

include 'view/searchedUser.php';
    ?>