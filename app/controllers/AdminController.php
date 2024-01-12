<?php 
class AdminController extends Controller{

  
    private $adminModel ;
    private $tagModel ;
    private $userModel ;
    private $catModel ;


    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->tagModel = $this->model('Tag');
        $this->userModel = $this->model('User');
        $this->catModel = $this->model('Categorie');

        
    }

    public function dash() {

        
    $tagsArray = $this->tagModel->GetAllTags();
    $countTag = $this->tagModel->countTags();
    $countTag1= $countTag->tagCount;

    $catArray = $this->catModel->GetAllCategories();
    $countcat = $this->catModel->countCategories();
    $countcat1= $countcat->catCount;

    $countUser = $this->userModel->countUsers();
    $countUser1= $countUser->countusers;





$catsData = [];
foreach ($catArray as $cat) {
    $catsData[] = [

        'name' => $cat->getName(),
        'date' => $cat->getdate(),
        'id' => $cat->getId(),
        
    ];
}

$tagsData = [];
foreach ($tagsArray as $tag) {
    $tagsData[] = [

        'counter' =>$countTag1,
        'name' => $tag->getName(),
        'id' => $tag->getId(),
        
    ];
}

$data = [
    'tagsData' => $tagsData,
    'catsData' => $catsData,
    'countUsers' => $countUser1,
    'countcats' => $countcat1,

];
    
        // Pass data to the view
        $this->view('admin/dashAdmin',$data);
    }
    
public function loginform (){

    $this->view('/admin/login');

} 

public function createUserSession($user)
{
    $_SESSION['role'] = $user->role_type;
    $_SESSION['username'] = $user->username;
    $_SESSION['email'] = $user->email;
    $this->dash();
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
            $this->view('/admin/login' , $data);
            exit();
        }

        //Check for user/email
        if ($this->adminModel->FindAdmin($data['name/email'], $data['name/email'])) {
            //User Found
            $loggedInUser = $this->adminModel->login($data['name/email'], $data['password']);
            if ($loggedInUser) {
                //Create session
                $this->createUserSession($loggedInUser);
            } else {
                flash("login", "Password Incorrect");
                $this->view('/admin/login',$data);
            }
        } else {
            flash("login", "No user found");
            $this->view('/admin/login' ,$data);
        }
    }
    }



    public function logout()
    {
        unset($_SESSION['role']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        session_destroy();
        $this->view('/Pages/index');
    }




   






}


?>