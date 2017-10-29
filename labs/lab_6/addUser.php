<?php

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include '../../dbConnection.php';
$dbConn = getDatabaseConnection();


function getDepartmentInfo()
{
    global $dbConn;
    $sql = "SELECT * FROM tc_department ORDER BY deptName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    return $records;
}

if(isset($_GET['addUserForm']))
{
    //the admin clicked on the add user button

    $firstName= $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $universityId = $_GET['universityId'];
    $phone = $_GET['phone'];
    $gender =$_GET['gender'];
    $role=$_GET['role'];
    $deptId = $_GET['deptId'];
    
    
    global $dbConn;
    $sql = "INSERT INTO tc_user
            (firstName, lastName, email, universityId, gender, phone, role, deptId)
            VALUES
            (:fName, :lName, :email, :universityId, :gender, :phone, :role, :deptId)";
    $namedParameters = array();
    $namedParameters[':fName'] =  $firstName;
    $namedParameters[':lName'] =  $lastName;
    $namedParameters[':email'] =  $email;
    $namedParameters[':universityId'] =  $universityId;
    $namedParameters[':gender'] = $gender;
    $namedParameters[':phone']  = $phone;
    $namedParameters[':role']   = $role;
    $namedParameters[':deptId'] = $deptId;

        
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    echo "User has been added";
    
    
}
?>

<!DOCTYPE hmtl>

<html>
    <head>
    
</head>
<body>
    <fieldset>
        <legend>Add new User</legend>
        <form>
            First Name: <input type="text" name="firstName" /> <br>
            Last Name: <input type="text" name="lastName" /> <br>
            Email: <input type="text" name="email" /> <br>
            University ID: <input type="text" name="universityId"/> <br>
            Phone: <input type="text" name="phone"/> <br>
             Gender: <input type="radio" name="gender" value="F" id="genderF"/> 
                    <label for="genderF">Female</label>
                    <input type="radio" name="gender" value="M" id="genderM"/> 
                    <label for="genderM">Male</label><br>
            Role: <select name="role">
                <option value=""> Select One</option>
                <option>Faculty</option>
                <option>Student</option>
                <option>Staff</option>
            </select> <br>
            Department: <select name="deptId">
                <option value=""> Select One </option>
                <?php
                    $departments = getDepartmentInfo();
                    foreach($departments as $dept)
                    {
                        echo "<option value='".$dept['deptId']."'>".$dept['deptName']."</option>";
                    }
                ?>
                
            </select> <br>
            <input type="submit" name="addUserForm" value="Add User!"/>
            
        </form>
    </fieldset>
</body>
</html>