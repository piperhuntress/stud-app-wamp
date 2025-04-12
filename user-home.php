<?php
session_start();

//Protect the page
if (!isset($_SESSION['username']))
    header("Location: login.php"); //Redirect if the user did not login
?>
<!Doctype>
<html>
<head>
    <title>Learn.com-Student Information System</title>
    <link rel="stylesheet" href="style.css"></link>
</head>
<body>
<?php
include "user-menu.php";
?>

<div class="main">
    <h3><?php echo "Welcome:". $_SESSION['username'];?></h3>
    <img src="home.png" class="home-img"><br/>
</div>

<?php
include "footer.php";
?>
</body>
</html>