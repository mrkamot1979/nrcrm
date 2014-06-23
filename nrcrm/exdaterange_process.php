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

//if block to check if entries are blank.
if($fromdate == "" OR $todate == "") {
	echo "<br><center><b>From Date and To Date are required.  Please try again.</b></center>";
	exit;
}
 
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
tblclientdetails.clientID = tblclientvisit.clientID
ORDER BY tblclientdetails.clientID
";


//connect to database
 connectToDbase('nrcrm');
//execute
$exdatesearchresult = mysql_query($exdaterange);
$exnum_result= mysql_num_rows($exdatesearchresult);

if ($exnum_result == 0) {
		echo "<br>There were no results found";
		exit;
	} else { //create the table
			echo "<center><font size='20'><b>$exnum_result</b> record/s found.</font><br><br>";
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

            for ($i=0; $i < $exnum_result; $i++)
             {
               $row=mysql_fetch_array($exdatesearchresult);
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
<!-- date1 and date 2 are used to pass the $fromdate and $todate -->
<br><center><a href="exdaterange_export.php?date1=<?php echo $fromdate; //date1 is used to pass fromdate?>&date2=<?php echo $todate; //date1 is used to pass fromdate?>"><strong>Export</strong></a></center>



</body>
</html>
