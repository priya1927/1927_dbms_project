<?php
	include_once 'header.php';
?>
<center>
	<h2>Confirm Order</h2>
	<p>~ o ~</p>
</center>
<div style="margin-right: 250px; margin-left: 250px; margin-top: 5px;margin-bottom: 15px; background-color: #ccccb3;padding: 5px;">
	<center>
	<h3>Selected Items</h3>
</center>
<?php

	if(isset($_POST["menu"])){
	echo "<div style='margin-left:15px;'><form action='order_details.php' method='POST' >";
	$menu=$_POST["menu"];
	
	
	foreach ($menu as $key => $value) {	
		$sql="select * from dishes where dish_name in(select dish_name from menu_items where menu_id =".$value.");";

		$result=mysqli_query($conn,$sql);
		$result_check=mysqli_num_rows($result);		
		if($result_check>0){
			while($row=mysqli_fetch_assoc($result)){
				echo "<br><input type='checkbox' value='".$row["dish_name"]."' name=dish[] checked disabled>"."    ".$row["dish_name"]."<br>";
			}
		}  			
	}

	if(isset($_POST["dishes"])){
		$dishes=$_POST["dishes"];
		foreach ($dishes as $key => $value) {	

			$sql2="select * from dishes where dish_name='".$value."';";
			$res=mysqli_query($conn,$sql2);
			$result_check=mysqli_num_rows($res);		
			if($result_check>0){
				while($row=mysqli_fetch_assoc($res)){
					echo "<br><input type='checkbox' value='".$row["dish_name"]."' name=dish[] checked disabled>"."    ".$row["dish_name"]."<br>";
				}
			}  			
	    }
	}
	else{
		echo "<p align='center' style='font-weight:bold;'>select atleast one ice cream!</p>";
		echo "<h3 align='center'>Ice Cream</h3>";
		$sql="select * from dishes where category='Ice Cream';";

		$result=mysqli_query($conn,$sql);
		$result_check=mysqli_num_rows($result);		
		if($result_check>0){
			while($row=mysqli_fetch_assoc($result)){
				echo "<br><input type='checkbox' value='".$row["dish_name"]."' name=dish[]>"."    ".$row["dish_name"]."<br>";
			}
		} 
	} 		
	    echo "<center><h3>Additional Items</h3></center>";
    foreach ($menu as $key => $value) {	
	$sql="select * from dishes where dish_name not in(select dish_name from menu_items where menu_id =".$value.") and category!='Ice Cream' order by category asc";

	$result=mysqli_query($conn,$sql);
	$result_check=mysqli_num_rows($result);		
	if($result_check>0){
		while($row=mysqli_fetch_assoc($result)){
			echo "<br><input type='checkbox' value='".$row["dish_name"]."' name=dish[]>"."    ".$row["dish_name"]."<br>";
		}
	}  			
	}
	echo "<br><center><button type='submit' name='submit' class='btn btn-primary'>Submit</button></center><br><br></form></div>";
}
else
	echo "<p align='center' style='font-weight:bold;'>select atleast one menu!</p>";


?>
</div>

<?php
	include_once 'footer.php';
?>