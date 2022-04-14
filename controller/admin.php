<?php 
if (empty($_SESSION['users_id'])) {
    header('Location: index.php?page=index');
}
$deleteAdminError="";
$deleteCategoryError="";
$addAdminError="";
$addCategoryError="";
if (isset($_POST['adminadd'])) {
if (isset($_POST['addadminname'])) {
    

if($_POST['addadminname']!="defaultvalue"){
    
         $sql="INSERT INTO admins(users_id,layer)
         VALUES('".$_POST['addadminname']."','0')";
         if($conn->query($sql) === TRUE) {
            $addAdminError="<span id='pilos'>Sikeres admin hozzáadás!</span><br>";
            header('Location: index.php?page=admin');
      } else {
        $addAdminError= "Error: " . $sql . "<br>" . $conn->error;
      }
     }
 }
}
if (isset($_POST['deleteadmin'])) {
    if (isset($_POST['deladminname'])) {
        
    
    if($_POST['deladminname']!="defaultvalue"){
        
             $sql="DELETE FROM admins WHERE users_id=".$_POST['deladminname'];
             if($conn->query($sql) === TRUE) {
                $deleteAdminError="<span id='pilos'>Sikeres admin törlés!</span><br>";
                header('Location: index.php?page=admin');
          } else {
            $deleteAdminError="Error: " . $sql . "<br>" . $conn->error;
          }
         }
     }
    }

 if (isset($_POST['addcat']) and isset($_POST['addcatname'])) {
    $sql = "SELECT category FROM cat WHERE category = ".$_POST['addcatname'];
    if(!$result = $conn->query($sql)) echo $conn->error;
    if ($result->num_rows > 0) {
        $addCategoryError="Ilyen kategória már létezik";
    }else{
        $sql="INSERT INTO cat (category)
        VALUES ('".$_POST['addcatname']."')";
        if ($conn->query($sql) === TRUE) {
            $addCategoryError="Sikeres kategória hozzáadás";        
            header('Location: index.php?page=admin');

        }else {
            $addCategoryError="Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if (isset($_POST['delcategory'])) {
if (isset($_POST['delcat'])) {

if($_POST['delcat']!="defaultvalue"){
    
     $sql="SELECT picture_name FROM pictures WHERE cat_id='".$_POST['delcat']."'";
    
    if(!$result = $conn->query($sql)) echo $conn->error;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            unlink($row['picture_name']);
            $sql="DELETE FROM pictures WHERE cat_id='".$_POST['delcat']."'";
            if(!$rs= $conn->query($sql)) echo $conn->error;
        }
    }
    $sql="DELETE FROM cat WHERE cat_id='".$_POST['delcat']."'";
    if($result = $conn->query($sql)) 
    {
        $deleteCategoryError='<span id="pilos">Kategória törölve!</span>';
        header('Location: index.php?page=admin');
    }else{
        $deleteCategoryError=$conn->error;
        
    }
    
}
}
}
include "view/admin.php"
 ?>