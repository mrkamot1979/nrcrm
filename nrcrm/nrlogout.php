<?php
 // you have to open the session first 
 session_start();
 
 //remove all the variables in the session 
 session_unset();
 // destroy the session
 $logoutconfirm = session_destroy();

 if ($logoutconfirm) {
		echo "Logout confirmed!";
	}
 ?>

 <html>
 <head><title>Logout page</title></head>
 <body>
 <p>Go back to <a href="login.php">login</a> page.</p>


 </body>


 </html>