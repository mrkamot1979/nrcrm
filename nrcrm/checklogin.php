<?php
	include('inc/dbhelper.php');
	$urlinvaliduserpwd = "Location:login.php?problem=invalidUserPwd";
	session_start();

	
	//	Validation block.  used the function "cleaninput()" found in inc/dbhelper.php
	$username = cleaninput($_POST['username']);
	$password = cleaninput($_POST['nrpassword']);
		
	connectToDbase('nrcrm');
	
	//prepare query string to find out if the username and password is present in the database
	
	$checkstring="SELECT * from tblusers WHERE username = '".$username."' AND password = '".$password."'";
    
    $result=mysql_query($checkstring);
    
    $num_result=mysql_num_rows($result);

    if ($num_result == 0){
						header($urlinvaliduserpwd);
						exit;      
						 } else {
							$_SESSION['name'] = $username; 
							$_SESSION['loggedin'] = "Yes";
							$urlcorrect = "Location:landing.php";
							header($urlcorrect);
							exit;
						}
	
?>


