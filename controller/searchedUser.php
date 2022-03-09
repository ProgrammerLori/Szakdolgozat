<?php

$sql = "SELECT users_id FROM users WHERE username = '".$search."'";

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