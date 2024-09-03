<?php
    namespace app\Article;
    class chair{
        private int $id;
        private string $nom;
        public function __construct(int $id, string $nom){
            $this->id = $id;
            $this->nom = $nom; 
        }  
        public function getId(){
            return $this->id;
        }
        public function getName(){
            return $this->nom;
        }
        public function setId($id){
            return $this->id = $id;
        }
        public function setName($name){
            return $this->id = $name;
        }
    }
?>