<?php
	include_once 'header.php';
?>

<div>
	<center>
		<h2>Veg Menu</h2>
		<p>~ o ~</p>
	</center>
	<div style="margin-right: 250px; margin-left: 250px; margin-top: 5px;background-color: #555;">
		
		<?php

			$sql="select menu_name,image_name from menu where is_veg=true";
			$result=mysqli_query($conn,$sql);
			$result_check=mysqli_num_rows($result);
			echo "<div style='margin-top: 5px; background-color: #ccccb3;'><ul style='list-style-type: square;'>";
			if($result_check>0){
				while($row=mysqli_fetch_assoc($result)){
					echo "<br><li><img src='".$row["image_name"]."' class='img-circle' height='80px' width='80px'/>  ".$row["menu_name"]."</li>";
				}
			}
			echo "</ul><br></div>";
			$sql="select dish_name from dishes where category='Ice Cream';";
			$result=mysqli_query($conn,$sql);
			$result_check=mysqli_num_rows($result);
			echo "<h3 align='center' style='color:white;'>Ice Creams</h2><div style='background-color: #ccccb3;'><ul style='list-style-type: square;'><br>";
			if($result_check>0){
				while($row=mysqli_fetch_assoc($result)){
					echo "<li>".$row["dish_name"]."</li><br>";
				}
			}
			echo "</ul></div>";
		?>
	</div>
	
</div>

<?php
	include_once 'footer.php';
?>