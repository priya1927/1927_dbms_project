<?php
	include_once 'dbh.inc.php';
	function emptyInputSignUp($name,$email,$username,$phone,$password,$password_repeat){
		$result;
		if(empty($name) || empty($email) || empty($username) || empty($phone) || empty($password) || empty($password_repeat)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function invalidUid($username){
		$result;
		if(!preg_match("/^[a-zA-Z0-9]*$@/", $username)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function pwdMatch($password,$password_repeat){
		$result;
		if($password !== $password_repeat){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function uidExists($conn,$username,$email){
		$sql="SELECT * FROM customer WHERE cust_id = ? OR email= ?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../sign_up.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt,"ss",$username,$email);
		mysqli_stmt_execute($stmt);
		$resultData=mysqli_stmt_get_result($stmt);
		if($row=mysqli_fetch_assoc($resultData)){
			return $row;
		}
		else{
			$result=false;
			return $result;
		}
		mysqli_stmt_close($stmt);
	}
	function createCustomer($conn,$name,$email,$phone,$username,$password){
		$sql="INSERT INTO customer(name,email,username,phone,password) values (?,?,?,?,?);";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: sign_up.php?error=stmtfailed");
			exit();
		}
		$hashedPwd=password_hash($password, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt,"sssss",$name,$email,$username,$phone,$hashedPwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("location: sign_up.php?error=none");
		exit();
	}
	function emptyInputLogin($username,$password){
		$result;
		if(empty($username) || empty($password)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function loginUser($conn,$username,$password){
		$uidExists=uidExists($conn,$username,$username);
		if($uidExists === false){
			header("location: login.php?error=wronglogin");
			exit();
		}
		$pwdHashed=$uidExists["password"];
		$checkPwd=password_verify($password, $pwdHashed);

		if($checkPwd === false){
			header("location: login.php?error=wronglogin");
			exit();
		}
		else if ($checkPwd === true) {
			session_start();
			$_SESSION["cust_id"]=$uidExists["cust_id"];
			$_SESSION["username"]=$uidExists["username"];

			header("location: first_page.php");
			exit();
		}
	}
?>