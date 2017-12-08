
<!DOCTYPE html>
<html>
    <head>
        <title>David Beach's Beaches</title>

        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
         <div class = "jumbotron">
        <h1 id="banner">David Beach's Beaches</h1>
        </div>
        <meta name="theme-color" content="#ffffff">

    </head>
    <body >
        <a href='admin.php'><button>Back to Admin Page</button></a>
        <div class = "outer">
        <form  >
            Beach: <input type="text" id ="beachName" name="beachName" placeholder="Beach Name"/>
           <input type="submit"  value="Delete" name="submit" >
        </form>
       
        </div> <!-- outer -->
    </body>
</html>
<?php
if(isset($_GET['submit']))
{
     $host = "us-cdbr-iron-east-05.cleardb.net";
    $dbname="heroku_c95c62d6327a93c";
    $username="bc1caf57472822";
    $password="55c0d40e";
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM `fp_beaches` WHERE `beachName` = '".$_GET['beachName']."'";
    echo $sql;
    $namedParameters = array();
    $conn->query($sql);

}
   

?>