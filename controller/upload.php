<?php

if (empty($_SESSION['users_id'])) {
    header('Location: index.php?page=index');
}
$i= 0;
$errors=array();
$target_dir = "pictures/";
$allowed_filetypes=array('image/png','image/jpg','image/jpeg');
if(isset($_POST['submit'])){
    if (isset($_FILES["fileToUpload"])) { 
        foreach($_FILES["fileToUpload"]["name"]as $key=>$name ){
            if($name!=null){
            $target_file = $target_dir .date("Y-m-d")."-".date("h-i-sa"). basename($name);
            str_replace(" ","_",$target_file);
            if (!in_array($_FILES["fileToUpload"]["type"][$key],$allowed_filetypes)) {
                $errors[$key][]="A $name fájl nem jpg vagy png vagy jpeg";
            }
            if(empty($errors[$key])){
                if (@move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key],$target_file)) {
                    
                    $i++;
                    $str=explode("/",$_FILES["fileToUpload"]["type"][$key]);
                    $sql="INSERT INTO pictures (users_id,picture_name,size,formats,cat_id)
                        VALUES ('".$_SESSION['users_id']."','".$target_file."','".$_FILES["fileToUpload"]["size"][$key]."','".$str[1]."','".$_POST['cat']."')";

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                        header('Location: index.php?page=index');
                
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                }
                    $conn->close();
            }else{
                
            }
        }else $errors[$key][]="Nincs fájl kiválasztva";
        }
 
    }
}


    
include "view/upload.php"
?>