<?php
	include_once 'header.php';
?>
<div style="margin-right: 400px;margin-left: 400px;margin-top: 10px;margin-bottom: 10px; border-style: solid; border-color: black;border-width: 1px;">
<center>
	<h1 style="background-color: #cc6699;margin-top: 0px;">Log in</h1>
	<div style="text-align: left; padding-left: 10px;padding-right: 10px;padding-bottom: 10px">
		<form action="login.inc.php" method="POST">
			<label>Username/Email:</label>
			<input type="text" name="name" placeholder="Enter your username/email" class="form-control"/>
			<label>Password:</label>
			<input type="password" name="password" placeholder="Enter your password" class="form-control"/>
			<center><button type="submit" name="submit" class="btn btn-primary">Log in</button></center>
		</form>
	</div>
</center>
<?php
	if(isset($_GET["error"])){
		if($_GET["error"]=="emptyinput"){
			echo "<p>Fill in all fields</p><br>";
		}
		if($_GET["error"]=="wronglogin"){
			echo "<p>Incorrect login credentials</p><br>";
		}
	}
?>

</div>


<?php
	include_once 'footer.php';
?>