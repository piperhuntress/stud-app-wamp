<?php
session_start();

//Protect the page
if (!isset($_SESSION['admin']))
    header("Location: login.php"); //Redirect if the user did not login
?>
<?php
//1 - include the database connection
include 'dbconnect.php';
 
if (isset($_GET["ccode"])) {//2 - check if there is value for the username from the URL
    //3-Retrieve the value and assign to a variable
    $ccode = $_GET['ccode'];
    //4-Create the query
    $query="DELETE FROM course WHERE ccode = ?";
    //5-Prepare the query
    $stmt = $pdo->prepare($query);
    //6-Execute the query
    $stmt->execute([$ccode]);
 
    echo "Record added successfully!";
    header("Location: admin-courses.php"); //redirect to admin-courses.php
}
?>