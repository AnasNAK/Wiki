<?php
require_once('User.php');

class Author extends User {

    private  $db ; 

    public function __construct()
    {
        $this->db = Database::getInstance();
        
    }


    public function findUserByEmailOrUsername($email, $username)
    {
        $this->db->query('SELECT * FROM user WHERE username= :username OR email = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return null;
        }
    }
    public function login($nameOrEmail, $password)
    {
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if ($row == false)
            return false;

        $hashedPassword = $row->password;
      
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }
    
    public function register($data)
    {
        try {
            $this->db->query('INSERT INTO user (username, email,  `password`) 
            VALUES (:name, :email, :password)');
    
            // Bind values
            $this->db->bind(':name', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') { 
                echo "Email already exists. Please choose a different email.";
            } else {
                echo "An error occurred: " . $e->getMessage();
            }
            return false;
        }
    }


}


?>