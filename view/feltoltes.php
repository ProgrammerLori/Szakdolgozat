
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
        <br>
        <label for="cat">Kategória:</label>
            <select name="cat" id="cat">
                <option value="tajkep">Tájkép</option>
                <option value="csendelet">Csendélet</option>
                <option value="scifi">Sci-fi</option>
                <option value="fantasy">Fantasy</option>
            </select>
        </label></br>
        <input type="submit" name="Kép feltöltése" id="submit">
        
        </form>
</body>
</html>