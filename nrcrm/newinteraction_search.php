<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" >
    <link rel="stylesheet" href="css/responsive.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Interaction Search</title>
 </head>
  <body>
    <header>
     <a href="login.php.html" id="logo">
           <h1>Client Interaction Management</h1>  
		<h2>NTMC Foundation</h2>
      </a>
      <nav>
        <ul>
         <li><a href="newcliententry.php">New Client</a></li>
          <li><a href="newinteraction_search.php" class="selected">New Interaction</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>
	
<?php
	session_start();
	include('inc/sessionvalidation.php');
	
?>
<div id="wrapper">
<center>
<form action="#" id="searchform">
<table border="5" padding="10">
<tr>
	<th><label for="zuktype">Search Type</label></th>
	<td><input type="text" name=zuktype" id="zuktype">
</tr>

<tr>
	<th><label for="zukterm">Search Term</label></th>
	<td><input type="text" name=zukterm" id="zukterm">
</tr>
</table>
<br>
<input type="submit" value="Search">
</form>
</center>
</div>
</body>

</html>	