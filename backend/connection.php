<?php 
/* Author: Cozy https://github.com/ItsCosmas */
session_start();

// Change port number to your desire based on your mysql installation
// Default port for first time MySQL intallation is 3306
$databaseHost = "mysql:host=127.0.0.1:3306;dbname=cardiovascular_db";
$databaseUser = "cardio_user";
$databasePass = "12345";



try{
    $pdo = new PDO($databaseHost, $databaseUser, $databasePass);
}catch (PDOException $e){
    print "Connection ERROR!: " .$e -> getMessage(). "<br/>";
    die();
}


?>