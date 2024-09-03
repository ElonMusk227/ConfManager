<?php
    require_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;

    $pdo = Connection::getInstance()->getConnection();
    $error = '';

    $query = 'SELECT nom, mdp FROM CHAIR WHERE ID_CHAIR = 1';
    $select = $pdo->query($query);
    $result = $select->fetch(PDO::FETCH_ASSOC);

    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);

        if ($name === $result['nom'] && $password === $result['mdp']) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['chair'] = [
                'nom' => $result['nom'],
                'mdp' => $result['mdp']
            ];
            header('Location: index.php');
        } else {
            $error = 'Incorrect username or password';
        }
    }
?>
