<?php

session_start();

require 'includes/db.inc.php';
require 'model/Users.php';
require 'model/ProfileP.php';
require 'model/Pictures.php';
$tanulo = new Users;
$p_photo = new ProfileP;
$pictures = new Pictures;


// default oldal
$page = 'index';

// kilépés végrehajtása


// ki vagy be vagyok lépve?
if(!empty($_SESSION["users_id"])) {
        $szoveg = "Kilépés ";
        $action = "logout";
        $fo="Profil: ".$_SESSION["username"];
}
else {
        $szoveg = "Belépés";
        $action = "login"; 
        $regiszt="Regisztráció";  
            
} 

$category="";
// router
if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}else{
        if(isset($_REQUEST['category'])){
               
                $category=$_REQUEST['category'];
            
            
        }else header("location: index.php?page=index");
        
    }
if(empty($_SESSION["users_id"])){

                $menupontok = array(    'index' => "Főoldal",
                                        $action => $szoveg,
                                        'registration' => $regiszt,
                );
}
else{
                $menupontok = array(    'index' => "Főoldal", 
                                        'profile'=> $fo,
                                        $action => $szoveg,
                                        'upload'=>"Feltöltés"
                        
                        
                );
}

                $title = $menupontok[$page];
include 'includes/htmlheader.inc.php';
?>
<body>
<?php

include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';


?>
</body>
</html>