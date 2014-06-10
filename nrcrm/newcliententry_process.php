<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" >
    <link rel="stylesheet" href="css/responsive.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nenu Roldan | Designer</title>
  </head>
  <body>
    <header>
     <a href="landing.php.html" id="logo">
           <h1>Client Interaction Management</h1>  
		<h2>NTMC Foundation</h2>
      </a>
      <nav>
        <ul>
         <li><a href="newcliententry.php">New Client</a></li>
          <li><a href="newinteraction_search.php" class="selected">New Interaction</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        
      </nav>
   
    </header>


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
</body>
</html>