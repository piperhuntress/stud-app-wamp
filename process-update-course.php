<?php
include "dbconnect.php";
 
if(isset($_POST["update"])){
    $ccode = $_POST['ccode'];
    $cdesc = $_POST['cdesc'];
    $credit = $_POST['credit'];
    $deptid = $_POST['deptid'];
 
// Prepare the SQL query with placeholders for the values
$query = "UPDATE course
SET cdesc = ?, credit = ?, deptid = ?
WHERE ccode = ?";
 
// Prepare the statement using the PDO object
$stmt = $pdo->prepare($query);

// Execute the statement with the actual values, including $ccode as the last parameter
$stmt->execute([ $cdesc, $credit, $deptid,$ccode]);
 
echo "Record updated successfully!";
header("Location: admin-courses.php"); //redirect to admin-courses.php
}
?>