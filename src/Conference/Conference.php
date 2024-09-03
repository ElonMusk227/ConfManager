<?php
    namespace App\Conference;
    use App\Connection\Connection;
    use PDO;
    use DateTime;
    use DateTimeZone;
    class Conference{
        private int $id = 0, $id_chair = 1;
        private string $nom,$sigle;
        private string $date_deroulement, $date_soumission, $date_resultat;
        public function __construct(string $nom, string $sigle, string $date_soumission,string $date_deroulement, string $date_resultat){
            $this->nom = $nom;
            $this->sigle = $sigle;
            $this->date_soumission = $date_soumission;
            $this->date_deroulement = $date_deroulement;
            $this->date_resultat = $date_resultat;
        }
        public function getId(){
            return $this->id;
        }
        public function getIdChair(){
            return $this->id_Chair;
        }
        public function getNom(){
            return $this->nom;
        }
        public function get_DD(){
            return $this->date_deroulement;
        }
        public function get_DS(){
            return $this->date_soumission;
        }
        public function get_DR(){
            return $this->date_resultat;
        }
        public function setId($id){
            return $this->id = $id;
        }
        public function setId_Chair($id_chair){
            return $this->id_chair = $id_chair;
        }
        public function setNom($nom){
            return $this->nom = $nom;
        }
        public function setSigle($sigle){
            return $this->sigle = $sigle;
        }
        public function set_DD($dd){
            return $this->date_deroulement = $dd;
        }
        public function set_DS($ds){
            return $this->date_soumission = $ds;
        }
        public function set_DR($dr){
            return $this->date_resultat = $dr;
        }
        public function create_conference() {
            // Utiliser la méthode pour obtenir l'instance de PDO
            $pdo = Connection::getInstance()->getConnection();
            
            $sql = 'SELECT ID_CONF FROM CONFERENCE';
            $query = $pdo->query($sql);
            $select = $query->fetchAll(PDO::FETCH_NUM);
            $count = count($select);
            $this->id = (int)$select[$count - 1][0];
            $this->id += 1;
            
            $sql = "INSERT INTO CONFERENCE (`ID_CONF`, `ID_CHAIR`, `NOM`, `SIGLE`, `DATE_SOUMISSION`, `DATE_DEROULEMENT`, `DATE_RESULTAT`) VALUES (?,?,?,?,?,?,?)";
            $insert = $pdo->prepare($sql);
            $insert->execute([$this->id, $this->id_chair, $this->nom, $this->sigle, $this->date_soumission, $this->date_deroulement, $this->date_resultat]);
            
            return true;
        }
        public function add_author(){
            
            return true;
        }
        public function delete_conference(){
            
        }
    }
?>