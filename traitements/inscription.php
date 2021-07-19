<?php
require '../use/functions.php' ;
require_once '../use/dbconnect.php' ;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_POST['pass'] == $_POST['vpass']) {
            $nom = verifPost($_POST['nom'], '/^[a-zA-Z][a-zA-Z-_]{1,25}$/') ;
            $prenom = verifPost($_POST['prenom'], '/^[a-zA-Z][a-zA-Z-_]{1,25}$/') ;
            $user = verifMail($_POST['mail']) ;
            $pass = verifPost( $_POST['pass'], '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/') ;

            $pass = password_hash($pass, PASSWORD_BCRYPT) ;
            if($nom && $prenom && $user && $pass)
            {
                $arrayBind = array(':user' => $user) ;
                $verif = 'SELECT login FROM utilisateurs WHERE login = :user';
                $data = actionOnDb($verif, $dbConnect, $arrayBind, 'fetch') ;

                if(count($data) == 0) {
                    $arrayBind = array(':nom' => $nom, ':prenom' => $prenom, ':user' => $user, ':pass' => $pass) ;
                    $request = 'INSERT INTO utilisateurs (nom, prenom, login, pass) VALUES (:nom, :prenom, :user, :pass)';
                    actionOnDb($request, $dbConnect, $arrayBind, null) ;
                    header('Location: ../login.php') ;
                } else header('Location: ../inscription.php?error=Utilisateur déjà existant') ;
            } else header('Location: ../inscription.php?error=Veuillez remplir tous les champs') ;
        } else header('Location: ../inscription.php?error=Les mots de passe de correspondent pas') ;
    } else header('Location: ../inscription.php') ;
?>