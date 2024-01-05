<?php
use PHPMailer\PHPMailer\PHPMailer;

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
            redirect('../views/pages/reset-password.php'); // Redirect to your reset password page
        }

        // Call the forgot_password function from the model
        if ($this->userModel->forgot_password($usersEmail)) {
            flash('reset', 'Password reset email sent successfully');
            redirect('../views/pages/reset-password.php'); // Redirect to your reset password page
        } else {
            flash('reset', 'Error sending password reset email');
            redirect('../views/pages/reset-password.php'); // Redirect to your reset password page
        }
    }
    public function register()
    {

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
    function forgot_password($email)
    {


        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'haritiasmae@gmail.com';                     //SMTP username
            $mail->Password = 'slt';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Reset your password');
            $mail->addAddress($email);     //Add a recipient


            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function login()
    {

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