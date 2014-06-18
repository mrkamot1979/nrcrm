<?php
if (isset($_SESSION['name'])) {
	$username = $_SESSION['name'];
	echo "Welcome, " . $_SESSION['name'];
	echo "<br>";
	echo "Logged in? " . $_SESSION['loggedin'];
    echo "<br>";
    echo "<a href=\"nrlogout.php\">Logout</a>";
    } else {
		$returnurl = "Location:login.php?id=notLoggedIn";
		header($returnurl);
		exit;
}





?>