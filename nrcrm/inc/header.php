<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/normalize.css">
<link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/main.css" >
<link rel="stylesheet" href="css/responsive.css" >
<title><?php echo $pagetitle; ?></title>
</head>
<body>
 <header>
     <a href="landing.php" id="logo">
        <h1>Client Interaction Management</h1>  
		<h2>NTMC Foundation</h2>
		<nav>
        <ul>
          <li><a href="newcliententry.php"<?php if(isset($pagetitle) AND $pagetitle == "New Client Entry") 
		   {
		   echo "class=selected";
		   }?>
		   >New Client</a></li>
          <li><a href="newinteraction_search.php"<?php if(isset($pagetitle) AND $pagetitle == "New Interaction") 
		   {
		   echo "class=selected";
		   }?>
		   >New Interaction</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        
      </nav>
     </a>
    </header>