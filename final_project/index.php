
<?php
$host = "us-cdbr-iron-east-05.cleardb.net";
$dbname="heroku_c95c62d6327a93c";
$username="bc1caf57472822";
$password="55c0d40e";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>

<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
        <title>David Beach's Beaches</title>
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <meta name="theme-color" content="#ffffff">
        
    </head>
    <body>
        <h1>David Beach's Beaches</h1>
        <h2>Choose Role:</h2>
        <a href="adminLogin.php" ><button>Admin</button></a>
        <a href="main.php" ><button>User</button></a>
        
        
        
    </body>
</html>