<?php 
if ($i>0) echo "$i fájl feltöltve" ;
if ($errors) {
    foreach($errors as $error){
        foreach($error as $errorMsg){
            echo"$errorMsg <br>";
        
        }
    }
}
echo'<img id="profilkep" src="'.$_SESSION['picture_name'].'"><br>';?>

<form action="index.php?page=profile" method="POST" enctype="multipart/form-data">
        Profilkép megváltoztatása:
        <input type="file" name="profilepic" id="profilepic" >
        <br>
        <input type="submit" name="profilepicbutton">
        
</form>
<?php
echo "Felhasználó: ".$_SESSION["username"]."<br>" ;
echo "E-mail: ".$_SESSION["email"]."<br>";
if ($_SESSION["gender"]==0) {
    echo "Nem: Férfi";
}else echo "Nem: Nő";
?>
<form action="index.php?page=profile" method="POST"><input type="submit" value="Feltöltött képek" name="mypics"><input type="submit" value="Kedvenc képeim" name="favpics"> </form>
<?php

if(isset($_POST['favpics'])){
    echo"<div class='flex-container' id='flex-con'>";
            $sql = "SELECT favorited_picture_id FROM favourite WHERE users_id=".$_SESSION['users_id'];
            if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    $pictures->set_photo($row['favorited_picture_id'],$conn);
                    if($pictures->get_category()!="Profilkep"){
                        echo '<div class="keret"><span><img class="kepek" src="'.$pictures->get_picture_name().'"><span>'.$pictures->get_category().'</span></span>';

                       $sql="SELECT users_id FROM favourite WHERE favorited_picture_id=".$pictures->get_picture_id()." and users_id=".$_SESSION['users_id']." ";
                        if(!$rs = $conn->query($sql)) echo $conn->error;
                        if($rs->num_rows > 0){
                            echo'<input type="submit" class="onfav" name="fav"  value>';
                        }else{
                            echo'<input type="submit" class="nofav" name="fav"  value>';
                        }
                        echo "</div>";
                    }
                    
                }
            }else echo "Még nincsenek kedvenc képeid.";
        
    
    echo"</div>";
}else{
echo"<div class='flex-container' id='flex-con'>";


<<<<<<< Updated upstream
echo"<div class='flex-container' id='flex-con'>";
=======
>>>>>>> Stashed changes
if ($pictureIds) {

    foreach($pictureIds as $pictureId) {

        $pictures->set_photo($pictureId,$conn);

        $sql = "SELECT picture_id FROM pictures WHERE users_id = '".$_SESSION['users_id']."'";

        if($result->num_rows > 0){
            
            
                if($pictures->get_category()!="Profilkep"){
                    if ($pictures->get_users_id()==$_SESSION['users_id']) {
                        echo '<div class="p_keret"><span><img class="kepek" src="'.$pictures->get_picture_name().'"><span>'.$pictures->get_category().'</span></span></div>';
                    }
        }
        
           
    
}
}
echo"</div>";
}
}
?>