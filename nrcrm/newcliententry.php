<?php $pagetitle = "New Client Entry"; ?>
<html>
<?php 
include('inc/header.php');
session_start();
//echo $_SESSION['name'];
include('inc/sessionvalidation.php');
//logout link
?>

<!-- form section starts here-->
<body>
<a href="nrlogout.php">Logout</a>
<br>
<center>

<h1>Test Entry Form</h1>
<form method="POST" action="newcliententry_process.php">					
		
		<table border="2">
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
			<td>
			<input type="radio" name="gender" id="male" value="Male" />
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="Female" />
			<label for="female">Female</label>
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
			</center>
</form>

</body>
</html>