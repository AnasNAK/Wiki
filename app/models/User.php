<?php
class User
{
    private $db;
    private $username;
    private $email;
    private $password;
    private $userId;
    private $roleType;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function setRoleType($roleType){
        $this->roleType = $roleType;
    }
    public function getRoleType(){
        return $this->roleType;
    }

   
       public function setUsername($username) {
        $this->username = $username;
    }


    public function getUsername() {
        return $this->username;
    }


    public function setEmail($email) {
        $this->email = $email;
    }


    public function getEmail() {
        return $this->email;
    }

 
    public function setPassword($password) {
        $this->password = $password;
    }

 
    public function getPassword() {
        return $this->password;
    }


    public function setUserId($userId) {
        $this->userId = $userId;
    }


    public function getUserId() {
        return $this->userId;
    }




    //Find user by email or username
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

    public function register($data)
    {
  
    }



    public function login($nameOrEmail, $password)
    {
   
    }


    public function countUsers(){
    $this->db->query("SELECT COUNT(*) as  countusers from user where role_type = 0 ");
    $result = $this->db->single();

    if($result){
        return $result;

    }else{
        return false;
    }

    }


}