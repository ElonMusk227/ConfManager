<?php
    namespace app\Statut;
    class statut{
        private $id;
        private $id_art;
        private $statut;
        private $justificatif;
        public function __construct(int $id,int $id_art, string $statut, string $justificatif){
            $this->id = $id;
            $this->id_art = $id_art;
            $this->statut = $statut;
            $this->justificatif = $justificatif;
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
        public function getstatut(){
            return $this->statut;
        }
        public function setstatut($statut){
            return $this->statut = $statut;
        }
        public function getjustificatif(){
            return $this->justificatif;
        }
        public function setjustificatif($justificatif){
            return $this->justificatif = $justificatif;
        }
    }
?>
