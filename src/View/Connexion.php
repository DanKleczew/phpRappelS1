<?php


$dns = "mysql:dbname=mabdd;host=107.0.0.1 ";
$username = "root";
$password = "";
try {
    $connexionBDD = new PDO('mysql:host=localhost;dbname=mabdd', $username, $password);
    $connexionBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
} catch (PDOException $e) {
    // tenter de réessayer la connexion après un certain délai, par exemple
}
?>