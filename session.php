<?php
    include_once 'nav.php' ;
    if(!isset($_SESSION['prenom']))
    {
        header('Location: login.php') ;
    }
?>

<h1>Espace privé</h1>

<?php echo "Hello {$_SESSION['prenom']}" ;