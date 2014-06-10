<html>
<head 
<meta charset="utf-8">
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" >
    <link rel="stylesheet" href="css/responsive.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Interaction</title>
</head>
<header>
     <a href="login.php" id="logo">
        <h1>Client Management System</h1>  
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
	//GET to get the ClientID
	$clientID = $_GET['id'];
?>

<!-- form section starts here-->
<body>
<!--?php echo session_id() ;?--> 
<center>
<h1>Client Visit Entry Form</h1>
<form method="POST" action="clientvisitentry_process.php?id=<?php echo $clientID; ?>">					
		
		<table border="2">
			<tr>
			<th>
			<label for="visitdate">Date</label>
			</th>
			<td>
			<input type="text" name="visitdate" id="visitdate">
			</td>
			</tr>
					
			<tr>
			<th>
			<label for="visittime">Time</label>
			</th>
			<td>
			<input type="text" name="visittime" id="visittime">
			</td>
			</tr>
					
			<tr>
			<th>
			<label for="visitlocation">Location</label>
			</th>
			<td>
			<input type="text" name="visitlocation" id="visitlocation">
			</td>
			</tr>		
					
					
					
			<tr>
			<th>
			<label for="visitnotes">Visit Notes</label>
			</th>
			<td>
			<textarea name="visitnotes" id="visitnotes"></textarea>
			</td>
			</tr>
		</table>	
			<br>
			
			<input type="hidden" name="interactionby" value="<?php echo $username; ?>">
			<input type="submit" value="Submit">				
			</center>
</form>

</body>
</html>