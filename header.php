<?php
	session_start();
  include_once 'dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>swaad caterers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="style.css">
 
 </head>
 <body>
 	<nav class="navbar navbar-inverse ">
 	<div class="container-fluid">
 		<div class="navbar-header">
	 		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                   
	        </button>	
	        <a class="navbar-brand" href="first_page.php" style="color: white" >Swaad Caterers</a>
        </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="first_page.php">Home</a></li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Food Menu<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#" class="dropdown-item">Menu  &raquo</a>
          <ul class="submenu dropdown-menu">
            <li><a class="dropdown-item" href="veg_menu.php">Veg</a></li>
            <li><a class="dropdown-item" href="menu.php">Non Veg</a></li>
          </ul>
          </li>
       
          <li><a href="all_menu.php">All Menu</a></li>
        </ul>
      </li>
      <?php
      if(isset($_SESSION["username"])){
        echo "<li><a href='your_orders.php'>Your Orders</a></li>";
      }
      ?>
      <li><a href="book.php">Book an Order</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    	<?php
     if(isset($_SESSION["username"])){
     	echo '<li><a href="logout.inc.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>';
 	   }
     else{
      	echo '<li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
      	echo '<li><a href="login.inc.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
     }
     ?>
     </ul>
	</div>
 	</div>
    </nav>
    <div class="container-fluid">
      <div class=" row content">