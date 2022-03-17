<?php

session_start();

require 'includes/db.inc.php';
require 'model/Users.php';
require 'model/ProfileP.php';
require 'model/Pictures.php';
$tanulo = new Users;
$p_photo = new ProfileP;
$pictures = new Pictures;
$pictureIds=$pictures->kepList($conn);


// default oldal
$page = 'index';
$search="";
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
$title='';
// router
if(isset($_REQUEST['searched'])){
        
        $search=$_REQUEST['searched'];
        $page = "searchedUser"; 
}
elseif(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}elseif(isset($_REQUEST['category'])){

                $category=$_REQUEST['category'];

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
if(isset($menupontok[$page]))
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