<?php
    require_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    $mess = null;
    if(!empty($_POST['universite'])){
        $universite = htmlspecialchars($_POST['universite']);
        if($insert = $pdo->prepare('INSERT INTO UNIVERSITE(ID_UNIV, NOM_UNIV) VALUES (?,?)')->execute([null, $universite])){
            $mess = "Universite added succesffully";
        }else{
            $mess = 'Error when adding university';
        }
    }
?>