<?php 

class Controller {
    public function model($model){
        //require the model
        require_once '../app/models/'.$model.'.php';
        //instantiate the model 
        return  new $model();
    }

    public function view($view,$data=[]){
        //check for the view file 
        if(file_exists('../app/views/'.$view. '.php')){

            require_once('../app/views/'.$view. '.php');
        }else{
            // view does not exist 
            die("View file does not exist");
        }

    }
}




?>