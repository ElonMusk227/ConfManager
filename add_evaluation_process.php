<?php
    require_once __DIR__. '\vendor\autoload.php';
    use App\Connection\Connection;  
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if($_SESSION['sproofreader']['session'] === 'connected'){
        require './elements/header_relector.php';
        $pdo = Connection::getInstance()->getConnection();
        $mess = '';
        $id_relecteur =$_SESSION['sproofreader']['id_sproofreader'];
        $id_articles = $pdo->query('SELECT ID_ARTICLE FROM ASSIGNATION WHERE ID_RELECTEUR  = '.$id_relecteur)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($id_articles as $value) {
            $article = $pdo->query('SELECT ID_ARTICLE,TITLE FROM ARTICLE WHERE ID_ARTICLE='.$value['ID_ARTICLE'])->fetch(PDO::FETCH_ASSOC);
            $articles [] = $article;    
        } 
        if(!empty($_POST['article'])){
            $id_art = $_POST['article'];
            $evaluation = $_POST['evaluation'];
            if($insert = $pdo->prepare('INSERT INTO RELEC_ART (ID_RELECTEUR,ID_ARTICLE,EVALUATION) VALUES(?,?,?)')->execute([$id_relecteur, $id_art, $evaluation])){
                $mess = 'Added successfully';
            }else{
                $mess = 'Failed in adding';
            }       
        }
    }
?>