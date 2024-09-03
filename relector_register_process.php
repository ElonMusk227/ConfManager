<?php
    include 'sign_up_relector_process.php';
    $mess = '';
    $select_domaine = $pdo->query('SELECT * FROM DOMAINE')->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($_POST['nom_relecteur'])){
        $nom = $_POST['nom_relecteur'];
        $mdp = password_hash($_POST['mdp'], null);
        $id_domaine = $_POST['domaine'];
        $id_relecteur = $_POST['id_relecteur'];
        $id_article = $_POST['id_article'];
        if(session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
        $_SESSION['sproofreader'] = [
            'session'=>'connected',
            'id_sproofreader'=>$id_relecteur
        ];
        $id_chair = $_SESSION['chair']['id'] ?? 1; 
        if($update = $pdo->prepare('UPDATE RELECTEUR SET    ID_DOMAINE = ?, NOM = ?, MDP = ? WHERE ID_RELECTEUR = ?')->execute([$id_domaine, $nom, $mdp, $id_relecteur])){
            $mess = 'Sign in successfully';
            header('Location:add_evaluation.php');
        }else{
            $mess = 'Failed in signing in';
        }
    }
?>
