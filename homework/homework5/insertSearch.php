<?php 

date_default_timezone_set('America/Los_Angeles');
include '../../dbConnection.php';
$conn = getDatabaseConnection();
$datetime = date("m/d/Y h:i:sa");
echo $datetime;
$search=$_GET['search'];
$sql="INSERT INTO h5_db(placeName,time) VALUES ('$search','$datetime')";
$conn->query($sql);


?>