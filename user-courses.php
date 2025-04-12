<?php
session_start();
//Protect the page
if (!isset($_SESSION['username']))
    header("Location: login.php"); //Redirect if the user did not login
?>
<!Doctype>
<html>
<head>
<link rel="stylesheet" href="style.css"></link>

</head>
<body>
<?php
include "user-menu.php";
?>
<div>
<h3><?php echo "Welcome:". $_SESSION['username'];?></h3>
   
        <h2>List of Courses</h1>
       
<?php
//1 - include the database connection
include 'dbconnect.php';
 
//2- Query to fetch all records from the course table
$query="SELECT * FROM course";
$stmt = $pdo->query($query);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_records=$stmt->rowCount(); // Get the number of rows returned by the query
 
//3-Start the HTML table and include the headers
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Course Code</th>
        <th>Course Description</th>
        <th>Credit</th>
        <th>Department</th>
        <th colspan=2>Actions</th>
      </tr>";
 
//4- Loop through the fetched course records and display each record in a row
foreach ($courses as $course) {
    echo "<tr>
            <td>    {$course['ccode']}</td>
            <td>    {$course['cdesc']}  </td>
            <td>    {$course['credit']}  </td>
            <td>    {$course['deptid']}  </td>
            <td>    <a href='user-register-course.php?ccode={$course['ccode']}'>Register Course</a>  </td>
          </tr>";
}
echo "</table>";

?>    
</div>
<div>
<?php
include 'dbconnect.php';

$username = $_SESSION['username'];

// Query to fetch only the courses that this student has registered for
$query = "
SELECT c.ccode, c.cdesc, c.credit, c.deptid
FROM studentCourse sc
JOIN course c ON c.ccode = sc.ccode
WHERE sc.username = ?
";

$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_records = $stmt->rowCount(); // Get number of rows returned

echo "<h2>My Registered Courses</h2>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Course Code</th>
        <th>Course Description</th>
        <th>Credit</th>
        <th>Department</th>
        <th>Action</th>
      </tr>";

foreach ($courses as $course) {
    echo "<tr>
            <td>{$course['ccode']}</td>
            <td>{$course['cdesc']}</td>
            <td>{$course['credit']}</td>
            <td>{$course['deptid']}</td>
            <td><a href='user-delete-course.php?ccode={$course['ccode']}' onclick=\"return confirm('Are you sure you want to delete this course?');\">Delete Course</a></td>
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