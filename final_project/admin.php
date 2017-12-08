<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}









include '../dbConnection.php';
$dbConn = getDatabaseConnection();


function displayHistory()
{
   global $dbConn;
    $sql = "SELECT * FROM fp_history ";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    return $records;
}

function displayBeaches(){
    global $dbConn;
    
    $sql = "SELECT * FROM fp_beaches WHERE 1";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($sql);
    echo "<br>";
    
     foreach ($records as $record) {
        
        echo  "<p>".$record['beachName']."</p>" . "<span class='info'>    Sand Type:" . $record['beachType'] . "</span><br><spanclass='info'>      Price:$". $record['price']."</span>";
        if($record['status']=='a')
        {
            echo "   [available]";
        }
        else
        {
            echo "   [unavailable]";
        }
        echo "<br><br>";
    }
}
function displayAverage(){
    global $dbConn;
    
    $sql = "SELECT AVG(price) FROM fp_beaches WHERE 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch();
    echo "$".$record[0];
}
function displayAval(){
    global $dbConn;
    
    $sql = "SELECT * FROM fp_beaches WHERE status = 'a'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($sql);
    echo "<br>";
    
     foreach ($records as $record) {
        
        echo  "<p>".$record['beachName']."</p>" . "<span class='info'>    Sand Type:" . $record['beachType'] . "</span><br><spanclass='info'>      Price:$". $record['price']."</span>";
        if($record['status']=='a')
        {
            echo "   [available]";
        }
        else
        {
            echo "   [unavailable]";
        }
        echo "<br><br>";
    }
}
function displayCount(){
    global $dbConn;
    
    $sql = "SELECT COUNT(beachId) FROM fp_beaches WHERE beachType = 'pebble'";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch();
    echo "<br>";
    echo "Number of pebble beaches: ".$record[0];
      $sql = "SELECT COUNT(beachId) FROM fp_beaches WHERE beachType = 'white sand'";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch();
    echo "<br>";
    echo "Number of white sand beaches: ".$record[0];
      $sql = "SELECT COUNT(beachId) FROM fp_beaches WHERE beachType = 'black sand'";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch();
    echo "<br>";
    echo "Number of black sand beaches: ".$record[0];
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <h1>ADMIN PAGE </h1>
        
        <hr>
        
        
        <form action="addbeach.php">
            <input type="submit" value="Add new beach" />
        </form>
        <form action="deletebeach.php">
            <input type="submit" value="delete a beach" />
        </form>
        
          <form action="logout.php">
            
            <input type="submit" value="Logout" />
            
        </form>
        
        <form onsubmit="changedisplay()">
            Select displayed data:<br><select id ="displayed"name="displayed">
               <option value="">Select One</option>
                <option value="all">All Beaches</option>
                <option value="average">Averge Price</option>
                <option value="types">Number of Types</option>
                <option value="aval">Available Beaches</option>
            </select>
            
        </form>
        <a type="submit" href="#"onclick = "changedisplay()" ><button>display</button></a>
        <div id = "beaches">
            <h3>All Beaches: </h3>
            <?=displayBeaches()?>
        </div>
        <div id = "average">
            <h3>Average Price: </h3>
            <?=displayAverage()?>
        </div>
        <div id = "count">
            <h3>Number of each type of Beach: </h3>
            <?=displayCount()?>
        </div>
        <div id = "available">
            <h3>Available Beaches: </h3>
            <?=displayAval()?>
        </div>
        <h3>
            Purchase History:
        </h3>
        <div
        <?php
        
        $history =displayHistory();
        //print_r($history);
        foreach($history as $histor) {
            echo "<br>".$histor['historyId'] . ')  product#:' . $histor['productId'] . "  " . $histor['purchaseDate'];
        echo"<br>";
        
        }
    
        ?>
        
    </body>
    
</html>
<script>
    document.getElementById("beaches").style.display= "none";
    document.getElementById("average").style.display= "none";
    document.getElementById("count").style.display= "none";
    document.getElementById("available").style.display= "none";
            function changedisplay(){
                document.getElementById("beaches").style.display= "none";
                document.getElementById("average").style.display= "none";
                document.getElementById("count").style.display= "none";
                document.getElementById("available").style.display= "none";
                var e = document.getElementById("displayed")
                console.log(document.getElementById("displayed").options[e.selectedIndex].value);
                if(document.getElementById("displayed").options[e.selectedIndex].value =='all')
                {
                    document.getElementById("beaches").style.display= "block";
                }
                if(document.getElementById("displayed").options[e.selectedIndex].value=='average')
                {
                    document.getElementById("average").style.display= "block";
                }
                if(document.getElementById("displayed").options[e.selectedIndex].value=='types')
                {
                    document.getElementById("count").style.display= "block";
                }
                if(document.getElementById("displayed").options[e.selectedIndex].value=='aval')
                {
                    document.getElementById("available").style.display= "block";
                }
                
            }
        </script>