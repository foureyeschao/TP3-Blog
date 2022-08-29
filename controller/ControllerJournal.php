<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Post');
RequirePage::requireModel('User');

//classe de ControllerJournal, Lire les données du modèle de données, afficher le contenu de la page d'accueil

class ControllerJournal
{

    public function index()
    {
        $post = new ModelPost();
        $select = $post->select('id', 'DESC');
        $ip = $_SERVER["REMOTE_ADDR"];
        if($ip == '::1') {
            $ip = '127.0.0.1';
        }
        date_default_timezone_set("America/Toronto");
        $date = date("Y-m-d"); 

        $user = new ModelUser;
        if(isset($_SESSION['user_id'])){
            $userId =  $_SESSION['user_id'];
            $userInfos = $user->selectId($userId);
        }
        else {
            $userInfos = null;
        }
          
        
        
        
        return Twig::render('journal-index.php', ['posts' => $select, 'user' => $userInfos, 'ip' => $ip,'date' => $date]);
    }


    public function error()
    {
        return Twig::render('error.php');
    }
}
