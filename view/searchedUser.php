<?php 

if (!empty($_SESSION['searched_user_id'])) {
    echo'<img id="profilkep" src="'.$_SESSION['searched_picture_name'].'"><br>';
    ?>
    <?php
    echo "Felhasználó: ".$_SESSION["searched_username"]."<br>" ;
    echo "E-mail: ".$_SESSION["searched_email"]."<br>";
    if ($_SESSION["searched_gender"]==0) {
        echo "Nem: Férfi";
    }else echo "Nem: Nő";


    echo"<div class='flex-container'>";

        if ($pictureIds) {

            foreach($pictureIds as $pictureId) {
                $pictures->set_photo($pictureId,$conn);
                $sql = "SELECT picture_id FROM pictures WHERE users_id = '".$_SESSION['searched_user_id']."'";
                if($result->num_rows > 0){
                    if($pictures->get_category()!="Profilkep"){
                        if ($pictures->get_users_id()==$_SESSION['searched_user_id']) {
                            echo '<div class="keret"><span><img class="kepek" src="'.$pictures->get_picture_name().'"><span>'.$pictures->get_category().'</span></span></div>';
                        }
                    }  
                }
            }
        echo"</div>";
        }
}else {
    if(empty($search)){
    echo "Kérlek írj be egy felhasználónevet.";
        }else{
        echo $search." nevű felhasználó nem létezik.<br>";
        echo "Erre gondolt:<br><ul id='pilos'> ";
        
   
            $stmt=mysqli_prepare($conn,"SELECT username FROM users WHERE username LIKE ?");
            if(isset($_REQUEST['searched'])){
            

            $stmt->bind_param('s', $nev); 
            $nev = "%".$_REQUEST['searched']."%";
            $stmt->execute();
            
                if($result = $stmt->get_result()){
                
                    if ($result->num_rows > 0 ){
                        
                                    
                                while($row = $result->fetch_assoc()){
                                    echo "\t<a href='index.php?page=searchedUser&searched=".$row['username']."'>".$row['username']."<br>";
                                }
                            }
                        }
                    
                } else echo "Ehhez hasonló név nem szerepel az adatbazisban";
        
            }
}  
    

?>