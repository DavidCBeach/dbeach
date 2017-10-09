<?php




$host = "localhost";
$dbname="tcp";
$username="root";
$password="";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>