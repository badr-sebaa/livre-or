<?php 
    
    $host = 'localhost';
    $dbname = 'livreor';
    $login = 'root';
    $password = 'root';

    try 
    {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$login,$password);
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
        