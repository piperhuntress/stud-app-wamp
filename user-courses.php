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
<h1>Courses</h1>
<?php
include "footer.php";
?>
</body>
</html>