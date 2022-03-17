
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
<div class="kozep">
    <?php 
        if ($pictureIds) {
            $sql="SELECT cat_id,category FROM cat";
            if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                $i=2;
                while($row = $result->fetch_assoc()) {
                    if($row['category']!="Profilkep"){

                        echo"<a href='index.php?category=".$i."'>".$row['category']."</a>";
                        $i++;
                    }
                }
            }
        }
        
    ?>
    </div>
</div> 

     
 <span style="font-size:30px;cursor:pointer" id="oldalsav" onclick="openNav()">☰ Kategóriák</span>
<?php 
echo"<h1>Üdvözlünk az oldalon!!</h1>";
	echo"<div class='flex-container'>";
    
    
    

if ($pictureIds) {
   
    foreach($pictureIds as $pictureId) {
        $pictures->set_photo($pictureId,$conn);
        if($category==""){ 
            if($pictures->get_category()!="Profilkep"){
                   
                echo '<div class="keret"><span><img class="kepek" src="'.$pictures->get_picture_name().'"><span>'.$pictures->get_category().'</span><br><span><a href="index.php?page=searchedUser&searched='.$pictures->get_username().'">'.$pictures->get_username().'</a></span></span></div>';
                
            }
        }
        elseif($pictures->get_cat_id()==$category){ 
            if($pictures->get_category()!="Profilkep"){
                echo '<div class="keret"><span><img class="kepek" src="'.$pictures->get_picture_name().'"><span>'.$pictures->get_category().'</span><br><span><a href="index.php?page=searchedUser&searched='.$pictures->get_username().'">'.$pictures->get_username().'</a></span></span></div>';
            }
        }
    }
}

echo"</div>";

?>

<script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "200px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0px";
        }
      </script>
      <script>
