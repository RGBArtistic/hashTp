<?php 
    session_start() ;
    require '../use/functions.php' ;
    require_once '../use/dbconnect.php' ;
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = verifMail($_POST['mail']) ;
        $pass = verifPost( $_POST['pass'], '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/') ;

        // $pass = password_hash($pass, PASSWORD_BCRYPT) ;
        if($user && $pass)
        {
            $arrayBind = array(':user' => $user) ;
            $request = 'SELECT login, pass, prenom FROM utilisateurs WHERE login = :user';
            $data = actionOnDb($request, $dbConnect, $arrayBind, 'fetch') ;

            if(count($data) == 1 && password_verify($pass, $data[0]['pass'])) {
                $_SESSION['prenom'] = $data[0]['prenom'] ;
                header('Location: ../session.php') ;
            } else header('Location: ../login.php?error=Mot de passe incorrect ou utilisateur inexistant') ;
        }
        else header('Location: ../login.php?error=Mot de passe incorrect ou utilisateur inexistant') ;
    }
    else header('Location: ../login.php') ;

?>