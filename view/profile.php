<?php 

 echo'<img src="picture/default_profile_picture.png"><br>';


echo "".$_SESSION["username"]."<br>" ;
echo "".$_SESSION["email"]."<br>" ;
if ($_SESSION["gender"]==0) {
    echo "Nem: Férfi";
}else echo "Nem: Nő";

?>