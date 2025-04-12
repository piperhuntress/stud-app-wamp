<?php
session_start();
include "dbconnect.php";
 
if(isset($_POST["update"])){
    $cw = $_POST['cw'];
    $me = $_POST['me'];
    $fe = $_POST['fe'];
    $totalMarks = $cw + $me + $fe;
    $ccode = $_SESSION["ccode"];
    $username = $_SESSION["username"];
 
// Prepare the SQL query with placeholders for the values
$query = "UPDATE studentcourse
SET cw = ?, me = ?, fe = ?, totalMarks=?
WHERE ccode = ? and username = ?";
 
// Prepare the statement using the PDO object
$stmt = $pdo->prepare($query);

// Execute the statement with the actual values, including $ccode as the last parameter
$stmt->execute([ $cw, $me, $fe,$totalMarks,$ccode,$username]);
 
echo "Record updated successfully!";
header("Location: admin-student-courses.php?username=$username"); 
}
?>