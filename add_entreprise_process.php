<?php
    require_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    $mess = null;
    if(!empty($_POST['entreprise'])){
        $entreprise = htmlspecialcharss($_POST['entreprise']);
        if($insert = $pdo->prepare('INSERT INTO ENTREPRISE(ID_ENTREPRISE, NOM) VALUES (?,?)')->execute([null, $entreprise])){
            $mess = "Entreprise added succesffully";
        }else{
            $mess = 'Error when adding entreprise';
        }
    }
?>