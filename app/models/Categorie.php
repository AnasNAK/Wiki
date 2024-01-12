<?php 


class Categorie {
    private $db;
    private $name;
    private $id;
    private $date;
    
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
    
           public function getdate() {
            return $this->date;
        }
    
        public function setdate($date) {
            $this->date = $date;
        }
    
        public function createCategorie($data){
            $this->db->query("INSERT INTO categorie (name) values (:name)");
        $this->db->bind(':name',$data['name']);
        if($this->db->execute()){
            return true;
    
        }else{
            return false;
        }
        }
    
    
        public function updateCategorie($data){
            $this->db->query("UPDATE categorie SET name = :name WHERE id = :id");
    
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':id',$data['id']);
            if($this->db->execute()){
    
                return true;
    
            }else{
                return false;
            }
        }
    
    
        public function deleteCategorie($id){
            $this->db->query("DELETE FROM categorie WHERE id = :id");
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
    
            }else{
                return false;
            }
        }
    
    
        public function GetAllCategories(){
        
            $this->db->query("SELECT * FROM categorie ");
            $result = $this->db->resultSet();
    
            $CategorieArray = array();
            foreach($result as $row){
            $categorie = new Categorie();
            $categorie->setId($row->id);
            $categorie->setName($row->name);
            $categorie->setdate($row->updated_at);
            $CategorieArray[] = $categorie;
            }
              return $CategorieArray;
        }
    
    
        public function countCategories(){
            $this->db->query("SELECT  COUNT(*) as catCount FROM `categorie`");
            $result = $this->db->single();
    
        if($result){
            return $result;
    
        }else{
            return false;
        }
            
        }
    
    
        public function findCategorieById($id)
        {
          $this->db->query('SELECT * FROM categorie WHERE id = :id');
          $this->db->bind(':id', $id);
      
          $row = $this->db->single();
        
          return $row;
        }
    }
?>