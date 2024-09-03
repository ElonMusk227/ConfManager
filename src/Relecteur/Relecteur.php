<?php
    namespace app\Relecteur;
    class relecteur{
        private $id;
        private $id_chair;
        private $id_domaine;
        private $nom;
        private $mdp;
        public function __construct(int $id, int $id_chair, int $id_domaine, string $nom, string $mdp ){
            $this->id = $id;
            $this->id_chair = $id_chair;
            $this->id_domaine = $id_domaine;
            $this->nom = $nom;
            $this->mdp = $mdp;
        }
        public function getId(){
            return $this->id;
        }
        public function getId_Ac(){
            return $this->id_chair;
        }
        public function getId_d(){
            return $this->id_domaine;
        }
        public function get_nom(){
            return $this->nom;
        }
        public function get_mdp(){
            return $this->mdp;
        }
        public function setId($id){
            return $this->id = $id;
        }
        public function setId_c($id_c){
            return $this->id_chair = $id_c;
        }
        public function setId_d($id_d){
            return $this->id_domaine = $id_d;
        }
        public function set_nom($nom){
            return $this->nom = $nom;
        }
        public function set_mdp($mdp){
            return $this->mdp = $mdp;
        }
    }
?>
