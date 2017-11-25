        <?php 


include '../../dbConnection.php';
$conn = getDatabaseConnection();
$search=$_GET['search'];
$sql="SELECT COUNT(placeName) FROM h5_db WHERE placeName = '$search'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetch();
echo $records[0];
return $records[0];

?>