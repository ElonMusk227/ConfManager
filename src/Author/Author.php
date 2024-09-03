<?php
    namespace app\Auteur;
    class auteur{
        private $id_chair;
        private $id_univ;
        private $_id_entre;
        private $nom;
        private $mdp;
        public function __construct(int $id, int $id_chair, int $id_univ, int $id_entre, string $nom, string $mdp ){
            $this->id = $id;
            $this->id_chair = $id_chair;
            $this->id_univ = $id_univ;
            $this->id_entre = $id_entre;
            $this->nom = $nom;
            $this->mdp = $mdp;
        }
        public function getId(){
            return $this->id;
        }
        public function getId_c(){
            return $this->id_chair;
        }
        public function getId_u(){
            return $this->id_conf;
        }
        public function getId_e(){
            return $this->id_entre;
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
        public function setId_c($idc){
            return $this->id_chair = $idc;
        }
        public function setId_u($idu){
            return $this->id_univ = $idu;
        }
        public function setId_e($ide){
            return $this->id_entre = $ide;
        }
        public function set_nom($nom){
            return $this->nom = $nom;
        }
        public function set_mdp($mdp){
            return $this->mdp = $mdp;
        }
    }
?>
