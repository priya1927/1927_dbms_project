<?php
	include_once 'header.php';
	
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
		$sql="INSERT INTO order_details(order_date,order_time,venue,city,district,zip,payment_status,no_of_people,order_status,cust_id) values (?,?,?,?,?,?,?,?,?,?);";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: book.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt,"ssssssssss",$date,$time,$address,$city,$district,$zip,$payment,$people,$status,$cust_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		$sql="select order_id from order_details where order_id=(select max(order_id) from order_details);";
		$result=mysqli_query($conn,$sql);
		$result_check=mysqli_num_rows($result);
		if($result_check>0){
			while($row=mysqli_fetch_assoc($result))
				header("location: select_menu.php?orderId=".$row["order_id"]);
		}
		exit();
		
	}
	
	if(isset($_SESSION["cust_id"])){
	$sql="select * from customer where cust_id=".$_SESSION["cust_id"].";";
	$result=mysqli_query($conn,$sql);
	$result_check=mysqli_num_rows($result);
	if($result_check>0){
		while($row=mysqli_fetch_assoc($result)){
?>
<div style="margin-right: 400px;margin-left: 400px;margin-top: 10px;margin-bottom: 10px; border-style: solid; border-color: black;border-width: 1px;">
	<center  style="font-family: Californian FB;">
	<h1 style="background-color: #ccccb3;font-weight: bold; font-style: italic;padding: 5px;margin-top: 0px;">Book Order</h1>
	<form action="" method="POST">
	  <div class="form-row" style="padding-left: 5px;padding-right: 5px;">
	  	<div class="form-group">
		    <label for="inputName">Name</label>
		    <input type="text" class="form-control" name="inputName" value="<?php echo $row["name"]; ?>" disabled>
		  </div>
		<div class="form-row">
		    <div class="form-group  col-md-6">
		      <label for="inputEmail">Email</label>
		      <input type="email" class="form-control" name="inputEmail" value="<?php echo $row["email"]; ?>" disabled>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPhone">Phone Number</label>
		      <input type="tel" class="form-control" name="inputPhone" value="<?php echo $row["phone"]; ?>" disabled>
		    </div>
		</div>
		<div class="form-row">
		    <div class="form-group  col-md-6">
		      <label for="inputDate">Order Date</label>
		      <input type="date" class="form-control" name="inputDate">
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputTime">Order Time</label>
		      <input type="time" class="form-control" name="inputTime">
		    </div>
		   
		</div>
		<div class="form-group">
		      <label for="inputPeople">No Of People</label>
		      <input type="number" class="form-control" name="inputPeople">
		</div>
	    <div class="form-group">
		    <label for="inputAddress">Address</label>
		    <input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St">
		</div>
	    <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputCity">City</label>
		      <input type="text" class="form-control" name="inputCity">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputDistrict">District</label>
		      <select name="inputDistrict" class="form-control">
		        <option selected>North Goa</option>
		        <option >South Goa</option>
		      </select>
		    </div>
		    <div class="form-group col-md-2">
		      <label for="inputZip">Zip</label>
		      <input type="text" class="form-control" name="inputZip">
		    </div>
  		</div>
  	</div>
  	<button type="submit" class="btn btn-primary" name="submit" style="margin: 10px;">Submit</button>
  	</form>
</center>
</div>


<?php
}}
	}
	else{
		header("location: login.php");
		exit();
	}

	include_once 'footer.php';
?>