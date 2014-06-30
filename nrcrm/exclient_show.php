<?php
  session_start();
  $pagetitle = "Extract by Client";
?>
<html>
<?php
  include('inc/header.php');
  include('inc/sessionvalidation.php');
  include('inc/dbhelper.php');
?>
<?php

	$exclientid = cleaninput($_GET['id']);
	
	//create the query string
	$exclientexport = "
	SELECT 
	tblclientdetails.clientID, 
	tblclientdetails.company,
	tblclientdetails.fname, 
	tblclientdetails.lname, 
	tblclientvisit.date, 
	tblclientvisit.location, 
	tblclientvisit.notes, 
	tblclientvisit.interactionby 
	FROM
	tblclientdetails, tblclientvisit 
	WHERE
	tblclientdetails.clientID = '".$exclientid."'
	AND
	tblclientdetails.clientID = tblclientvisit.clientID
	ORDER BY tblclientdetails.clientID
	";
		
	//connect to database and execute the search
	connectToDbase('nrcrm');
	
	$exclientshowtable = mysql_query($exclientexport);
	
	$exclientshownum = mysql_num_rows($exclientshowtable);
	
	if (!$exclientshownum) {
		echo "<center><br><b>No Results found</b></center>";
		exit;
	} else {
		//create a table
		$row=mysql_fetch_array($exclientshowtable);
		echo "<center class=\"h1table\"><font size='20'><b>$exclientshownum</b> interaction/s with " .$row['fname']. " " .$row['lname'].  " found. </font><br><br>";
		echo "<table border='5' style='table-layout: fixed; width: 90%'>";
        echo "<tr bgcolor='yellow'>";
        echo "<td class=\"tblclientid\">Client ID";
        echo "<td style='table-layout: fixed; width: 10%' align=\"center\">Company";
        echo "<td align=\"center\">First Name";
        echo "<td align=\"center\">Last Name";
        echo "<td style='table-layout: fixed; width: 10%' align=\"center\">Date";
        echo "<td align=\"center\">Location";
        echo "<td class=\"tblnotes\">Notes";
		echo "<td align=\"center\">Interaction by";
        echo "</tr>";

            for ($i=0; $i < $exclientshownum; $i++)
             {
               //$row=mysql_fetch_array($exclientshowtable);
               echo "<tr><td align=\"center\">";
               echo htmlspecialchars($row['clientID']);
               echo "<td>";
               echo htmlspecialchars($row['company']);
               echo "<td>";
               echo htmlspecialchars($row['fname']);
               echo "<td>";
               echo htmlspecialchars($row['lname']);
               echo "<td>";
               echo htmlspecialchars($row['date']);
               echo "<td>";
               echo htmlspecialchars($row['location']);
			   echo "<td>";
               echo htmlspecialchars($row['notes']);
			   echo "<td>";
               echo htmlspecialchars($row['interactionby']);
			   echo "</tr>";
			}
			
			echo "</table></center>";
			
		}
		
?>

<br>
<center>
<a href="exclientid_export.php?clientidexport=<?php echo $exclientid;?>"><strong>Export</strong></a>
</center>
			



</body>
</html>