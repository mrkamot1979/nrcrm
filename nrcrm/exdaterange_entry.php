<?php
  session_start();
  $pagetitle = "Extract by Date";
?>
<html>
<?php
  include('inc/header.php');
  include('inc/sessionvalidation.php');
?>
<br>
<center>
<h1>Enter Date Range</h1>
<h2>Date format is YYYY/MM/DD</h2>

  <form name="exdaterange" method="POST" action="exdaterange_process.php">
    <table>
      <tr>
        <th><label for="frmdate">From Date:</label></th>
        <td><input type="text" name="frmdate" id="frmdate"></td>
      </tr>

      <tr>
        <th><label for="todate">To Date:</label></th>
        <td><input type="text" name="todate" id="todate"></td>
      </tr>



      </table>
    <br>
    <input type="submit" value="Submit" />
  </form>
</center>





</body>
</html>