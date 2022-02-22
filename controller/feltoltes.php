<?php

$i= 0;
$errors=array();
    if (isset($_FILES["fileToUpload"]) ) {
        
        $target_dir = "pictures/";
        $allowed_filetypes=array('image/png','image/jpg','image/jpeg');
        
        foreach($_FILES["fileToUpload"]["name"]as $key=>$name ){
            $target_file = $target_dir . basename($name);
            str_replace(" ","_",$target_file);
            if (!in_array($_FILES["fileToUpload"]["type"][$key],$allowed_filetypes)) {
                $errors[$key][]="A $name a fájl nem jpg vagy png vagy jpeg";
                
            }
            if(!isset($errors[$key])){
                if (@move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key],$target_file)) {
                    $i++;
                }else{$errors[$key][]="Hiba történt a $name file mentésekor";
                    }
            }
            $str=explode("/",$_FILES["fileToUpload"]["type"][$key]);
            $sql="INSERT INTO pictures (users_id,picture_name,size,formats,category)
            VALUES ('".$_SESSION['users_id']."','".$target_file."','".$_FILES["fileToUpload"]["size"][$key]."','".$str[1]."','0')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
        
        
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
        $conn->close();
        header("Location: index.php");




        
    }
    


    
include "view/feltoltes.php"
?>