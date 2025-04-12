<?php
session_start();
//1 - include the database connection
include 'dbconnect.php';


if (isset($_GET["ccode"])) { //2 - check if the there is a value from the URL
    //3-Get the values from the GET variable
    $ccode = $_GET['ccode'];
    $username = $_SESSION['username']; //Retrieve the username of the user who is logged


//Search the course if it is already registered or not
$query = "SELECT * FROM studentcourse WHERE ccode = ? AND username = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$ccode, $username]); // 

$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_records = $stmt->rowCount();
//If the course is not yet registered, save the course
if($num_records<=0){
    // 4-Prepare the SQL query with placeholders for the values
    $query = "INSERT INTO studentCourse (username, ccode)
            VALUES (?,?)";
    
    //5- Prepare the statement using the PDO object
    $stmt = $pdo->prepare($query);
    
    //6- Execute the statement with the actual values
    $stmt->execute([$username,$ccode]);
    
    header("Location: user-courses.php"); //redirect to user-courses.php
}
else{
    echo "<script>
        alert('Course already registered');
        window.location.href = 'user-courses.php';
    </script>";
}

}
?>