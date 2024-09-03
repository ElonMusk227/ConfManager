<?php
require_once __DIR__.'\vendor\autoload.php';
use App\Connection\Connection;

$pdo = Connection::getInstance()->getConnection();
$message = ''; 

$selects = $pdo->query('SELECT * FROM VERFICATION_RELECTEUR')->fetchAll(PDO::FETCH_ASSOC);

if (!empty($_POST['email']) && !empty($_POST['verification_code'])) {
    $email = htmlspecialchars($_POST['email']);
    $verification_code = htmlspecialchars($_POST['verification_code']);
    $valid = false;

    foreach ($selects as $select) {
        if ($email === $select['EMAIL'] && $verification_code === $select['VERIFICATION_CODE']) {
            $valid = true;
            $relector_id = $select['ID_RELECTEUR'];
            $article_id = $select['ID_ARTICLE'];
            
            // Start a session and store necessary information
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['relector'] = [
                'relector_id' => $relector_id,
                'article_id' => $article_id
            ];
            
            header('Location: relector_register.php');
            exit();
        }
    }

    if (!$valid) {
        $message = 'Incorrect or expired verification code';
    }
} else {
    $message = 'Please fill in all fields.';
}
?>
