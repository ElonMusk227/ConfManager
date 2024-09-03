<?php
    include_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    $select_univ = $pdo->query('SELECT * FROM UNIVERSITE')->fetchAll(PDO::FETCH_ASSOC);
    $select_entreprise = $pdo->query('SELECT * FROM ENTREPRISE')->fetchAll(PDO::FETCH_ASSOC);
    $mess = '';
    $id_auteur = $_GET['num'];
    if(!empty($_POST['nom_auteur'])){
        $nom = $_POST['nom_auteur'];
        $mdp = password_hash($_POST['mdp'], null);
        $univ = $_POST['univ_auteur'];
        $entreprise = $_POST['entreprise'];
        if(session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
        $_SESSION['author'] = [
            'session'=>'connected',
            'id_author'=>$id_auteur
        ];
        $id_chair = $_SESSION['chair']['id'] ?? 1; 
        if($insert = $pdo->prepare('UPDATE AUTEUR SET ID_UNIV = ?, ID_ENTREPRISE = ?, NOM = ?, MDP= ? WHERE ID_AUTEUR = ?')->execute([$univ, $entreprise, $nom, $mdp, $id_auteur])){
            $mess = 'Sign in successfully';
            header('Location:add_article.php');
        }else{
            $mess = 'Failed in signing in';
        }
    }
?>
