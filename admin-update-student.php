<!DOCTYPE html>
<html>
<head>
    <title>Learn.com-Student Information System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Student Information System</h1>
    <h2>Update Student</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Student ID</td>
                <td><input type="text" name="studid"></td>
            </tr>			
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="number" name="mobile"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                </td>
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
        </table>
    </form>

</body>
</html>

