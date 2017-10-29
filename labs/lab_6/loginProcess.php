<?php

        //print($_POST);
    session_start();
    
    include '../../dbConnection.php';
    $dbConn = getDatabaseConnection();
    
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    
    $sql = "SELECT * FROM tc_admin WHERE username = :username AND password = :password";
    $namedParameters = array();
    $namedParameters[':username'] = $username;
    $namedParameters[':password'] = $password;     
    
    
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
    
    
    if(empty($record))
    {
        echo "wrong username or password!";
    }
    else{
        $_SESSION['username'] = $record['username'];
        $_SESSION['adminFullName'] = $record['firstName']. " " . $record['lastName'];
        header("Location: admin.php");
    }
    
    //echo $password;
    

?>