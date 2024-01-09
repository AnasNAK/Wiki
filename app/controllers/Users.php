<?php


class Users extends Controller
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function sendPasswordResetEmail($usersEmail)
    {
        if (!filter_var($usersEmail, FILTER_VALIDATE_EMAIL)) {
            flash('reset', 'Invalid email format');
            redirect('../views/pages/reset-password.php'); 
        }

        // Call the forgot_password function from the model
        if ($this->userModel->forgot_password($usersEmail)) {
            flash('reset', 'Password reset email sent successfully');
            redirect('../views/pages/reset-password.php'); 
        } else {
            flash('reset', 'Error sending password reset email');
            redirect('../views/pages/reset-password.php'); 
        }
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
            'pwdRepeat' => trim($_POST['pwdRepeat']),
            'role_type' => trim($_POST['role_type'])
        ];

        //Validate inputs
        if (
            empty($data['username']) || empty($data['email']) ||
            empty($data['password']) || empty($data['pwdRepeat'])
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
        } else if ($data['password'] !== $data['pwdRepeat']) {
            flash("register", "Passwords don't match");
            $this->view('/Pages/signup');
        }

        //User with the same email or password already exists
        if ($this->userModel->findUserByEmailOrUsername($data['email'], $data['username'])) {
            flash("register", "Username or email already taken");
            $this->view('/Pages/signup');
        }


        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //  Register User
        if ($this->userModel->register($data)) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['role_type'] = $data['role_type'];
            $this->view('/Pages/login');
        } else {
            die("Something went wrong");
        }
        }
    }
    public function get_songs($artist): array
    {
        $results = $this->userModel->get_songs($artist);

        return is_array($results) ? $results : [];
    }

    public function search_songs($artist)
    {

        $results = $this->userModel->search_artist($artist);

        echo json_encode($results);
        exit;


    }
    
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

    //Check for user/email
    if ($this->userModel->findUserByEmailOrUsername($data['name/email'], $data['name/email'])) {
        //User Found
        $loggedInUser = $this->userModel->login($data['name/email'], $data['password']);
        if ($loggedInUser) {
            //Create session
            $this->createUserSession($loggedInUser);
        } else {
            flash("login", "Password Incorrect");
            $this->view('/Pages/login');
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
        $_SESSION['role_type'] = $user->role_type;
        $this->view('/Pages/index');
    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        session_destroy();
        $this->view('/Pages/index');
    }
}



$init = new Users;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            redirect("../index.php");
            break;
    }
} else {
    if (isset($_GET['url']) && $_GET['url'] == 'Users/logout') {
        $init->logout();
    } else {
    }
}