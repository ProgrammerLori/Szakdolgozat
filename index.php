
        
<?php

session_start();
require 'includes/db.inc.php';
// default oldal
$page = 'index';
$_SESSION['search']='';
$category="";
$title='';
$szoveg = "Belépés";
$action = "login"; 
 if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

if(isset($_REQUEST['searched'])){
                $_SESSION['search']=$_REQUEST['searched'];
                $page = "searchedUser"; 
                $title=$_REQUEST['searched'];
                

}elseif(isset($_REQUEST['category'])){
        $category=$_REQUEST['category'];
}
$menupontok = array(    'index' => "Főoldal",
                        $action => $szoveg,
                        'registration' => "Regisztráció"
        ); 
// ki vagy be vagyok lépve?
if(!empty($_SESSION["users_id"])) {
        $szoveg = "Kilépés ";
        $action = "logout";
        $fo="Profil: ".$_SESSION["username"];
        $sql="SELECT users_id FROM admins WHERE users_id='".$_SESSION['users_id']."'";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                        $menupontok = array(    
                                'index' => "Főoldal", 
                                'profile'=> "Profil: ".$_SESSION['username'],
                                'upload'=>"Feltöltés",
                                'admin'=>"Admin",
                                $action => $szoveg
                
        );
                }else{
                        $menupontok = array(    
                        'index' => "Főoldal", 
                        'profile'=> "Profil: ".$_SESSION['username'],
                        'upload'=>"Feltöltés",
                        $action => $szoveg
        
);  
                }
               
        
}

if(array_key_exists($page,$menupontok)){
        $title = $menupontok[$page];
        
}

// router

        
include 'includes/htmlheader.inc.php';

require 'model/Users.php';
require 'model/ProfileP.php';
require 'model/Pictures.php';

$tanulo = new Users;
$p_photo = new ProfileP;
$pictures = new Pictures;
$pictureIds=$pictures->kepList($conn);
?>


<body>
<?php
include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';
?>
</body>
</html>