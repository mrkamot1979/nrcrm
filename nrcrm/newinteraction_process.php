<?php
	session_start();
	include('inc/sessionvalidation.php');
	include('inc/dbhelper.php');

	$searchtype = cleaninput($_POST['searchtype']);
	$searchterm = cleaninput($_POST['searchterm']);

    //connect to database
    connectToDbase('nrcrm');
    //create search string
    $searchsql =
    "SELECT * from tblclientdetails
    WHERE ".$searchtype."
    LIKE '%".$searchterm."%'
    ORDER BY lname";

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
            echo "<table border='5'>";
            echo "<tr bgcolor='yellow'>";
            echo "<td align=\"center\">Client ID";
            echo "<td align=\"center\">Company";
            echo "<td align=\"center\">First Name";
            echo "<td align=\"center\">Last Name";
            echo "<td align=\"center\">Address";
            echo "<td align=\"center\">Gender";
            echo "<td align=\"center\">Email";
            echo "</tr>";

            for ($i=0; $i < $num_result; $i++)
             {
               $row=mysql_fetch_array($searchresult);
               echo "<tr bgcolor=\"#FFFFFF\" onMouseOver=\"this.bgColor='#FFFF99'\" onMouseOut=\"this.bgColor='#FFFFFF'\"><td>";
               echo htmlspecialchars($row['ClientID']);
               $id=htmlspecialchars($row['ClientID']);
               echo "&nbsp;&nbsp;&nbsp;<a href='http://localhost/nrcrm/clientvisitentry.php?id=$id'>Enter Query</a>";
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
               echo "<td>";
               echo htmlspecialchars($row['email']);
               echo "</tr>";
             }

             echo "</table></center>";

       }


?>