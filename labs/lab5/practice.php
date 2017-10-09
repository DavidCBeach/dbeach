<?php




$host = "localhost";
$dbname="tcp";
$username="root";
$password="";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

function userWithanA() { 
    global $dbConn;
    $sql = "SELECT * FROM tc_user WHERE firstName LIKE 'A%'";
    $stmt =  $dbConn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);
    foreach($result as $r)
    {
        echo $r['firstName']. " " . $r['lastName']; 
    }
}
function displayDevice()
{
    global $dbConn;   
    $sql ="SELECT * FROM tc_device WHERE price > 300 AND price < 1000";
     $stmt =  $dbConn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);
    foreach($result as $r)
    {
        echo $r['deviceName']. " " . $r['price'] . "<Br>"; 
    }
}
displayDevice();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>