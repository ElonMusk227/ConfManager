<?php
    require_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    use App\Auteur\Auteur;
    $pdo = Connection::getInstance()->getConnection();
    $mess = '';
    $code_mess = "";
    $is_exist = false;
    $articles = $pdo->query('SELECT ID_ARTICLE, TITLE FROM ARTICLE')->fetchAll(PDO::FETCH_ASSOC);
    $domaines = $pdo->query('SELECT * FROM DOMAINE')->fetchAll(PDO::FETCH_ASSOC);
        $code = password_hash(uniqid('confmanager'),PASSWORD_BCRYPT);
        if(!empty($_POST['mail_relecteur'])){
            $id_chair = $_SESSION['chair']['id'] ?? 1;
            $created_at = $_POST['date'];
            $mail_relecteur = $_POST['mail_relecteur'];
            $id_article = $_POST['article'];
            $id_domaine = $_POST['domaine'];
            $emails = $pdo->query('SELECT EMAIL FROM RELECTEUR')->fetchAll(PDO::FETCH_ASSOC);
            foreach($emails as $mail){
                if($mail_relecteur === $mail['EMAIL']){
                    $is_exist = true;
                }
            }
            if($is_exist === false){
                if($insert_relecteur = $pdo->prepare('INSERT INTO RELECTEUR(ID_RELECTEUR, ID_CHAIR, ID_DOMAINE, NOM, MDP, EMAIL) VALUES (?,?,?,?,?,?)')->execute([null, $id_chair, $id_domaine, 'Admin', 'Admin', $mail_relecteur])){
                    $relecteurs = $pdo->query('SELECT ID_RELECTEUR FROM RELECTEUR')->fetchAll(PDO::FETCH_ASSOC);
                    $id_relecteur = (int)$relecteurs[count($relecteurs) - 1 ]['ID_RELECTEUR'];
                    $assignation = $pdo->prepare('INSERT INTO ASSIGNATION(ID_ASSIGNATION, ID_RELECTEUR, ID_ARTICLE, EMAIL, ASSIGNED_AT) VALUES (?,?,?,?,?)')->execute([null, $id_relecteur, $id_article, $mail_relecteur,  $created_at]);
                    if($insert_code = $pdo->prepare('INSERT INTO VERIFICATION_RELECTEUR(EMAIL, ID_RELECTEUR, VERIFICATION_CODE, ID_ARTICLE, CREATED_AT) VALUES (?,?,?,?,?)')->execute([$mail_relecteur, $id_relecteur, $code, $id_article, $created_at])){
                        $code_mess = 'Code sent successfully';
                        $article = $pdo->query('SELECT TITLE FROM ARTICLE WHERE ID_ARTICLE = '.$id_article)->fetch(PDO::FETCH_ASSOC);
                        $title_article = (string)$article['TITLE'];
                        $subject = 'Assignment to review the article '.$title_article.'';
                        $message= "Hello,
        
                        You have been assigned to review the article ".$title_article." as a reviewer.
                        Please log in with your name and this verification code: ".$code."
        
                        Best regards,
        
                        The co-chair";
                        if(@mail($mail_relecteur, $subject, $message))
                        {
                            $mess = 'Mail sent successfully';
                        }
                        else{
                            $mess = 'Error sending the mail';
                        }
                    }
                }
            }else{
                    $id_relecteur = $pdo->query('SELECT ID_RELECTEUR FROM VERIFICATION_RELECTEUR WHERE EMAIL='.$mail_relecteur)->fetch(PDO::FETCH_ASSOC);
                    $assignation = $pdo->prepare('INSERT INTO ASSIGNATION(ID_ASSIGNATION, ID_RELECTEUR, ID_ARTICLE, EMAIL, ASSIGNED_AT) VALUES (?,?,?,?,?)')->execute([null, $id_relecteur, $id_article, $mail_relecteur]);
                    $article = $pdo->query('SELECT TITLE FROM ARTICLE WHERE ID_ARTICLE = '.$id_article)->fetch(PDO::FETCH_ASSOC);
                    $title_article = (string)$article['TITLE'];
                    $subject = 'Assignment to review the article '.$title_article.'';
                        $message= "Hello,
        
                        You have been assigned to review the article ".$title_article." as a reviewer.
                        Please log in to the platform.
        
                        Best regards,
        
                        The co-chair";
                        if(@mail($mail_relecteur, $subject, $message))
                        {
                            $mess = 'Mail sent successfully';
                        }
                        else{
                            $mess = 'Error sending the mail';
                        }
            }
    }
?>
