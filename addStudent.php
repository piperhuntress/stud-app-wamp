<?php
//1 - include the database connection
include 'dbconnect.php';
 
if (isset($_POST["register"])) { //2 - check if the register button has been clicked
    //3-Get the values from the POST variable
    $username = $_POST['username'];
    $password = $_POST['password'];
    $studid = $_POST['studid'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $deptid = $_POST['deptid'];
// 4-Prepare the SQL query with placeholders for the values
$query = "INSERT INTO student (username, password, studid, name, mobile, gender, deptid)
          VALUES (?, ?, ?, ?, ?, ?, ?)";
 
//5- Prepare the statement using the PDO object
$stmt = $pdo->prepare($query);
 
//6- Execute the statement with the actual values
$stmt->execute([$username, $password, $studid, $name, $mobile, $gender, $deptid]);
 
echo "Record added successfully!";
header("Location:login.php")
}
?>