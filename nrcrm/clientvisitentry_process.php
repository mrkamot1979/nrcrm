<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" >
    <link rel="stylesheet" href="css/responsive.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Entry Process</title>
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
          <li><a href="clientvisitentry.php" class="selected">New Interaction</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>
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
</body>
</html>