<?php
	session_start();
	$pagetitle = "New Interaction"; 
?>
<html>
<?php 
	include('inc/header.php');
	include('inc/sessionvalidation.php');
?>
<div id="wrapper">
<center>
	<form action="newinteraction_process.php" id="searchform" method="POST">
		<table>
		<tr>
			<th><label for="searchtype">Search Type</label></th>
			<td>
				<select name="searchtype">
				  <option value="null">--Choose a Search Type--</option>
				  <option value="fname">First Name</option>
				  <option value="lname">Last Name</option>
				  <option value="company">Company</option>
				  <option value="email">Email</option>
				</select>
			</td>
		</tr>

	<tr>
		<th><label for="searchterm">Search Term</label></th>
		<td><input type="text" name="searchterm" id="searchterm">
	</tr>
	</table>
	<br>
	<input type="submit" value="Search">
	</form>
</center>
</div>

</body>

</html>	