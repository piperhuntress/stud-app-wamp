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
    <form action="" method="post">
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
    <?php
include "footer.php";
?>
</body>
</html>