<?php 

echo'<img id="profilkep" src="'.$_SESSION['picture_name'].'"><br>';?>

<form action="index.php?page=profile" method="POST" enctype="multipart/form-data">
        Profilkép megváltoztatása:
        <input type="file" name="profilepic" id="profilepic" >
        <br>
        <input type="submit">
        
</form>
<?php
echo "Felhasználó: ".$_SESSION["username"]."<br>" ;
echo "E-mail: ".$_SESSION["email"]."<br>";
if ($_SESSION["gender"]==0) {
    echo "Nem: Férfi";
}else echo "Nem: Nő";

echo"<div class='flex-container'>";
if ($pictureIds) {

    foreach($pictureIds as $pictureId) {

        $pictures->set_photo($pictureId,$conn);

        $sql = "SELECT picture_id FROM pictures WHERE users_id = '".$_SESSION['users_id']."'";

        if($result->num_rows > 0){
            
            
                if($pictures->get_category()!="Profilkep"){
                    if ($pictures->get_users_id()==$_SESSION['users_id']) {
                        echo '<div class="keret"><span><img class="kepek" src="'.$pictures->get_picture_name().'"><span>'.$pictures->get_category().'</span></span></div>';
                    }
                    
            
            
        }
        
           
    
}
}
echo"</div>";
}
?>