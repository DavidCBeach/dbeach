<?php 


include '../../dbConnection.php';
$conn = getDatabaseConnection();
$search=$_GET['search'];
$sql="SELECT time FROM h5_db WHERE placeName = '$search'";
 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    $returnn = "";

    foreach ($records as $record) {
        $returnn .= $record['time'] . "<br />";

    }
    print_r( $returnn);
  ?>