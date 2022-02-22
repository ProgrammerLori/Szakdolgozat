<?php 

echo'<img id="picikep" src="'.$_SESSION['picture_name'].'"><br>';?>

<form action="index.php?page=profile" method="POST" enctype="multipart/form-data">
        Profilkép megváltoztatása:
        <input type="file" name="profilepic" id="profilepic" >
        <input type="submit">
</form>
<?php
echo "Felhasználó: ".$_SESSION["username"]."<br>" ;
echo "E-mail: ".$_SESSION["email"]."<br>";
if ($_SESSION["gender"]==0) {
    echo "Nem: Férfi";
}else echo "Nem: Nő";

?>