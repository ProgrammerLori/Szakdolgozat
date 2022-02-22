<?php
class Pictures {
    
    private $users_id;
    private $picture_id;
    private $picture_name;
    private $category;
    private $size;
    private $formats;
 
    public function set_photo($picture_id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT users_id, picture_id, picture_name,category, size, formats, email  FROM pictures";
        $sql .= " WHERE picture_id = $picture_id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->users_id = $row['users_id'];
                $this->picture_id = $row['picture_id'];
                $this->picture_name = $row['picture_name'];
                $this-> category = $row[' category'];
                $this->size = $row['size'];
                $this->formats = $row['formats'];
                $this->email = $row['email'];
               
                
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

    

    public function get_category() {
        return $this->category;
    }

    public function get_size() {
        return $this->size;
    }
    public function get_formats() {
        return $this->formats;
    }
    public function get_email() {
        return $this->email;
    }
    
    public function get_users_id() {
        return $this->_users_id;
    }
    public function felhasznaloLista($conn) {
        $lista = array();
        $sql = "SELECT users_id FROM users";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $lista[] = $row['users_id'];
                }
            }
        }
        return $lista;
    }   
}
?>