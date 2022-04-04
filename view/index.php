
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
<div class="kozep">
    <?php 
        if ($pictureIds) {
            $sql="SELECT cat_id,category FROM cat";
            if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                $i=2;
                echo"<hr class='vonal'>";
                while($row = $result->fetch_assoc()) {
                    if($row['category']!="Profilkep"){

                        echo"<a class='kozep' href='index.php?category=".$i."'>".$row['category']."</a><hr class='vonal'>";
                        
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

	echo"<div class='flex-container' id='flex-con'>";
    
    
    

if ($pictureIds) {
   
    foreach($pictureIds as $pictureId) {
        $pictures->set_photo($pictureId,$conn);
        if($category==""){ 
            if($pictures->get_category()!="Profilkep"){
                $i=0;
                $j=0;
                   $sql="SELECT COUNT(users_id) FROM likes WHERE vote = 0 and liked_pic_id='".$pictureId."'";
                   if(!$result = $conn->query($sql)) echo $conn->error;
                   
                
                   if($result->num_rows > 0){
                    foreach($result->fetch_assoc() as $row){
                        $i=$row;
                       }
                    } 
                    $sql="SELECT  COUNT(users_id) FROM likes WHERE vote = 1 and liked_pic_id='".$pictureId."'";
                   if(!$result = $conn->query($sql)) echo $conn->error;
                   if($result->num_rows > 0){
                    foreach($result->fetch_assoc() as $row){
                        $j=$row;
                       }
                    } 
                echo 
                '<div class="keret">
                    <span><img class="kepek" src="'.$pictures->get_picture_name().'">
                    <span>Kategória:<br> <b><a href="index.php?category='.$pictures->get_cat_id().'">'.$pictures->get_category().'</a></b></span><br>
                    <span>Feltöltötte: <a href="index.php?page=searchedUser&searched='.$pictures->get_username().'">'.$pictures->get_username().'</a></span>';
                if (!empty($_SESSION['users_id'])) {
                    echo 
                    '<form action="index.php?=vote" method="post" id="absolut">
                    
                        <input type="submit" class="fel" name="upvote" value>
                        '.$i.'
                        
                        <span class="centi"> vagy</span>
                        <input type="submit" class="le" name="downvote" value>
                        <input type="hidden" value="'.$pictureId.'" name="voteid">
                        
                        '.$j.'';
                        
                        $sql="SELECT users_id FROM favourite WHERE favorited_picture_id=".$pictureId." and users_id=".$_SESSION['users_id']." ";
                        if(!$result = $conn->query($sql)) echo $conn->error;
                        if($result->num_rows > 0){
                            echo'<input type="submit" class="onfav" name="fav" onclick="favno(this.value)" value>';
                        }else{
                            echo'<input type="submit" class="nofav" name="fav" onclick="favo(this.value)"  value>';
                        }
                        echo'
                    </form>
                   
                    
                    
                    </span>
                </div>';
                }   
                else echo '<br>lÁjKoK:'.$i.' dIsZlÁjKoK:'.$j.'</span></div>';
                
            }
        }
        elseif($pictures->get_cat_id()==$category){ 
            if($pictures->get_category()!="Profilkep"){
                $i=0;
                $j=0;
                   $sql="SELECT COUNT(users_id) FROM likes WHERE vote = 0 and liked_pic_id='".$pictureId."'";
                   if(!$result = $conn->query($sql)) echo $conn->error;
                   if($result->num_rows > 0){
                    foreach($result->fetch_assoc() as $row){
                        $i=$row;
                       }
                    } 
                    $sql="SELECT  COUNT(users_id) FROM likes WHERE vote = 1 and liked_pic_id='".$pictureId."'";
                   if(!$result = $conn->query($sql)) echo $conn->error;
                   if($result->num_rows > 0){
                    foreach($result->fetch_assoc() as $row){
                        $j=$row;
                       }
                    } 
                echo 
                '<div class="keret">
                    <span><img class="kepek" src="'.$pictures->get_picture_name().'">
                    <span>Kategória:<br> <b><a href="index.php?category='.$pictures->get_cat_id().'">'.$pictures->get_category().'</a></b></span><br>
                    <span>Feltöltötte: <a href="index.php?page=searchedUser&searched='.$pictures->get_username().'">'.$pictures->get_username().'</a></span>';
                if (!empty($_SESSION['users_id'])) {
                    echo 
                    '<form action="index.php?=vote" method="post" id="absolut">
                    
                        <input type="submit" class="fel" name="upvote" value>
                        '.$i.'
                       
                        <span class="centi"> vagy</span>
                        <input type="submit" class="le" name="downvote" value>
                        <input type="hidden" value="'.$pictureId.'" name="voteid">
                        '.$j.'
                        
                    </form>
                    <form  method="post" id="absolut"></form>
                    <?php
                    
                    
                    </span>
                </div>';
                }   
                else echo '<br>lÁjKoK:'.$i.' dIsZlÁjKoK:'.$j.'</span></div>';
            }
        }
    }
}

echo"</div>";

?>

<script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "10%";
          document.getElementById("oldalsav").style.display="none";
          document.getElementById("flex-con").style.margin="45px auto 0 auto";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0%";
          document.getElementById("oldalsav").style.display="inline";
          document.getElementById("flex-con").style.margin="0 auto 0 auto";
        }
        function favo() {
          document.getElementById("nofav").style.backgroundImage = "url(../pictures/onfav.png)";

          
        }
        function favno() {
          document.getElementById("onfav").style.backgroundImage = "url(../pictures/nofav.png)";
        }
      </script>
      
