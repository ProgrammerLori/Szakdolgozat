
<?php


    $sql = "SELECT picture_id FROM profile_pics WHERE users_id = '".$_SESSION['users_id']."'";

    if(!$result = $conn->query($sql)) echo $conn->error;

    if ($result->num_rows > 0) {
        

        if($row = $result->fetch_assoc()) {
            $p_photo -> set_photo($row['picture_id'], $conn);
            
                $_SESSION['picture_id'] = $row['picture_id'];
                $_SESSION['picture_name'] = $p_photo->get_picture_name();
  
        }
    }

    if (isset($_FILES["profilepic"]) ) {
           
            
            $target_file = "pictures/". basename($_FILES["profilepic"]["name"]);
            $str=explode("/",$_FILES["profilepic"]["type"]);
            @move_uploaded_file($_FILES["profilepic"]["tmp_name"],$target_file);

            
            $sql="INSERT INTO pictures (users_id,picture_name,size,formats,category)
                VALUES ('".$_SESSION['users_id']."','".$target_file."','".$_FILES["profilepic"]["size"]."','".$str[1]."','0')";

                if ($conn->query($sql) === TRUE) {
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            $sql="SELECT picture_id FROM pictures WHERE users_id='".$_SESSION['users_id']."' AND picture_name ='".$target_file."'";
            if(!$result = $conn->query($sql)) echo $conn->error;

            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) {
                    $p_photo -> set_photo($row['picture_id'], $conn);
                        $_SESSION['picture_id'] = $row['picture_id'];
                        $_SESSION['picture_name'] = $p_photo->get_picture_name();
        
                }
            }

    $sql = "SELECT picture_id FROM profile_pics WHERE users_id = '".$_SESSION['users_id']."'";

    if(!$result = $conn->query($sql)) echo $conn->error;
        if(!$result->num_rows > 0){

            $sql = "INSERT INTO profile_pics (users_id,picture_id)
                VALUES ('".$_SESSION['users_id']."','".$_SESSION['picture_id']."')";
            if ($conn->query($sql) === TRUE) {
                header('Location: index.php?page=index');
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }else{
            $sql = "UPDATE profile_pics SET picture_id ='".$_SESSION['picture_id']."' WHERE users_id='".$_SESSION['users_id']."' ";
            if ($conn->query($sql) === TRUE) {
                header('Location: index.php?page=index');
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
include 'view/profile.php';

?>