<?php
    require_once __DIR__ . '\vendor\autoload.php';
    use App\Conference\Conference;
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    $mess = '';
    if(!empty($_POST['NOM'])){
        $nom  = $_POST['NOM'];
        $sigle  = $_POST['SIGLE'];
        $date_s   = date($_POST['DATE_DE_SOUMISSION']);
        $date_d  = date($_POST['DATE_DEROULEMENT']);
        $date_r  = date($_POST['DATE_DE_RESULTAT']);
        $conf = new Conference($nom, $sigle, $date_s, $date_d, $date_r);
        $conf->create_conference();
        $mess = 'Conference created successfully';
    }
?>
