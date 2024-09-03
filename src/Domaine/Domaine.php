<?php
    namespace app\Domaine;
    class domaine{
        private $id;
        private $libelle;
        public function __construct($id, $libelle){
            $this->id = $id;
            $this->libelle = $libelle;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            return $this->id = $id;
        }
        public function getlibelle(){
            return $this->libelle;
        }
        public function setlibelle($libelle){
            return $this->libelle = $libelle;
        }
    }
?>
