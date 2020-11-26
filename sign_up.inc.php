<?php
	require_once 'dbh.inc.php';
	require_once 'functions.php';
	if(isset($_POST["signup"])){
		$name=$_POST["name"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$username=$_POST["username"];
		$password=$_POST["pwd"];
		$password_repeat=$_POST["password_repeat"];
		
		if(emptyInputSignUp($name,$email,$username,$phone,$password,$password_repeat)!==false){
			header("location: sign_up.php?error=emptyinput");
			exit();
		}
		if(invalidUid($username)!==true){
			header("location: sign_up.php?error=invaliduid");
			exit();
		}
		if (pwdMatch($password,$password_repeat)!==false){
			header("location: sign_up.php?error=passwordsdontmatch");
			exit();
		}
		if(uidExists($conn,$username,$email)!==false){
			header("location: sign_up.php?error=usernametaken");
			exit();
		}
		createCustomer($conn,$name,$email,$phone,$username,$password);
	}
	else{
		header("location: sign_up.php");
	}

?>