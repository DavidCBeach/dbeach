<?php







$host = "localhost";
$dbname="tcp";
$username="root";
$password="";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

function displayHistory(){
    global $dbConn;
    $sql = "SELECT * 
            FROM `tc_checkout` 
            NATURAL JOIN tc_device
            NATURAL JOIN tc_user 
            WHERE deviceId = :deviceId";
    
    $namedParam = array(":deviceId"=>$_GET['deviceId']);
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo  $record['firstName'] . " " . $record['lastName'] . "<br />";
        
    }
}







?>





<!DOCTYPE html>
<html>
    <head>
        <title>Checkout History </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <h2> Checkout History </h2>
        
        <?=displayHistory()?>
    </body>
</html>



