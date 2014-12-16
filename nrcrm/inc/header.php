<head>
<meta charset="utf-8">

<!-- BEGINNING OF OWN CSS -->
<link rel="stylesheet" href="css/normalize.css">
<link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/main.css" >
<link rel="stylesheet" href="css/responsive.css" >
<!-- END OF OWN CSS -->

<!-- BEGINNING OF JQUERY CSS -->
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <!--jquery javascripts-->
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/resources/demos/style.css">
  <script>
  $(function() {
    $( "#visitdate" ).datepicker({dateFormat: "yy-mm-dd"});
  });
  </script>    
<!-- END OF JQUERY CSS -->


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
          <li><a href="exdaterange_entry.php" <?php if(isset($pagetitle) AND $pagetitle == "Extract by Date") {
            echo "class=selected";
            } ?>>Extract by Date Range</a></li>
			<li><a href="exclient_entry.php" <?php if(isset($pagetitle) AND $pagetitle == "Extract by Client") {
            echo "class=selected";
            } ?>>Extract by Client</a></li>
        </ul>

      </nav>
     </a>
    </header>