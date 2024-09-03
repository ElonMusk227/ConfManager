<?php
    namespace app\Relect_art;
    class relect_art{
        private $id;
        private $id_art;
        private $libelle;
        public function __construct(int $id,int $id_art, string $libelle){
            $this->id = $id;
            $this->id_art = $id_art;
            $this->libelle = $libelle;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            return $this->id = $id;
        }
        public function getId_art(){
            return $this->id_art;
        }
        public function setId_art($id_art){
            return $this->id_art = $id_art;
        }
        public function getlibelle(){
            return $this->libelle;
        }
        public function setlibelle($libelle){
            return $this->libelle = $libelle;
        }
    }
?>
