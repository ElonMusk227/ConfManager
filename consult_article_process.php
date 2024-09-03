<?php
    require 'add_article_process.php';
    $select = $pdo->query('SELECT `TITLE`, `FICHIER_ARTICLE` FROM `article` WHERE ID_AUTEUR ='.$id_author)->fetchAll(PDO::FETCH_ASSOC);
?>