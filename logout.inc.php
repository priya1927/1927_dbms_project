<?php
	session_start();
	session_unset();
	session_destroy();
	header("location: first_page.php");
	exit();
?>