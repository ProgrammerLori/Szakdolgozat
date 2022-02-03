<?php 
echo "Felhasználó: ".$_SESSION["username"]."<br>" ;
echo "E-mail: ".$_SESSION["email"]."<br>";
if ($_SESSION["gender"]==0) {
    echo "Nem: Férfi";
}else echo "Nem: Nő";

?>