
<!DOCTYPE html>

<html>

<body>
<?php
if ($i>0) echo "$i fájl feltöltve" ;
if ($errors) {
    foreach($errors as $error){
        foreach($error as $errorMsg){
            echo"$errorMsg <br>";
        
        }
    }
}
?>


    <form action="index.php?page=feltoltes" method="POST" enctype="multipart/form-data">
        Tallózás:
        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
        
        <input type="submit" name="Kép feltöltése" id="submit">

        </form>
</body>
</html>