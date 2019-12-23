<?php include("javascripts/scripts.php"); ?>  

<form action="datepicker.php" method="post" id="date"> 
  Start Date: <input id="datepickerstart" readonly="readonly" name="datepickerstart">

  End Date: <input id="datepickerend" readonly="readonly" name="datepickerend">

  <input type="submit" value="Submit">
</form>
<div class="error-messages" style="display:none;"></div>

<?php
echo $_POST['datepickerstart'];
echo $_POST['datepickerend'];
?>