<?php 

class Tag {
private $db;
private $name;
private $id;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }



    public function createTag($data){
        $this->db->query("INSERT INTO tag (name) values (:name)");
    $this->db->bind(':name',$data['name']);
    if($this->db->execute()){
        return true;

    }else{
        return false;
    }
    }


    public function updateTag($data){
        $this->db->query("UPDATE tag SET name = :name WHERE id = :id");

        $this->db->bind(':name',$data['name']);
        $this->db->bind(':id',$data['id']);
        if($this->db->execute()){

            return true;

        }else{
            return false;
        }
    }


    public function deleteTag($id){
        $this->db->query("DELETE FROM tag WHERE id = :id");
        $this->db->bind(':id',$id);
        if($this->db->execute()){
            return true;

        }else{
            return false;
        }
    }


    public function GetAllTags(){
    
        $this->db->query("SELECT * FROM tag ");
        $result = $this->db->resultSet();

        $TagsArray = array();
        foreach($result as $row){
        $tag = new Tag();
        $tag->setId($row->id);
        $tag->setName($row->name);
        $TagsArray[] = $tag;
        }
          return $TagsArray;
    }


    public function countTags(){
        $this->db->query("SELECT  COUNT(*) as tagCount FROM `tag`");
        $result = $this->db->single();

    if($result){
        return $result;

    }else{
        return false;
    }
        
    }


    public function findTagById($id)
    {
      $this->db->query('SELECT * FROM Tag WHERE id = :id');
      $this->db->bind(':id', $id);
  
      $row = $this->db->single();
    
      return $row;
    }
}


?>