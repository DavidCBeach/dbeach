<?php


function getDatabaseConnection(){
    
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $dbname="heroku_c95c62d6327a93c";
    $username="bc1caf57472822";
    $password="55c0d40e";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
    
}




?>