<?php
    include_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    $mess = '';
    $is_registered = false;
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $relecteurs = $pdo->query('SELECT ID_RELECTEUR, EMAIL, MDP FROM RELECTEUR')->fetchAll(PDO::FETCH_ASSOC);
        foreach($relecteurs as $relecteur){
            if($email === $relecteur['EMAIL'] && password_verify($password, $relecteur['MDP'])){
                $id_relecteur = $relecteur['ID_RELECTEUR'];
                $is_registered = true;
            }
        }
        if($is_registered === true){
            if(session_status() === PHP_SESSION_NONE)
            {
                session_start();
            }
            $_SESSION['sproofreader'] = [
                'session'=>'connected',
                'id_sproofreader'=>$id_relecteur
            ];
            header('Location:add_evaluation.php');
        }else{
                $mess = 'Incorrect or expired verification code';
        }
    }
















?>