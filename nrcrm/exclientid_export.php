<?php
	session_start();
	$pagetitle = "Extract by Client";
	require_once dirname(__FILE__) . '/../Classes/PHPExcel.php'; //php excel object
?>
<html>
<?php
  include('inc/header.php');
  include('inc/dbhelper.php');
  include('inc/sessionvalidation.php');
?>
	
<?php	
	//use a GET to get the date ranges
	$exportclientid = cleaninput($_GET['idexport']);
	
	
	//use the nrstripos to guard against malicious code.
	nrstripos($_GET);
	
	
	 //construct query string
	$exportclientid_query ="SELECT 
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
	tblclientdetails.clientID = '".$exportclientid."'
	AND
	tblclientdetails.clientID = tblclientvisit.clientID
	ORDER BY tblclientdetails.clientID
	";

	//connect to database
	 connectToDbase('nrcrm');
	//execute
	$exportclientidsearchresult = mysql_query($exportclientid_query);
	$exportclientidnum_result= mysql_num_rows($exportclientidsearchresult);
	
 	//this is where the phpexcel object comes in. Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	
	 
	// Set document properties
	$objPHPExcel->getProperties()->setCreator("$username")
								 ->setLastModifiedBy("$username")
								->setTitle("Extract for $exportclientid")
								 ->setSubject("Extract");
								 
		// Add some data for the column headers
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Client ID')
					->setCellValue('B1', 'Company')
					->setCellValue('C1', 'First Name')
					->setCellValue('D1', 'Last Name!')
					->setCellValue('E1', 'Date' )
					->setCellValue('F1', 'Location')
					->setCellValue('G1', 'Notes')
					->setCellValue('h1', 'Interaction by');
					
		//populate the cells by using a FOR loop
			for ($i = 2; $i <= $exportclientidnum_result+1; $i++) {
			$row = mysql_fetch_array($exportclientidsearchresult);
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue("A$i", $row['clientID'])
					->setCellValue("B$i", $row['company'])
					->setCellValue("C$i", $row['fname'])
					->setCellValue("D$i", $row['lname'])
					->setCellValue("E$i", $row['date'])
					->setCellValue("F$i", $row['location'])
					->setCellValue("G$i", stripslashes($row['notes']))
					->setCellValue("H$i", $row['interactionby']);
					}

		//this code block is used to make the column G wrap text as it houses the notes field.
		$objPHPExcel->getActiveSheet()->getStyle('G1:D'.$objPHPExcel->getActiveSheet()->getHighestRow())
		->getAlignment()->setWrapText(true); 
					

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Extract');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$a=date("Ymd");
		$objWriter->save("extractByClientID$a.xlsx"); 
		echo "
			<br>
			<center>
			File is available <a href=\"extractByClientID$a.xlsx\">here</a> 
			</a>
			</center>";


	

	
?>
</body>
</html>