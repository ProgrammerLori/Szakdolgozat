<?php
class ProfileP{
    
    
    private $picture_id;
    private $picture_name;

    public function set_photo($picture_id, $conn) {
        // adatbázisból lekérdezzük
        
        $sql = "SELECT  pictures.picture_id, profile_pics.picture_id, pictures.picture_name, profile_pics.users_id  FROM pictures INNER JOIN profile_pics ON  pictures.picture_id = profile_pics.picture_id"; 
        $sql .= " WHERE pictures.picture_id = $picture_id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                $this->picture_id = $row['picture_id'];
                $this->picture_name = $row['picture_name'];
                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    
    
    
    public function get_picture_id() {
        return $this->picture_id;
    }
    public function get_picture_name() {
        return $this->picture_name;
    }
    public function photoList($conn) {
        $lista = array();
        $sql = "SELECT picture_id FROM profile_pics";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $lista[] = $row['picture_id'];
                }
            }
        }
        return $lista;
    }   
}
?>