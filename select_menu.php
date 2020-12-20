<?php
	include_once 'header.php';
?>

<div>
	<center>
		<h2>Select Menu</h2>
		<p>~ o ~</p>
	</center>
	<div style="margin-right: 250px; margin-left: 250px; margin-top: 5px;margin-bottom: 15px; background-color: #ccccb3;">
		
		<?php
			
			
			echo "<div style='margin-left:15px;'><form action='additional_dishes.php' method='POST' >";
			
			echo "<h3 align='center' >Veg Menu</h3>";
			$sql="select * from menu where is_veg=true";
			$result=mysqli_query($conn,$sql);
			$result_check=mysqli_num_rows($result);
			if($result_check>0){
				while($row=mysqli_fetch_assoc($result)){
					echo "<br><input type='checkbox' value='".$row["menu_id"]."' name=menu[]><img src='".$row["image_name"]."' class='img-circle' height='80px' width='80px' style='margin-left:15px;'/>  ".$row["menu_name"];
				}
			}
			$sql2="select * from menu where is_veg=false";
			$res=mysqli_query($conn,$sql2);
			
			echo "<h3 align='center'>Non-Veg Menu</h3>";
			if(mysqli_num_rows($res)>0){
				while($sub_row=mysqli_fetch_assoc($res)){
					echo "<br><input type='checkbox' value='".$sub_row["menu_id"]."' name=menu[]><img src='".$sub_row["image_name"]."' class='img-circle' height='80px' width='80px' style='margin-left:15px;'/>  ".$sub_row["menu_name"];
				}
			}
			$sql3="select dish_name from dishes where category='Ice Cream';";
			$query_result=mysqli_query($conn,$sql3);
			echo "<h3 align='center'>Ice Creams</h3>";
			if(mysqli_num_rows($query_result)>0){
				while($s_row=mysqli_fetch_assoc($query_result)){
					echo "<br><input type='checkbox' value='".$s_row["dish_name"]."' name=dishes[]>"."    ".$s_row["dish_name"]."<br>";
				}
			}
			echo "<input type='hidden' name='order_id' value='".$_GET['orderId']."'>";
			echo "<br><center><button type='submit' name='submit' class='btn btn-primary'>Submit</button></center><br><br></form></div>";
		?>
	</div>
	
</div>

<?php
	include_once 'footer.php';
?>