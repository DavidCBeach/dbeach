<?php
$host = "us-cdbr-iron-east-05.cleardb.net";
$dbname="heroku_c95c62d6327a93c";
$username="bc1caf57472822";
$password="55c0d40e";
$conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
function getBeachTypes() {
    global $conn;
    $sql = "SELECT DISTINCT(beachType)
            FROM `fp_beaches` 
            ORDER BY beachType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['beachType'] . "</option>";
        
    }
}
function displayBeaches(){
    global $conn;
    
    $sql = "SELECT * FROM fp_beaches WHERE 1";
    
    
    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        
        if (!empty($_GET['beachName'])&&$_GET['beachName']!='') {
         
  
            $sql .= " AND beachName LIKE :beachName"; 
            $namedParameters[':beachName'] = $_GET['beachName'];
         }
         
        if (!empty($_GET['beachType'])&&$_GET['beachType']!='') {
            
            
            $sql .= " AND beachType = :pType"; 
            $namedParameters[':pType'] =   $_GET['beachType'] ;
         }     
         
         if (isset($_GET['available'])&&$_GET['available']!='') {
             $sql .= " AND status = :dAvailability"; 
            $namedParameters[':dAvailability'] =  "a" ;
         }
        
         if (isset($_GET['orderBy']) == name) {
             if($_GET['orderBy'] == asc)
             {
                  $sql .= " ORDER BY beachName";
             }else{
                 $sql .= " ORDER BY beachName DESC";
             }
                   
         }
         
    
        
        
    }
    
    $stmt = $conn->prepare($sql);
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
        echo "<div id= '".$record['beachId']."'></div>";
        echo '<script type="text/javascript">',
     'showlat("'.$record['beachName'].'","'.$record['beachId'].'" );',
     '</script>';
        echo "<br><br>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>David Beach's Beaches</title>

        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
         <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
         <div class = "jumbotron">
        <h1 id="banner">David Beach's Beaches</h1>
        </div>
        <meta name="theme-color" content="#ffffff">
        <script>
        function showlat(search, loc){
            console.log("wowcool");
            console.log(search);
            $.ajax({
            type: "GET",
            url: "https://maps.googleapis.com/maps/api/geocode/json?",
            dataType: "json",
            data:{'address':search,
                'sensor':'false'
            },
            success: function(data,status) {
                var tmp = "#"+loc;
                $(tmp).append("ADDRESS: ");
                if(data['results'][0])
                {
                    for(var value in data['results'][0]['address_components'])
              {
                  
                  console.log(loc);
                  $(tmp).append(data['results'][0]['address_components'][value]['long_name']);
                  console.log(data['results'][0]['address_components'][value]['long_name']);
                  $(tmp).append(" ")
              }
                } else{
                    $(tmp).append("unknown");
                }
              
              

            },
            complete: function(data,status) { //optional, used for debugging purposes
                
                                
            }

        });
        }
             
          
        </script>
    </head>
    <body >
        <form action="logout.php">
            
            <input type="submit" value="Back to Welcome Page" />
            
        </form>
        <div id = "addr"></div>
        <div class = "outer">
        <div id = display>
        <form>
            Beach: <input type="text" name="beachName" placeholder="Beach Name"/>
            Type: 
            <select name="beachType">
               <option value="">Select One</option>
                <?=getBeachTypes()?>
            </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available"> Available </label>
            
            Order by Name:
            <input type="radio" name="orderBy" id="orderByName" value="asc"/> 
             <label for="orderByName"> Asc </label>
            <input type="radio" name="orderBy" id="orderByName" value="desc"/> 
             <label for="orderByName"> Desc </label>
            
            <input type="submit" value="Search!" name="submit" >
        </form>
        
        <hr>
        
        <?=displayBeaches()?>
        </div> <!-- display -->
        </div> <!-- outer -->
    </body>
</html>