
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
            <select name="cat" id="cat" required>  
                <option disabled selected>Válassz kategóriát!</option>
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
        
        <input type="submit" name="submit" id="submit">
        
        </form>

        <?php
        $sql="SELECT users_id FROM admins WHERE users_id='".$_SESSION['users_id']."'";
        if(!$result = $conn->query($sql)) echo $conn->error;
        if($result->num_rows > 0){
        ?>
        <form action="index.php?page=upload" method="POST"> 
        <input type="text" name="categ">
            <input type="submit" name="catsub" value="Kategória hozzáadása"  id="submit">
        </form>

        <form action="index.php?page=upload" method="POST">
        
            <select name="delcat" id="cat" required>
            <option disabled selected>Válassz kategóriát!</option>
                <?php 
                $sql="SELECT cat_id,category FROM cat";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        
                        if($row['category']!="Profilkep"){
                            
                            echo" <option name='futcat' value=".$row['cat_id']." >".$row['category']."</option>";
                        }
                        
                    }
                }
                ?>
                
            </select>
            <input type="submit" name="delcategory" value="Kategória törlése"id="submit">
        </form>
<?php }?>
</body>
</html>