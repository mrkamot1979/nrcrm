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
</head>

<?php
session_start();
//echo $_SESSION['name'];
	
include('inc/sessionvalidation.php');
//logout link

?>



</html>