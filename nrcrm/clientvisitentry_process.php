<?php
	session_start();
	//echo $_SESSION['name'];
	include('inc/sessionvalidation.php');
	//db connection helper
	include('inc/dbhelper.php');
	//GET to set the ClientID
	$clientID = addslashes(htmlspecialchars($_GET['id']));
		
	//prepare and clean variables via $_POST
	$visitdate = cleaninput($_POST['visitdate']);
	$visittime = cleaninput($_POST['visittime']);
	$visitlocation = cleaninput($_POST['visitlocation']);
	$visitnotes = cleaninput($_POST['visitnotes']);
	$visitby = cleaninput($_POST['interactionby']);
	
	//connect to database nrcrm and enter the data to tblclientvisits
	connectToDbase('nrcrm');
	//prepare insert statement the insert into database
	$insertvisit = "INSERT INTO tblclientvisit (ClientID, visitid, date, time, location, notes, interactionby) VALUES ('".$clientID."', NULL, '".$visitdate."', '".$visittime."', '".$visitlocation."','".$visitnotes."','".$visitby."')";
	
	$resultvisit = mysql_query($insertvisit);
	
	if ($resultvisit)
		{
			echo mysql_affected_rows()." visit/s entered";
			echo "<br>";
			$visitid = mysql_insert_id(); //visitID
			echo "Visit Identifier is ". $visitid;  ;
		} else {
			echo " there was something wrong with the database entry process.";
		}
		

?>