<?php 

class AuthorController extends Controller {

private $authorModel;

public function __construct()
{

    $this->authorModel = $this->model('Author');
    

}

public function dash(){
    
    $this->view('author/dashAuthor');

}


}




?>