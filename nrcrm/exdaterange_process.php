<?php
  session_start();
  $pagetitle = "Extract by Date";
?>
<html>
<?php
  include('inc/header.php');
  include('inc/sessionvalidation.php');
  include('inc/dbhelper.php');
?>


<?php
 $fromdate = cleaninput($_POST["frmdate"]);
 $todate = cleaninput($_POST["todate"]);


 //use nrstripos to check for malicious code
 nrstripos($_POST);

 //construct query string
$exdaterange ="SELECT 
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
tblclientvisit.date BETWEEN '".$fromdate."' AND '".$todate."' 
AND
tblclientdetails.clientID = tblclientvisit.clientID";


//connect to database
 connectToDbase('nrcrm');
//execute
$exdatesearchresult = mysql_query($exdaterange);
$exnum_result= mysql_num_rows($exdatesearchresult);

if ($exnum_result == 0) {
		echo "<br>There were no results found";
		exit;
	} else { //create the table
			echo "<center><font size='20'><b>$num_result</b> record/s found.</font><br><br>";
            echo "<table border='5'>";
            echo "<tr bgcolor='yellow'>";
            echo "<td align=\"center\">Client ID";
            echo "<td align=\"center\">Company";
            echo "<td align=\"center\">First Name";
            echo "<td align=\"center\">Last Name";
            echo "<td align=\"center\">Date";
            echo "<td align=\"center\">Location";
            echo "<td align=\"center\">Notes";
			echo "<td align=\"center\">Interaction by";
            echo "</tr>";

            for ($i=0; $i < $exnum_result; $i++)
             {
               $row=mysql_fetch_array($exdatesearchresult);
               echo "<tr bgcolor=\"#FFFFFF\" onMouseOver=\"this.bgColor='#FFFF99'\" onMouseOut=\"this.bgColor='#FFFFFF'\"><td>";
               echo htmlspecialchars($row['ClientID']);
               echo "<td>";
               echo htmlspecialchars($row['company']);
               echo "<td>";
               echo htmlspecialchars($row['fname']);
               echo "<td>";
               echo htmlspecialchars($row['lname']);
               echo "<td>";
               echo htmlspecialchars($row['location']);
               echo "<td>";
               echo htmlspecialchars($row['email']);
               echo "</tr>";
             }
             echo "</table></center>";
		}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>


</body>
</html>
