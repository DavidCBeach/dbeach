<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}









include '../../dbConnection.php';
$dbConn = getDatabaseConnection();


function displayUsers()
{
   global $dbConn;
    $sql = "SELECT * FROM tc_user ";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    return $records;
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1> TCP ADMIN PAGE </h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>!</h2>
        
        <hr>
        
        
        <form action="addUser.php">
            <input type="submit" value="Add new User" />
             </form>
        
          <form action="logout.php">
            
            <input type="submit" value="Logout" />
            
        </form>

        <?php
        
        $users =displayUsers();
        
        foreach($users as $user) {
            
            echo $user['userId'] . '  ' . $user['firstName'] . "  " . $user['lastName'];
            echo "[<a href='updateUser.php?userId=".$user['userId']."'> Update </a> ]";
            //echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
            echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                     <input type='hidden' name='userId' value='".$user['userId']."' />
                     <input type='submit' value='Delete'>
                  </form>
                ";
            
            echo "<br />";
            
        }
        
        
        
        ?>
        
    </body>
    
</html>