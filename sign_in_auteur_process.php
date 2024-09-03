<?php
    include_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    $mess = '';
    $is_registered = false;
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $authors = $pdo->query('SELECT ID_AUTEUR, EMAIL, MDP FROM AUTEUR')->fetchAll(PDO::FETCH_ASSOC);
        foreach($authors as $author){
            if($email === $author['EMAIL'] && password_verify($password, $author['MDP'])){
                $id_author = $author['ID_AUTEUR'];
                $is_registered = true;
            }
        }
        if($is_registered === true){
           if(session_status() === PHP_SESSION_NONE){
                session_start();
           }
           $_SESSION['author'] = [
            "session" => 'connected',
            'id_author' => $id_author
           ];
            header('Location:add_article.php');
        }else{
            $mess = 'Incorrect email or password';
        }
    }
















?>