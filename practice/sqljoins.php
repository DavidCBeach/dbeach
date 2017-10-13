<?php

$host = 'localhost';//cloud 9
$dbname = 'tcp';
$username ='root';
$password ='';
$dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

function getUsersAndDept()
{
    global $dbConn;
    
    //$sql = "SELECT * FROM `tc_user` INNER JOIN tc_department ON tc_user.deptId = tc_department.departmentId";
    $sql= "SELECT deviceName, firstName, lastName FROM tc_device d INNER JOIN (SELECT firstName, lastName, deviceId FROM tc_user u LEFT JOIN tc_checkout c ON u.userId = c.userId) as wf ON d.deviceId = wf.deviceId AND deviceType='Tablet'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
   $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo $record['firstName'] . '  ' . $record['lastName'] .  '  ' . $record['deviceName'] . "<br />";
        
    }
}



?>
<!DOCTYPE html>

<html>
    <head>
    </head>
    <body>
        <?php
        getUsersAndDept();
        ?>
    </body>
    
</html>