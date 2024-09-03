<?php
    require_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    use App\Conference\Conference;
    $pdo = Connection::getInstance()->getConnection();
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('Africa/Niamey'));
    $mess = '';
    $code_mess = '';
    $sql = 'SELECT ID_CONF, ID_CHAIR, NOM FROM CONFERENCE';
    $select = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $select_univ = $pdo->query('SELECT * FROM UNIVERSITE')->fetchAll(PDO::FETCH_ASSOC);
    $select_entreprise = $pdo->query('SELECT * FROM ENTREPRISE')->fetchAll(PDO::FETCH_ASSOC);
    $is_exist = false;
    if(!empty($_POST['mail'])){
        $id_conf = htmlspecialchars($_POST['conf']);
        $about_conf = $pdo->query('SELECT ID_CHAIR,NOM FROM CONFERENCE WHERE ID_CONF ='.$id_conf)->fetch(PDO::FETCH_ASSOC);
        $to = htmlspecialchars($_POST['mail']);
        $id_chair = $about_conf['ID_CHAIR'];
        $result = $pdo->query('SELECT NOM FROM CHAIR WHERE ID_CHAIR = '.$id_chair.' ')->fetch(PDO::FETCH_ASSOC);
        $chair_name = $result['NOM'];
        $conf_name = $about_conf['NOM'];
        $verification_code = password_hash(uniqid('confmanager'), PASSWORD_BCRYPT);
        $id_univ = htmlspecialchars($_POST['univ']);
        $id_entreprise = htmlspecialchars($_POST['entreprise']);
        $created_at = htmlspecialchars($_POST['date']);
        $verification_codes = $pdo->query('SELECT EMAIL FROM VERIFICATION_CODE')->fetchAll(PDO::FETCH_ASSOC);
        foreach($verification_codes as $code){
            if($to == $code['EMAIL']){
                $is_exist = true;
            }
        }
        if($is_exist === false){
            if($insert_author = $pdo->prepare('INSERT INTO AUTEUR(ID_AUTEUR,ID_CHAIR,ID_UNIV,ID_ENTREPRISE,NOM,MDP) VALUES (?,?,?,?,?,?)')->execute([null,$id_chair, $id_univ, $id_entreprise,'admin','admin'])){
                $authors = $pdo->query('SELECT ID_AUTEUR FROM AUTEUR')->fetchAll(PDO::FETCH_ASSOC);
                $id_author = (int)$authors[count($authors) - 1]['ID_AUTEUR'];
                if($insert_code = $pdo->prepare('INSERT INTO VERIFICATION_CODE(EMAIL, ID_AUTEUR, VERIFICATION_CODE, CREATED_AT) VALUES (?,?,?,?)')->execute([$to,$id_author, $verification_code, $created_at])){
                    $code_mess = 'The code has been inserted';
                    $subject = 'Assignment to the conference '.$conf_name.'';        
                    $message= "Hello,
    
                    You have been assigned to the conference ".$conf_name." as an author.
                    Please log in with your name and this verification code: ".$verification_code."
    
                    Best regards,
    
                    Co-chair ".$chair_name."";
                    if(@mail($to, $subject, $message))
                    {
                        $mess = 'Mail sent successfully';
                    }
                    else{
                        $mess = 'Error sending the mail';
                    }
                }
            }
        }else{
            $subject = 'Assignment to the conference '.$conf_name.'';        
            $message= "Hello,
        
                    You have been assigned to the conference ".$conf_name." as an author.
                    Please join the platform.
        
                    Best regards,
        
                    Co-chair ".$chair_name."";
            if(@mail($to, $subject, $message))
            {
                $mess = 'Mail sent successfully';
            }
            else{
                $mess = 'Error sending the mail';
            }
        }
    }
?>
