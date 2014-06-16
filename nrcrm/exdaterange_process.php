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
 $todate = cleaninput($_POST["frmdate"]);

 nrstripos($_POST);


?>






</body>
</html>
?>