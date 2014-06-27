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
<!--?php echo session_id() ;?--> 
<div id="wrapper">
<center>
<h1 class="h1table">Interaction Entry Form</h1>
<form method="POST" action="clientvisitentry_process.php?id=<?php echo $clientID; ?>">					
		
		<table border="2" id="wrapper">
			<tr>
			<th>
			<label for="visitdate">Date</label>
			</th>
			<td>
			<input type="text" name="visitdate" id="visitdate" size="60">
			</td>
			</tr>
					
			<tr>
			<th>
			<label for="visittime">Time</label>
			</th>
			<td>
			<input type="text" name="visittime" id="visittime" size="60">
			</td>
			</tr>
					
			<tr>
			<th>
			<label for="visitlocation">Location</label>
			</th>
			<td>
			<input type="text" name="visitlocation" id="visitlocation" size="60">
			</td>
			</tr>		
					
					
					
			<tr>
			<th>
			<label for="visitnotes">Visit Notes</label>
			</th>
			<td>
			<textarea name="visitnotes" id="visitnotes" style="width: 250px; height: 160px;"></textarea>
			</td>
			</tr>
		</table>	

	
<br>
			<input type="hidden" name="interactionby" value="<?php echo $username; ?>">
			<input type="submit" value="Submit">				
			</form>
</center>
</div>
</body>
</html>