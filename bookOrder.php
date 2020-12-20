<?php
  include_once 'header.php';
?>
<div style="margin-right: 400px;margin-left: 400px;margin-top: 10px;margin-bottom: 10px; border-style: solid; border-color: black;border-width: 1px;">
<center style="font-family: Californian FB;">
	<h1 style="background-color: #ccccb3;margin-top: 0px;font-weight: bold; font-style: italic;">Book</h1>
	<form action="bookorder.inc.php" method="POST">
		<label>No_of_people:</label>
		<input type="number" name="people"/>
		<button type="submit" name="submit">submit</button>
	</form>
</center>
</div>

<?php
  include_once 'footer.php';
?>