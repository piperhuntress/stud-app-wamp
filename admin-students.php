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
    <h2>Registered Students</h2>
<?php
//1 - include the database connection
include 'dbconnect.php';
 
//2- Query to fetch all records from the student table
$query="SELECT * FROM student";
$stmt = $pdo->query($query);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_records=$stmt->rowCount(); // Get the number of rows returned by the query
 
//3-Start the HTML table and include the headers
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Username</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Gender</th>
        <th>Department ID</th>
        <th colspan=2>Actions</th>
      </tr>";
 
//4- Loop through the fetched student records and display each record in a row
foreach ($students as $student) {
    echo "<tr>
            <td>    {$student['username']}</td>
            <td>    {$student['studid']}  </td>
            <td>    {$student['name']}    </td>
            <td>    {$student['mobile']}  </td>
            <td>    {$student['gender']}  </td>
            <td>    {$student['deptid']}  </td>
            <td>    <a href='admin-delete-student.php?username={$student['username']}' onclick=\"return confirm('Are you sure you want to delete this student?');\">Delete</a>  </td>
            <td>    <a href='admin-update-student.php?username={$student['username']}'>Update</a> </td>           
          </tr>";
}
echo "</table>";
echo "Number of records = $num_records";

?>

</div>

<?php
include "footer.php";
?>
</body>
</html>