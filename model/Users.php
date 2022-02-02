<?php
class Users {
    
    private $id;
    private $nev;
    private $sor;
    private $oszlop;
    private $jelszo;
    private $felhasznalonev;

    public function set_user($id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT users_id, username, pw, premium, followers, likes, gender, e-mail, profile_picture FROM users";
        $sql .= " WHERE users_id = $id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->users_id = $row['users_id'];
                $this->username = $row['username'];
                $this->password = $row['pw'];
                $this->premium = $row['premium'];
                $this->followers = $row['followers'];
                $this->likes = $row['likes'];
                $this->likes = $row['gender'];
                $this->likes = $row['email'];
                $this->likes = $row['profile_picture'];
                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    public function get_username() {
        return $this-username;
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
        return $this->gender;
    }
    public function get_profile_picture() {
        return $this->gender;
    }
    public function get_users_id() {
        return $this->gender;
    }
    
}
?>