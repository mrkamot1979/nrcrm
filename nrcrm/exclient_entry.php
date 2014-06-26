<?php
	session_start();
	$pagetitle = "Extract by Client"; 
?>
<html>
<?php 
	include('inc/header.php');
	include('inc/sessionvalidation.php');
?>
<div id="wrapper">
<center>
	<form action="exclient_process.php" id="extractclientsearchform" method="POST">
		<h1 class="h1table">Enter Search Type and Search Term</h1>
		<table>
		<tr>
			<th><label for="exsearchtype">Search Type</label></th>
			<td>
				<select name="exsearchtype">
				  <option value="null">--Choose a Search Type--</option>
				  <option value="fname">First Name</option>
				  <option value="lname">Last Name</option>
				  <option value="company">Company</option>
				  <option value="email">Email</option>
				</select>
			</td>
		</tr>

	<tr>
		<th><label for="exsearchterm">Search Term</label></th>
		<td><input type="text" name="exsearchterm" id="exsearchterm">
	</tr>
	</table>
	<br>
	<input type="submit" value="Search">
	</form>
</center>
</div>

</body>

</html>	