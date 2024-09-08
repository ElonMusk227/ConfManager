<?php
    namespace App\Connection;
    use PDO;
    class Connection{
        private static $instance = null;
        private $pdo;
        function __construct(){
            $this->pdo = new PDO('pgsql:host=aws-0-eu-central-1.pooler.supabase.com;port=6543;dbname=postgres;user=postgres.awgftcohetqdwzprzjlz;password=Conf.Manager@2005.dev');
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