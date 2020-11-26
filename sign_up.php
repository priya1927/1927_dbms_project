<?php
  include_once 'header.php';
?>
<div style="margin-right: 400px;margin-left: 400px;margin-top: 10px;margin-bottom: 10px; border-style: solid; border-color: black;border-width: 1px;">
<center>
	<h1 style="background-color: #cc6699;margin-top: 0px;">Sign Up</h1>
	<div style="text-align: left; padding-left: 10px;padding-right: 10px;padding-bottom: 10px">
		<form action="sign_up.inc.php" method="POST">
			<label>Full Name:</label>
			<input type="text" name="name" placeholder="Enter your full name" class="form-control"/>
			<label>Email Id:</label>
			<input type="email" name="email" placeholder="Enter your email id" class="form-control"/>
			<label>Phone Number:</label>
			<input type="tel" name="phone" placeholder="Enter phone number" pattern="[0-9]{10}" class="form-control"/>
			<label>Username:</label>
			<input type="text" name="username" placeholder="Enter your username" class="form-control"/>
			<label>Password:</label>
			<input type="password" name="pwd" placeholder="Enter your password" class="form-control"/>
			<label>Confirm Password:</label>
			<input type="password" name="password_repeat" placeholder="Repeat password" class="form-control"/><br>
			<center><button type="submit" name="signup" class="btn btn-primary">Sign Up</button></center>
		</form>
	</div>
</center>
<?php
	if(isset($_GET["error"])){
		if($_GET["error"]=="emptyinput"){
			echo "<p>Fill in all fields</p><br>";
		}
		if($_GET["error"]=="invaliduid"){
			echo "<p>Choose a proper username</p><br>";
		}
		if($_GET["error"]=="passwordsdontmatch"){
			echo "<p>Passwords don't match</p><br>";
		}
		if($_GET["error"]=="stmtfailed"){
			echo "<p>Something went wrong,please try again.</p><br>";
		}
		if($_GET["error"]=="usernametaken"){
			echo "<p>Username is already taken</p><br>";
		}
		if($_GET["error"]=="none"){
			echo "<p>You have signed up successfully!</p><br>";
		}
	}
?>
</div>


<?php
  include_once 'footer.php';
?>