<?php
	require_once 'dbh.inc.php';
	require_once 'functions.php';
	if(isset($_POST["submit"])){
		$people=$_POST["people"];
		$sql="INSERT INTO order_details(no_of_people) values (?);";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: bookOrder.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt,"s",$people);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	else{
		echo "incorrect";
	}

?>