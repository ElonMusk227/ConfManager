<?php
    namespace App\Connection;
    use PDO;
    class Connection{
        private static $instance = null;
        private $pdo;
        function __construct(){
            $this->pdo = new PDO('mysql:host=localhost;dbname=confmanager','root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public static function getInstance(){
            if(self::$instance === null){
                self::$instance = new self();
            }
            return self::$instance;
        }
        public function getConnection(){
            return $this->pdo;
        }
    }
?>