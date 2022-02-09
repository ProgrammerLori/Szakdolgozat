
<?php


    $sql = "SELECT picture_id FROM profile_pics WHERE users_id = '".$_SESSION['users_id']."' ";

    if(!$result = $conn->query($sql)) echo $conn->error;

    if ($result->num_rows > 0) {
        
        if($row = $result->fetch_assoc()) {
            $p_photo -> set_photo($row['picture_id'], $conn);
            
                $_SESSION['picture_id'] = $row['picture_id'];
                $_SESSION['picture_name'] = $p_photo->get_picture_name();
                
                
            
             
        }
    }


include 'view/profile.php';

?>