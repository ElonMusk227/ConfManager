<?php
    namespace app\Entreprise;
    class Entreprise{
        private $id;
        private $nom;
        public function __construct($id, $nom){
            $this->id = $id;
            $this->nom = $nom;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            return $this->id = $id;
        }
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            return $this->name = $name;
        }
    }
?>
