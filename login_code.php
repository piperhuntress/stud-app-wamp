<?php
session_start();
include "dbconnect.php"; 
 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the query
    $query="SELECT * FROM student WHERE username = ? AND password = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        // Login successful
        $_SESSION['username'] = $user['username']; //Assign the username to a SESSION variable
        header("Location: user-home.php"); // redirect to user home page
    } elseif($username=="admin" and $password="admin12345") {
        $_SESSION['admin'] = 1; //Set the SESSION variable as flag to know if it is admin login  
        header("Location: admin-home.php"); // redirect to user home page
    }else{
        header("Location: login.php?error=1"); // redirect login page 
    }
}
?>
