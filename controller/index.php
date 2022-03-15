
<?php

if(isset($_POST['upvote'])){
    $sql = "SELECT users_id FROM likes WHERE vote = 0 and liked_pic_id='".$_POST['voteid']."'";
    if(!$result = $conn->query($sql)) echo $conn->error;
    if(!$result->num_rows > 0){
        $sql = "SELECT users_id FROM likes WHERE vote = 1";
        if(!$result = $conn->query($sql)) echo $conn->error;
        if($result->num_rows > 0){

            $sql = "DELETE FROM likes WHERE vote = 1 and users_id='".$_SESSION['users_id']."' and liked_pic_id= ".$_POST['voteid']."";
            if(!$result = $conn->query($sql)) echo $conn->error;
            if ($conn->query($sql) === TRUE) {
                
            } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
            $sql = "INSERT INTO likes (users_id,liked_pic_id,vote)
                VALUES ('".$_SESSION['users_id']."','".($_POST['voteid'])."','0')";

            if ($conn->query($sql) === TRUE) {
                header('Location: index.php?page=index');
            } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }

    }else{
        $sql = "DELETE FROM likes WHERE vote = 0 and users_id='".$_SESSION['users_id']."' and liked_pic_id= ".$_POST['voteid']."";
        if(!$result = $conn->query($sql)) echo $conn->error;
            if ($conn->query($sql) === TRUE) {
                header('Location: index.php?page=index');
            } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    }
    
}
if(isset($_POST['downvote'])){
    $sql = "SELECT users_id FROM likes WHERE vote = 1 and liked_pic_id='".$_POST['voteid']."'";
    if(!$result = $conn->query($sql)) echo $conn->error;
    if(!$result->num_rows > 0){
        $sql = "SELECT users_id FROM likes WHERE vote = 0";
        if(!$result = $conn->query($sql)) echo $conn->error;
        if($result->num_rows > 0){
            
            $sql = "DELETE FROM likes WHERE vote = 0 and users_id='".$_SESSION['users_id']."' and liked_pic_id= ".$_POST['voteid']."";
            if(!$result = $conn->query($sql)) echo $conn->error;
            if ($conn->query($sql) === TRUE) {
                
            } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
            $sql = "INSERT INTO likes (users_id,liked_pic_id,vote)
                VALUES ('".$_SESSION['users_id']."','".($_POST['voteid'])."','1')";

            if ($conn->query($sql) === TRUE) {
                header('Location: index.php?page=index');
            } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }

    }
    else{
        $sql = "DELETE FROM likes WHERE vote = 1 and users_id='".$_SESSION['users_id']."' and liked_pic_id= ".$_POST['voteid']."";
        if(!$result = $conn->query($sql)) echo $conn->error;
            if ($conn->query($sql) === TRUE) {
                header('Location: index.php?page=index');
            } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    }
    
}

include 'view/index.php';
?>