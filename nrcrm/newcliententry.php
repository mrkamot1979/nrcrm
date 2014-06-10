<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/normalize.css">
<link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/main.css" >
<link rel="stylesheet" href="css/responsive.css" >
<title>New Client Login</title>
</head>

 <header>
     <a href="login.php" id="logo">
        <h1>Client Interaction Management</h1>  
		<h2>NTMC Foundation</h2>
     </a>
	    <nav>
        <ul>
          <li><a href="newcliententry.php" class="selected">New Client</a></li>
          <li><a href="about.html">New Interaction</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>
</head>
<?php
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