<?php
    include_once 'nav.php' ;
?>

<h1>Connexion</h1>

<form action="traitements/login.php" method="POST">
    <input type="email" name="mail" id="mail" placeholder="E-mail" required>
    <input type="password" name="pass" id="pass" placeholder="Mot de passe" required>
    <input type="submit" value="Se connecter">
</form>

<?php 
if(isset($_GET['error']))
{
    echo $_GET['error'] ;
    unset($_GET) ;
} ?>