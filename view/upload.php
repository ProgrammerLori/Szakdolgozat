
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



    <form action="index.php?page=upload" method="POST" enctype="multipart/form-data">
        Tallózás:
        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
        <br>
        <label for="cat">Kategória:</label>
            <select name="cat" id="cat">
                <?php 
                $sql="SELECT cat_id,category FROM cat";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        if($row['category']!="Profilkep"){
                            echo"<option value=".$row['cat_id'].">".$row['category']."</option>";
                        }
                    }
                }
                ?>
            </select>
        </label></br>
        <input type="submit" name="submit" id="submit">
        
        </form>
</body>
</html>