<!DOCTYPE html>
<?php
session_start();
$pagetitle = "New Client Entry";

?>
<html>
<?php
require_once('inc/phpmailer/class.phpmailer.php');
include('inc/header.php');
include('inc/sessionvalidation.php');
include('inc/dbhelper.php');
?>


<?php
//portion where the variables are validated and entered onto mysql using $_POST
	
	
	checkIfBlank($_POST);
	
	$procfname = cleaninput($_POST['fname']);
	$proclname = cleaninput($_POST['lname']);
	$procaddress = cleaninput($_POST['address']);
	$procgender = cleaninput($_POST['gender']);
	$procemail = cleaninput($_POST['email']);
	$proccompname = cleaninput($_POST['compname']);
	$procusername = cleaninput($_POST['enteredby']);
	
	//code block to check if they entered a valid email address using the PHPMailer's validateEmail function
	$mail = new PHPMailer();
	if (!$mail->ValidateAddress($procemail)) {
		echo "<br><center>Please enter a valid email address.  Use the browser's back button to go to the previous page.</center>";
		exit;
	}



    //this function is housed in the inc/dbhelper.php file.  this is used to prevent malicious code.
    nrstripos($_POST);
	//function to connect to database
	connectToDbase('nrcrm');

	//prepare the insert string
	$insertdata = "INSERT INTO tblclientdetails (ClientID, fname, lname, address, gender, email, company, enteredby) VALUES (NULL, '".$procfname."', '".$proclname."', '".$procaddress."', '".$procgender."', '".$procemail."', '".$proccompname."', '".$procusername."')";

	$result=mysql_query($insertdata);

	if ($result)
		{
			echo mysql_affected_rows()." client names entered";
		   	$id = mysql_insert_id(); //ClientID
            echo "<br>";
			echo "Enter interaction <a href=\"clientvisitentry.php?id=$id\">details</a>";
		} else {
			echo "there was something wrong with the database entry process.";
		}

?>
</body>
</html>