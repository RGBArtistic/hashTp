<?php
    include_once 'nav.php' ;
?>

<h1>Inscription</h1>

<form action="traitements/inscription.php" method="POST">
    <input type="text" name="nom" id="nom" placeholder="Nom" pattern='^[a-zA-Z][a-zA-Z-_]{1,25}$' required>
    <input type="text" name="prenom" id="prenom" placeholder="Prénom" pattern='^[a-zA-Z][a-zA-Z-_]{1,25}$' required>
    <input type="email" name="mail" id="mail" placeholder="E-mail" required>
    <input type="password" name="pass" id="pass" placeholder="Mot de passe" pattern='^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$' required>
    <input type="password" name="vpass" id="vpass" placeholder="Vérification" pattern='^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$' required>
    <input type="submit" value="S'inscrire">
</form>

<?php
if(isset($_GET['error']))
{
    echo $_GET['error'] ;
    unset($_GET) ;
}
?>