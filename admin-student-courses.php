<?php
session_start();

//Protect the page
if (!isset($_SESSION['admin']))
    header("Location: login.php"); //Redirect if the user did not login
?>
<!Doctype>
<html>
<head>
    <title>Learn.com-Student Information System</title>
    <link rel="stylesheet" href="style.css"></link>
</head>
<body>
<?php
include "admin-menu.php";
?>

<div class="main">
    <h1>Student Information System</h1>
    <h2>Student Registered Courses</h2>
<?php
include 'dbconnect.php';

$username = $_GET['username'];
$_SESSION['username'] = $username; //assign the value to a session so it can be accessed in other pages

// Query to fetch only the courses that this student has registered for
$query = "
SELECT c.ccode, c.cdesc, c.credit, c.deptid, sc.cw, sc.me,sc.fe,sc.totalMarks
FROM studentCourse sc
JOIN course c ON c.ccode = sc.ccode
WHERE sc.username = ?
";

$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_records = $stmt->rowCount(); // Get number of rows returned

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Course Code</th>
        <th>Course Description</th>
        <th>Credit</th>
        <th>Department</th>
        <th>Course Work</th>       
        <th>Mid Exam</th> 
        <th>Final Exam</th>   
        <th>Total Marks</th>                    
        <th>Action</th>
      </tr>";

foreach ($courses as $course) {
    echo "<tr>
            <td>{$course['ccode']}</td>
            <td>{$course['cdesc']}</td>
            <td>{$course['credit']}</td>
            <td>{$course['deptid']}</td>
            <td>{$course['cw']}</td>  
            <td>{$course['me']}</td>  
            <td>{$course['fe']}</td>  
            <td>{$course['totalMarks']}</td>                                         
            <td><a href='admin-update-marks.php?ccode={$course['ccode']}'>Update Marks</a></td>
          </tr>";
}
echo "</table>";
?>
  
</div>

<?php
include "footer.php";
?>
</body>
</html>