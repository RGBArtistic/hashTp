<?php
    $dbPsw = 'Sw33tHomeAlabama!';
    $dbUser = 'GalaWeb';
    $dbName = 'tp_login';
    $serverName = 'localhost';
    
    try {
        $dbConnect = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUser, $dbPsw) ;
        $dbConnect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
    }
    catch(PDOException $e) {
        echo 'Connexion Failed : ' . $e->getMessage() ;
    }
?>