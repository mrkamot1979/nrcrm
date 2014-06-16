<?php
  session_start();
  $pagetitle = "New Interaction";
?>
<html>
<?php
  include('inc/header.php');
  include('inc/sessionvalidation.php');
  include('inc/dbhelper.php');
?>
<?php
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