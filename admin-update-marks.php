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
    $_SESSION["ccode"] = $ccode;
    $username = $_SESSION["username"];
    $query = "
    SELECT c.ccode, c.cdesc, c.credit, c.deptid, sc.cw, sc.me,sc.fe,sc.totalMarks
    FROM studentCourse sc
    JOIN course c ON c.ccode = sc.ccode
    WHERE sc.username = ?
    ";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
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
    <h2>Update Student Marks</h2>
    <form action="process-update-marks.php" method="post">
        <table>
            <tr>
                <td>Course Code</td>
                <td><input type="text" name="ccode" value="<?php echo $course['ccode']; ?>" readonly></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="cdesc" value="<?php echo $course['cdesc']; ?>" readonly></td>
            </tr>			
            <tr>
                <td>Course Work</td>
                <td><input type="number" name="cw" value="<?php echo $course['cw']; ?>"></td>
            </tr>
            <tr>
                <td>Midterm Exam</td>
                <td><input type="number" name="me" value="<?php echo $course['me']; ?>"></td>
            </tr>    
            <tr>
                <td>Final Exam</td>
                <td><input type="number" name="fe" value="<?php echo $course['fe']; ?>"></td>
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