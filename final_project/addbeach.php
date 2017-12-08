
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
    <body>
        <a href='admin.php'><button>Back to Admin Page</button></a>
        <div class = "outer">
        <form>
            Beach: <input type="text" id ="beachName" name="beachName" placeholder="Beach Name"/>
            Type: 
            <select id="beachType"name="beachType">
               <option value="">Select One</option>
                <option value="white sand">white sand</option>
                <option value="black sand">black sand</option>
                <option value="pebble">pebble</option>
            </select>
            Price: <input type="text" id = "price" name="price" placeholder="price"/>
           <input type="submit"  value="Add" name="submit" >
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
    $sql = "INSERT INTO `fp_beaches` (`beachId`, `beachName`, `beachType`, `price`, `status`) VALUES (NULL, '".$_GET['beachName']."', '".$_GET['beachType']."', '".$_GET['price']."', 'a');";
    //echo $sql;
    $namedParameters = array();
    $conn->query($sql);

}
   

?>