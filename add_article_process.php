<?php
    require __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if($_SESSION['author']['session']=== 'connected'){
    $pdo = Connection::getInstance()->getConnection();
    $id_author = $_SESSION['author']['id_author'];
    $mess = '';
    $conferences = $pdo->query('SELECT ID_CONF, NOM FROM CONFERENCE')->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($_POST['title'])){
        $title = $_POST['title'];
        $id_conf = $_POST['choose_conf'];
        if($_FILES['file']['type'] === 'application/pdf' && $_FILES['file']['size'] < 5000000){
            $file = file_get_contents($_FILES['file']['tmp_ name']);
            @$insert = $pdo->prepare('INSERT INTO ARTICLE(ID_ARTICLE, ID_AUTEUR, ID_CONF, TITLE, FICHIER_ARTICLE) VALUES (?,?,?,?,?)')->execute([null, $id_author, $id_conf, $title, $file]);
            $mess = 'uploaded successfully';
        }else{
            $mess = 'Uploading failed';
        }

    }
}else{
    header('Location:sign_up_author.php');
}

?> 