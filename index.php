<?php

session_start();

require 'includes/db.inc.php';
require 'model/Users.php';
$tanulo = new Users;



// default oldal
$page = 'index';

// kilépés végrehajtása


// ki vagy be vagyok lépve?
if(!empty($_SESSION["users_id"])) {
        $szoveg = "Kilépés ";
        $action = "kilepes";
        
        $fo=$_SESSION["username"];
}
else {
        $szoveg = "Belépés";
        $action = "login"; 
        $regiszt="Regisztráció";  
            
} 


// router
if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
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