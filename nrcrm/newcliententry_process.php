<?php
	//session validation process 
	session_start();
	//session validation script
	include('inc/sessionvalidation.php');
	//dbhelper for mysql connection
	include('inc/dbhelper.php');
	
//portion where the variables are validated and entered onto mysql using $_POST
	$procfname = cleaninput($_POST['fname']);
	$proclname = cleaninput($_POST['lname']);
	$procaddress = cleaninput($_POST['address']);
	$procgender = cleaninput($_POST['gender']);
	$procemail = cleaninput($_POST['email']);
	$proccompname = cleaninput($_POST['compname']);
	$procusername = cleaninput($_POST['enteredby']);
	
	//function to connect to database
	connectToDbase('nrcrm');
	
	//prepare the insert string
	$insertdata = "INSERT INTO tblclientdetails (ClientID, fname, lname, address, gender, email, company, enteredby) VALUES (NULL, '".$procfname."', '".$proclname."', '".$procaddress."', '".$procgender."', '".$procemail."', '".$proccompname."', '".$procusername."')";
	
	$result=mysql_query($insertdata);
	
	if ($result)
		{
			echo mysql_affected_rows()." client names entered";
			echo "<br>";
			echo "Go <a href=\"welcome.php\">back</a>?";
			echo "<br>";
			$id = mysql_insert_id(); //ClientID
			echo "Enter interaction <a href=\"clientvisitentry.php?id=$id\">details</a>";
		} else {
			echo "there was something wrong with the database entry process.";
		}

?>