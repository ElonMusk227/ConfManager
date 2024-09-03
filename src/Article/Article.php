<?php
    namespace app\Article;
    class article{
        private $id;
        private $id_auteur;
        private $id_conf;
        private $title;
        private $file;
        public function __construct(int $id, int $id_auteur, int $id_conf, string $title, file $file ){
            $this->id = $id;
            $this->id_auteur = $id_auteur;
            $this->id_conf = $id_conf;
            $this->title = $title;
            $this->file = $file;
        }
        public function getId(){
            return $this->id;
        }
        public function getId_A(){
            return $this->id_auteur;
        }
        public function getId_c(){
            return $this->id_conf;
        }
        public function get_title(){
            return $this->title;
        }
        public function get_file(){
            return $this->file;
        }
        public function setId($id){
            return $this->id = $id;
        }
        public function setId_A($id_a){
            return $this->id_auteur = $id_a;
        }
        public function setId_c($id_c){
            return $this->id_conf = $id_c;
        }
        public function set_title($title){
            return $this->title = $title;
        }
        public function set_file($file){
            return $this->file = $file;
        }
    }
?>
