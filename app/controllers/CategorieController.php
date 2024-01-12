<?php 
class CategorieController extends Controller{


    private $CatModel;
public function __construct()
{
    $this->CatModel = $this->model('Categorie');

}

public function add(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $data = [
            'name' => trim($_POST['name'])
        ];


        if(!empty($data['name'])){
            $this->CatModel->createCategorie($data);
            
            // If the processing is successful
            echo json_encode(['success' => true , 'data' => $data['name']]);
            redirect(URLROOT.'/AdminController/dash');

        }else{
            echo json_encode(['success' => false, 'error' => 'Tag name is empty']);
            exit;
        }


    
    }else{
        $data = [
            'name' => ''
        ];
        redirect( URLROOT.'/AdminController/dash');

    }
}


public function edit() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $id = $_POST['catId'];

        $categorie = $this->CatModel->findCategorieById($id);

        $data = [
            'id' => $categorie->id,
            'name' => trim($_POST['name']),
        ];


        if(!empty($data)) {
            $this->CatModel->updateCategorie($data);

            echo json_encode(['success' => true , 'data' => $data['name']]);
            redirect(URLROOT.'/AdminController/dash');



        }else{
            echo json_encode(['success' => false, 'error' => 'Tag name is empty']);
            exit;

        }
        

    }else{
        $data = [
            'name' => ''
        ];
        redirect( URLROOT.'/AdminController/dash');

    }
}


public function delete()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['CatId'];
        
        if ($this->CatModel->deleteCategorie($id)) {
            echo json_encode(['success' => true]);
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Error deleting tag']);
            exit;
        }
    }
}







}



?>