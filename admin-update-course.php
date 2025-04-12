<?php
session_start();

//Protect the page
if (!isset($_SESSION['admin']))
    header("Location: login.php"); //Redirect if the user did not login
?>
<?php
include "dbconnect.php";
 
if (isset($_GET["ccode"])) {
    $ccode = $_GET["ccode"];
   
    // Prepare the SQL query to search for the course by ccode
    $query = "SELECT * FROM course WHERE ccode = :ccode";  
    // Prepare the statement using the PDO object
    $stmt = $pdo->prepare($query);  
    // Execute the query with the actual ccode value
    $stmt->execute(['ccode' => $ccode]);  
    // Fetch the result
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!Doctype>
<html>
<head>
<link rel="stylesheet" href="style.css"></link>

</head>
<body>
<?php
include "admin-menu.php";
?>
    <h2>Update Course</h2>
    <form action="process-update-course.php" method="post">
        <table>
            <tr>
                <td>Course Code</td>
                <td><input type="text" name="ccode" value="<?php echo $course['ccode']; ?>" readonly></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="cdesc" value="<?php echo $course['cdesc']; ?>"></td>
            </tr>			
            <tr>
                <td>Credit</td>
                <td><input type="number" name="credit" value="<?php echo $course['credit']; ?>"></td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                <select name="deptid">
                        <option value="1" <?php echo ($course['deptid'] == 1) ? 'selected' : ''; ?>">Information Technology</option>
                        <option value="2" <?php echo ($course['deptid'] == 2) ? 'selected' : ''; ?>">Business Administration</option>
                        <option value="3" <?php echo ($course['deptid'] == 3) ? 'selected' : ''; ?>">Engineering</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="update"></td>
            </tr>
        </table>
    </form>
    <?php
include "footer.php";
?>
</body>
</html>