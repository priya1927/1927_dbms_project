<?php
	require_once 'dbh.inc.php';
	require_once 'functions.php';
	if(isset($_POST["submit"])){
		
		$date=$_POST["inputDate"];
		$time=$_POST["inputTime"];
		$address=$_POST["inputAddress"];
		$city=$_POST["inputCity"];
		$district=$_POST["inputDistrict"];
		$people=$_POST["inputPeople"];
		$zip=$_POST["inputZip"];
		$order_id=null;
		$payment="not paid";
		$total=null;
		$advance=null;
		$status="not delivered";
		$cust_id=$_SESSION["cust_id"];
		$sql="INSERT INTO order_details values (?,?,?,?,?,?,?,?,?,?,?,?,?);";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: book.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt,"sssssssssssss",$order_id,$date,$time,$address,$city,$district,$zip,$payment,$people,$total,$advance,$status,$cust_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		echo $people;
		exit();
		
	}
	else{
		header("location: book.php");
	}

?>