<?php


class Users extends Controller
{

    private $adminModel;
    private $authorModel;
    private $userModel;

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->authorModel = $this->model('Author');
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            

        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //Init data
        $data = [
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),

        ];

        //Validate inputs
        if (
            empty($data['username']) || empty($data['email']) ||
            empty($data['password'])
        ) {
            flash("register", "Please fill out all inputs");
            $this->view('/Pages/signup');
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            flash("register", "Invalid email");

            $this->view('/Pages/signup');
        }

        if (strlen($data['password']) < 6) {
            flash("register", "Invalid password");
            $this->view('/Pages/signup');
        } 

        //User with the same email or password already exists
        if ($this->authorModel->findUserByEmailOrUsername($data['email'], $data['username'])) {
            flash("register", "Username or email already taken");
            $this->view('/Pages/signup');
        }


        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

  
        //  Register User
        if ($this->authorModel->register($data)) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];


            $res = $this->authorModel->findUserByEmailOrUsername($data['email'], $data['username']);
            $role_id= $res->role_type;
     
            $_SESSION['role'] = $role_id;
            $this->view('/Pages/index');
        } else {
            die("Something went wrong");
        }
    }
    }
    // public function get_songs($artist): array
    // {
    //     $results = $this->userModel->get_songs($artist);

    //     return is_array($results) ? $results : [];
    // }

    // public function search_songs($artist)
    // {

    //     $results = $this->userModel->search_artist($artist);

    //     echo json_encode($results);
    //     exit;


    // }
    
    public function login()
    {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Sanitize POST data
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    //Init data
    $data = [
        'name/email' => trim($_POST['name/email']),
        'password' => trim($_POST['password'])
    ];

    if (empty($data['name/email']) || empty($data['password'])) {
        flash("login", "Please fill out all inputs");
        $this->view('/Pages/login');
        exit();
    }
    
    $user = $this->userModel->findUserByEmailOrUsername($data['name/email'], $data['name/email']);


    //Check for user/email
    if ($user) {
        $roleId = $user->role_type;
        if($roleId == 0 ){

            $loggedIn = $this->authorModel->login($data['name/email'], $data['password']);
    
             if ($loggedIn) {

            //Create session
            $this->createUserSession($loggedIn);

      
            redirect( URLROOT.'/AuthorController/dash');

              } else {

            flash("login", "Password Incorrect");
            $this->view('/Pages/login');

                }

        }else{

            $loggedIn = $this->adminModel->login($data['name/email'], $data['password']);

                if ($loggedIn) {

            //Create session
            $this->createUserSession($loggedIn);
            redirect( URLROOT.'/AdminController/dash');

              } else {

            flash("login", "Password Incorrect");

            $this->view('/Pages/login');
            
                }
        }


    } else {
        flash("login", "No user found");
        $this->view('/Pages/login');
    }

    }
        
    }

    public function createUserSession($user)
    {
        // $_SESSION['usersId'] = $user->usersId;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['role'] = $user->role_type;

    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        session_destroy();
        $this->view('/Pages/index');
    }
}