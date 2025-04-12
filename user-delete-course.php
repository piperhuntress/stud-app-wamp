<?php
session_start();

//Protect the page
if (!isset($_SESSION['username']))
    header("Location: login.php"); //Redirect if the user did not login
?>
<?php
//1 - include the database connection
include 'dbconnect.php';
 
if (isset($_GET["ccode"])) {//2 - check if there is value for the course code from the URL
    //3-Retrieve the value and assign to a variable
    $ccode = $_GET['ccode'];
    //4-Create the query
    $query="DELETE FROM studentcourse WHERE ccode = ?";
    //5-Prepare the query
    $stmt = $pdo->prepare($query);
    //6-Execute the query
    $stmt->execute([$ccode]);
 
    header("Location: user-courses.php"); //redirect to user-courses.php
}
?>