<?php
class Users {
    
    private $users_id;
    private $username;
    private $pw;
    private $premium;
    private $followers;
    private $likes;
    private $gender;
    private $email;
    private $profile_picture;
    public function set_user($users_id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT users_id, username, pw, premium, followers, likes, gender, email  FROM users";
        $sql .= " WHERE users_id = $users_id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->users_id = $row['users_id'];
                $this->username = $row['username'];
                $this->pw = $row['pw'];
                $this->premium = $row['premium'];
                $this->followers = $row['followers'];
                $this->likes = $row['likes'];
                $this->gender = $row['gender'];
                $this->email = $row['email'];
               
                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    public function get_username() {
        return $this->username;
    }

    public function get_pw() {
        return $this->pw;
    }

    public function get_premium() {
        return $this->premium;
    }

    public function get_followers() {
        return $this->followers;
    }

    public function get_likes() {
        return $this->likes;
    }
    public function get_gender() {
        return $this->gender;
    }
    public function get_email() {
        return $this->email;
    }
    
    public function get_users_id() {
        return $this->_users_id;
    }
    public function felhasznaloLista($conn) {
        $lista = array();
        $sql = "SELECT id FROM users";
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