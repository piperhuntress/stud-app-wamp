<?php
include "dbconnect.php";
 
if(isset($_POST["update"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $studid = $_POST['studid'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $deptid = $_POST['deptid'];
 
// Prepare the SQL query with placeholders for the values
$query = "UPDATE student
SET password = ?, studid = ?, name = ?, mobile = ?, gender = ?, deptid = ?
WHERE username = ?";
 
// Prepare the statement using the PDO object
$stmt = $pdo->prepare($query);
 
// Execute the statement with the actual values, including $username as the last parameter
$stmt->execute([$password, $studid, $name, $mobile, $gender, $deptid, $username]);
 
echo "Record updated successfully!";
header("Location: admin-students.php"); //redirect to students.php
}
?>