<?php
	include_once 'header.php';
	require_once 'dbh.inc.php';
?>
<div style="margin-right: 250px; margin-left: 250px; margin-top: 15px;margin-bottom: 15px; background-color: #ccccb3;">
	<h2 align="center" style="padding: 5px;">Order Details</h2>
 <table class="table table-bordered">
    <thead style="background-color: black;color: white">
      <tr>
        <th>Selected Items</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
     
      	<?php
      			$sum=0;
      	     	if(isset($_POST["submit"])){
      			$dish=$_POST["dish"];
      			foreach ($dish as $key => $value) {	
	      			$sql="select * from dishes where dish_name='".$value."';";
	      			$result=mysqli_query($conn,$sql);
					$result_check=mysqli_num_rows($result);		
					if($result_check>0){
						while($row=mysqli_fetch_assoc($result)){
							echo "<tr><td>".$row["dish_name"]."</td>";
							echo "<td>".$row["price"]."</td></tr>";
							$sum=$sum+$row["price"];
						}
					}  			
      			}
      			
      			foreach ($dish as $key => $value) {	
	      			$sql="select * from dishes where dish_name='".$value."';";
	      			$result=mysqli_query($conn,$sql);
					$result_check=mysqli_num_rows($result);		
					if($result_check>0){
						while($row=mysqli_fetch_assoc($result)){
							echo "<tr><td>".$row["dish_name"]."</td>";
							echo "<td>".$row["price"]."</td></tr>";
							$sum=$sum+$row["price"];
						}
					}  			
      			}
      			echo "</tbody><tfoot style='vertical-align:bottom;font-weight: bold;'><tr><td>Total</td><td>".$sum."</td></tr></tfoot>";
      	
      			}
      				
      		?>

    
  </table>
  <br><center><button type='submit' name='submit' class='btn btn-primary'>Submit</button></center><br><br></form></div>

</div>


<?php
	include_once 'footer.php';
?>