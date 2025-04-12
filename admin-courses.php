<!Doctype>
<html>
<head>
<link rel="stylesheet" href="style.css"></link>

</head>
<body>
<?php
include "admin-menu.php";
?>
    <h2>Add New Course</h2>
    <form action="addCourse.php" method="post">
        <table>
            <tr>
                <td>Course Code</td>
                <td><input type="text" name="ccode"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="cdesc"></td>
            </tr>			
            <tr>
                <td>Credit</td>
                <td><input type="number" name="credit"></td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="deptid">
                        <option value="1">Information Technology</option>
                        <option value="2">Business Administration</option>
                        <option value="3">Engineering</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save" name="save"></td>
            </tr>
        </table>
    </form>
    <div>
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
            <td>    <a href='admin-delete-course.php?ccode={$course['ccode']}' onclick=\"return confirm('Are you sure you want to delete this course?');\">Delete</a>  </td>
            <td>    <a href='admin-update-course.php?ccode={$course['ccode']}'>Update</a> </td>           
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