<?php 
 // you have to open the session first 
 session_start(); 
 
 //remove all the variables in the session 
 session_unset(); 
 
 // destroy the session 
 $logoutconfirm = session_destroy();  
 
 if ($logoutconfirm) {
		echo "Logout confirmed!";
		echo $_SESSION['name'];
	}
 ?> 