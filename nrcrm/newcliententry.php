<?php
session_start();
$pagetitle = "New Client Entry";
?>
<html>
<?php
include('inc/header.php');
//echo $_SESSION['name'];
include('inc/sessionvalidation.php');
//logout link
?>

<!-- form section starts here-->
<div id="wrapper">
<br>
<center>

<h1 class="h1table">New Client Entry Form</h1>
<form method="POST" action="newcliententry_process.php">					
		
		<table border="2" id="wrapper">
			<tr>
			<th>
			<label for="fname">First Name</label>
			</th>
			<td>
			<input type="text" name="fname" id="fname">
			</td>
			</tr>
					
			<tr>
			<th>
			<label for="lname">Last Name</label>
			</th>
			<td>
			<input type="text" name="lname" id="lname">
			</td>
			</tr>
					
			<tr>
			<th>
			<label for="address">Address</label>
			</th>
			<td>
			<textarea name="address" id="address"></textarea>
			</td>
			</tr>
			
			<tr>
			<th>
			<label>Gender</label>
			</th>
			<td align="center">
			<label for="male" style="vertical-align: middle">Male</label><input type="radio" name="gender" style="vertical-align: middle" id="male" value="Male" />
			<label for="female" style="vertical-align: middle">Female</label><input type="radio" style="vertical-align: middle" name="gender" id="female" value="Female" />
			</td>
			</tr>
			
			<tr>
			<th>
			<label for="email">Email</label>
			</th>
			<td>
			<input type="text" name="email" id="email" />
			</td>
			</tr>

			<tr>
			<th>
			<label for="compname">Company</label>
			</th>
			<td>
			<input type="text" name="compname" id="compname" />
			</td>
			</tr>
		</table>	
			<br>
			<input type="hidden" name="enteredby" value="<?php echo $username; ?>">
			<input type="submit" value="Submit">				
			
</form>
</center>
</div>
</body>
</html>