<?php
//1 - include the database connection
include 'dbconnect.php';
 
if (isset($_POST["save"])) { //2 - check if the register button has been clicked
    //3-Get the values from the POST variable
    $ccode = $_POST['ccode'];
    $cdesc = $_POST['cdesc'];
    $credit = $_POST['credit'];
    $deptid = $_POST['deptid'];
// 4-Prepare the SQL query with placeholders for the values
$query = "INSERT INTO course (ccode, cdesc, credit, deptid)
          VALUES (?, ?, ?, ?)";
 
//5- Prepare the statement using the PDO object
$stmt = $pdo->prepare($query);
 
//6- Execute the statement with the actual values
$stmt->execute([$ccode, $cdesc, $credit, $deptid]);
 
echo "Record added successfully!";
header("Location: admin-courses.php"); //redirect to admin-courses.php
}
?>