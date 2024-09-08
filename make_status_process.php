<?php 
    require_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    $articles = $pdo->query('SELECT ID_ARTICLE, TITLE FROM ARTICLE')->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($_POST['article'])){
        $id_article = $_POST['article'];
        $status = $_POST['status'];
        $justificatif = $_POST['justificatif'];
        $id_chair = 1;
        $insert = $pdo->prepare('INSERT INTO STATUT(ID_CHAIR, ID_ARTICLE, STATUT, JUSTIFICATIF) VALUES (?,?,?,?)')->execute([$id_chair, $id_article, $status, $justificatif]);
        $mess = 'Status added successfully';
    }
?>