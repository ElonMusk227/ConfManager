<?php
    include __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    $mess = ''; 
    $selects = $pdo->query('SELECT * FROM VERIFICATION_CODE')->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
        $verification_code = $_POST['verification_code'];
        foreach ($selects as $select){
            if($email === $select['EMAIL'] && $verification_code === $select['VERIFICATION_CODE']){
                $id_auteur = $select['ID_AUTEUR'];
                header('Location:author_register?num='.$id_auteur);
            }else{
                $mess = 'Incorrect or expired verification code';
            }
        }
    }
?>