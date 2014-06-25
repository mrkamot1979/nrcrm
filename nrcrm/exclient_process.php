
<?php
	session_start();
	$pagetitle = "Extract by Client"; 
?>
<html>
<?php 
	include('inc/header.php');
	include('inc/sessionvalidation.php');
	include('inc/dbhelper.php');
	
	$exsearchtype = cleaninput($_POST['exsearchtype']);
	$exsearchstring = cleaninput($_POST['exsearchterm']);
	
	if ($exsearchtype == "" OR $exsearchstring == "") {
		echo "<br><center><b>Search Type</b> and <b>Search Term</b> must be entered.<br>Please try again by clicking on Extract By Client in the top right portion of the Header.</center>";
		exit;
	} else {
		//use the nrstripos to prevent malicious code
		nrstripos($_POST);
	}
	
	//build the search string, connect to the database and execute the search.
	$exclientsearch = "SELECT * from tblclientdetails
    WHERE ".$exsearchtype."
    LIKE '%".$exsearchstring."%'
    ORDER BY clientID";
	
	connectToDbase('nrcrm');
	
	/*
        code block below searches the database, checks if there are results to the search and
        sticks the results into a table.
    */
    $exclientsearchresult = mysql_query($exclientsearch);
    $exclientnum_result= mysql_num_rows($exclientsearchresult);

    if ($exclientnum_result == 0){
      echo "No records found.  Please try again.";
      exit;
    }
    else
    {
			echo "<center><font size='20'><b>$exclientnum_result</b> record/s found.</font><br><br>";
            echo "<table border='5' style='table-layout: fixed; width: 80%'>";
            echo "<tr bgcolor='3366CC'>";
            echo "<td class=\"tblclientid\">Client ID";
            echo "<td align=\"center\">Company";
            echo "<td align=\"center\">First Name";
            echo "<td align=\"center\">Last Name";
            echo "<td align=\"center\">Address";
            echo "<td align=\"center\">Gender";
            echo "<td align=\"center\" style=\"word-wrap: break-word\">Email";
            echo "</tr>";

            for ($i=0; $i < $exclientnum_result; $i++)
             {
               $row=mysql_fetch_array($exclientsearchresult);
               echo "<tr bgcolor=\"#FFFFFF\" onMouseOver=\"this.bgColor='#B2CCFF'\" onMouseOut=\"this.bgColor='#FFFFFF'\"><td>";
			   
			   $id=htmlspecialchars($row['ClientID']);
               echo "<a href=\"exclient_show.php?id=$id\">";
			   echo htmlspecialchars($row['ClientID']);
			   echo "</a>";
               //echo "&nbsp;&nbsp;&nbsp;<a href='clientvisitentry.php?id=$id'>Extract</a>";
               echo "<td>";
               echo htmlspecialchars($row['company']);
               echo "<td>";
               echo htmlspecialchars($row['fname']);
               echo "<td>";
               echo htmlspecialchars($row['lname']);
               echo "<td>";
               echo htmlspecialchars($row['address']);
               echo "<td >";
               echo htmlspecialchars($row['gender']);
               echo "<td align=\"center\" style=\"word-wrap: break-word\">";
               echo htmlspecialchars($row['email']);
               echo "</tr>";
             }
             echo "</table></center>";
       }
	
	
	
	



	

	
?>



</body>
</html>