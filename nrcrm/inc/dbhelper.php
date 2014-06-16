<?php
	// function to connect to database
	function connectToDbase($dbname) {
		//connect to the database
		$conn=mysql_pconnect('localhost','nroldan','thet');

    if (!$conn){
      echo "Could not connect to MySQL.";
      echo "<br>".mysql_errno()." : ".mysql_error();
	  exit;
    } else {
			echo "<br>Connected to Mysql database!";
			echo "<br>";
			$choosedb = mysql_select_db($dbname);
			if ($choosedb) {
							echo "Database " . $dbname . " selected!";
							} else {
							echo "Cannot choose database!";
							exit;
							}
		}
	}
	
	//input cleaner by using htmlspecialchars and stripslashes
	function cleaninput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


        //function using stripos to prevent malicious code
    function nrstripos($postfrompage)  {
                foreach ($postfrompage as $value) {
            		if (stripos($value, 'Content-Type:') !== FALSE) {
            			echo "<center><br>There was a problem with the information you entered.</center>";
            			exit;
            			}
                      }
                }



?>