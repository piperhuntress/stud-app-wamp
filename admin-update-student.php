<?php
include "dbconnect.php";
 
if (isset($_GET["username"])) {
    $username = $_GET["username"];
   
    // Prepare the SQL query to search for the student by username
    $query = "SELECT * FROM student WHERE username = :username";  
    // Prepare the statement using the PDO object
    $stmt = $pdo->prepare($query);  
    // Execute the query with the actual username value
    $stmt->execute(['username' => $username]);  
    // Fetch the result
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Learn.com-Student Information System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Student Information System</h1>
    <h2>Update Student</h2>
    <form action="process-update-student.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $student['username']; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $student['password']; ?>"></td>
            </tr>
            <tr>
                <td>Student ID</td>
                <td><input type="text" name="studid" value="<?php echo $student['studid']; ?>"></td>
            </tr>			
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $student['name']; ?>"></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="number" name="mobile" value="<?php echo $student['mobile']; ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                <input type="radio" name="gender" value="male" <?php echo ($student['gender'] == 'male') ? 'checked' : ''; ?>> Male
                <input type="radio" name="gender" value="female" <?php echo ($student['gender'] == 'female') ? 'checked' : ''; ?>> Female                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="deptid">
                        <option value="1" <?php echo ($student['deptid'] == 1) ? 'selected' : ''; ?>">Information Technology</option>
                        <option value="2" <?php echo ($student['deptid'] == 2) ? 'selected' : ''; ?>">Business Administration</option>
                        <option value="3" <?php echo ($student['deptid'] == 3) ? 'selected' : ''; ?>">Engineering</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="update"></td>
            </tr>            
        </table>
    </form>

</body>
</html>

