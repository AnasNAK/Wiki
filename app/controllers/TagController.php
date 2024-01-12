<?php 
class TagController extends Controller{


    private $tagModel;
public function __construct()
{
    $this->tagModel = $this->model('Tag');

}

public function add(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $data = [
            'name' => trim($_POST['name'])
        ];


        if(!empty($data['name'])){
            $this->tagModel->createTag($data);
            
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

        $id = $_POST['tagId'];

        $tag = $this->tagModel->findTagById($id);

        $data = [
            'id' => $tag->id,
            'name' => trim($_POST['name']),
        ];


        if(!empty($data)) {
            $this->tagModel->updateTag($data);

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
        $id = $_POST['tagId'];
        
        if ($this->tagModel->deleteTag($id)) {
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