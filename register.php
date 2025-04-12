<!DOCTYPE html>
<html>
<head>
    <title>Learn.com-Student Information System</title>
    <!-- Link to styles.css -->
</head>
<body>
    <h1>Student Information System</h1>
    <h2>Register</h2>
    <form action="addStudent.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" ></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" ></td>
            </tr>
            <tr>
                <td>Student ID</td>
                <td><input type="text"></td>
            </tr>			
            <tr>
                <td>Name</td>
                <td><input type="text" ></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="number" ></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio"> Male
                    <input type="radio"> Female
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select>
                        <option value="1">Information Technology</option>
                        <option value="2">Business Administration</option>
                        <option value="3">Engineering</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register" ></td>
            </tr>
        </table>
    </form>

</body>
</html>

