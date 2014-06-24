<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/normalize.css">
<link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/main.css" >
<link rel="stylesheet" href="css/responsive.css" >
<title>Login</title>
</head>

 <header>
     <a href="login.php" id="logo">
        <h1>Client Interaction Management</h1>  
		<h2>NTMC Foundation</h2>
     </a>


    </header>

<body>
    <div id="wrapper">
    <?php
	
		/*validation script to find out if the user has logged in or not, before going to this page.
		If the user has not logged in and this is her/his first visit, the mechanism will know and display 
		the page / error message (if there is any) accordingly.
		*/
		@$problem = $_GET["problem"];
		$errormsg = "<center><h1><font color='red'> ERROR:</h1>";
		if ($problem == "invalidUserPwd") {$errormsg = $errormsg . " Invalid Username/Password";}
		if ($problem == "notLoggedIn") {$errormsg = $errormsg . " Not logged in";}
		$errormsg = $errormsg. "</center></font>";
		if ($problem != "") {print($errormsg);}
	?>
	
	<center>
	<form name="loginform" id="loginform" method="POST" action="checklogin.php">
      <input type="text" name="username"><br>
      <input type="password" name="nrpassword">
      <br>
      <input type="submit" value="Login" name="loginButton">
      
    </form>
    </center>
    </div>
  </body>


</html>