<?php
  session_start();
  $pagetitle = "New Interaction";
?>
<html>
<?php
  include('inc/header.php');
  include('inc/sessionvalidation.php');
  include('inc/dbhelper.php');
?>

<?php
	$searchtype = cleaninput($_POST['searchtype']);
	$searchterm = cleaninput($_POST['searchterm']);

	//validation block to make sure that the fields are not blank.
	if ($searchtype == "" OR $searchterm == "") {
		echo "<center><br>Search Type and Search Term are required inputs.</center>";
		exit;
	}

	//code block to remove malicious content.
    nrstripos($_POST);
 
    //connect to database
    connectToDbase('nrcrm');
    //create search string
    $searchsql =
    "SELECT * from tblclientdetails
    WHERE ".$searchtype."
    LIKE '%".$searchterm."%'
    ORDER BY clientID";

    /*
        code block below searches the database, checks if there are results to the search and
        sticks the results into a table.
    */
    $searchresult = mysql_query($searchsql);
    $num_result= mysql_num_rows($searchresult);

    if ($num_result == 0){
      echo "No records found.  Please try again.";
      exit;
    }
    else

    {
      echo "<center><font size='20'><b>$num_result</b> record/s found.</font><br><br>";
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

            for ($i=0; $i < $num_result; $i++)
             {
               $row=mysql_fetch_array($searchresult);
			   
               echo "<tr bgcolor=\"#FFFFFF\" onMouseOver=\"this.bgColor='#B2CCFF'\" onMouseOut=\"this.bgColor='#FFFFFF'\"><td>";
               $id=htmlspecialchars($row['ClientID']);
			   echo "<a href=\"clientvisitentry.php?id=$id\">";
			   echo htmlspecialchars($row['ClientID']);
			   echo "</a>";
               //$id=htmlspecialchars($row['ClientID']);
               //echo "&nbsp;&nbsp;&nbsp;<a href='clientvisitentry.php?id=$id'>New Interaction</a>";
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

</html>