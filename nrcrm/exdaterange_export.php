<?php
	session_start();
	require_once dirname(__FILE__) . '/../Classes/PHPExcel.php'; //php excel object
	$pagetitle = "Extract by Date";
?>
<html>
<?php
  include('inc/header.php');
  include('inc/sessionvalidation.php');
  include('inc/dbhelper.php');
?>
	
<?php	
	//use a GET to get the date ranges
	$fromdate = cleaninput($_GET['date1']);
	$todate = cleaninput($_GET['date2']);
	
	//use the nrstripos to guard against malicious code.
	nrstripos($_GET);
	
	
	 //construct query string
	$exportdaterange ="SELECT 
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
	$exportdatesearchresult = mysql_query($exportdaterange);
	$exportnum_result= mysql_num_rows($exportdatesearchresult);
	
	//this is where the phpexcel object comes in. Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	// Set document properties
	$objPHPExcel->getProperties()->setCreator($username)
								 ->setLastModifiedBy($username)
								 ->setTitle("PHPExcel Test Document")
								 ->setSubject("PHPExcel Test Document")
								 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
								 ->setKeywords("office PHPExcel php")
								->setCategory("Test result file");

		// Add some data for the column headers
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Client ID')
					->setCellValue('B1', 'Company')
					->setCellValue('C1', 'First Name')
					->setCellValue('D1', 'Last Name!');
					->setCellValue('E1', 'Date' );
					->setCellValue('F1','Location');
					->setCellValue('G1','Notes');
					->setCellValue('h1','Interaction by');


		/*$objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);*/
		//this setting is used to make the Notes column G1 "wrapped".
		$objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true);1

		//use a for loop to loop through the data and populate the spreadsheet.
		$objPHPExcel->setActiveSheetIndex(0); 
		for ($i=2; $i < $exportnum_result; i++) {
			->setCellValue('A$i', htmlspecialcars($row['name'))
			$worksheet->write($i, 0, htmlspecialchars($row['name']));
		
		}
		
		

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Simple');


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Save Excel 2007 file
		$callStartTime = microtime(true);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save(str_replace('.php', '.xlsx', /*__FILE__*/$username));
		$callEndTime = microtime(true);
		$callTime = $callEndTime - $callStartTime;


	
	



?>
</body>
</html>