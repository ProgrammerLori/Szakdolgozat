<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <?php 

        if ($pictureIds) {
        
            $sql="SELECT cat_id,category FROM cat";
            if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    if($row['category']!="Profilkep"){
                        echo"<a href='index.php?page=termekek&amp;action='".$row['category']."'>".$row['category']."</a>";
                    }
                }
            }
        }
        
    ?>
</div> 

     
 <span style="font-size:30px;cursor:pointer" id="oldalsav" onclick="openNav()">☰ Kategóriák</span>
<?php 

	echo"<div class='flex-container'>";
    
if ($pictureIds) {
    
    foreach($pictureIds as $pictureId) {
        $pictures->set_photo($pictureId,$conn);
        if($pictures->get_category()!="Profilkep"){
            echo '<div class="keret"><span  ><img class="kepek" src="'.$pictures->get_picture_name().'"><span>'.$pictures->get_category().'</span></span></div>';
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