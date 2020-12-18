<?php
	include_once 'header.php';
?>

<div>
	<center>
		<h2>All Menu</h2>
		<p>~ o ~</p>
	</center>
	<div style="margin-right: 250px; margin-left: 250px; margin-top: 5px;background-color: #555;">
		
		<?php

			$sql="select distinct(category) from dishes;";
			$result=mysqli_query($conn,$sql);
			$result_check=mysqli_num_rows($result);
			
			if($result_check>0){
				while($row=mysqli_fetch_assoc($result)){
					echo "<h3 align='center' style='color:white;'>".$row["category"]."</h3><div style='background-color: #ccccb3;'><ul style='list-style-type: square;'><br>";
						
					$sql2="select dish_name from dishes where category='".$row["category"]."';";
					$res=mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res)>0){
						while($sub_row=mysqli_fetch_assoc($res)){
							echo "<li>".$sub_row["dish_name"]."</li><br>";
						}
					}
					echo "</ul></div>";
				}
			}
			
		?>
	</div>
	
</div>

<?php
	include_once 'footer.php';
?>