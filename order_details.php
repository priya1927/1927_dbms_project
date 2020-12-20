<?php
	include_once 'header.php';
	require_once 'dbh.inc.php';
	$sum=0;
    if(isset($_POST["submit"])){
?>
<div style="margin-right: 250px; margin-left: 250px; margin-top: 15px;margin-bottom: 15px; background-color: #ccccb3;">
	<h2 align="center" style="padding: 5px;">Order Details</h2>
<form action="" method="POST">
 <table class="table table-bordered">
    <thead style="background-color: black;color: white">
      <tr>
        <th>Selected Items</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
     
      	<?php
      			
      			$dish=$_POST["dish"];
      			$orderId=$_POST["orderId"];
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
      			$sql="select * from order_details where order_id='".$orderId."';";
	      			$result=mysqli_query($conn,$sql);
					$result_check=mysqli_num_rows($result);		
					if($result_check>0)
						$row=mysqli_fetch_assoc($result);
							
      			
      			echo "</tbody><tfoot style='vertical-align:bottom;font-weight: bold;'><tr><td>Total(per person)</td><td>".$sum."</td></tr><tr><td>Total</td><td>".($sum*$row["no_of_people"])."</td></tr></tfoot>";
      			$sum=$sum*$row["no_of_people"];
      			echo "<input type='hidden' name='sum' value='".$sum."'>";
      			foreach ($dish as $key => $value) {	
      			echo "<input type='hidden' name='items[]' value='".$value."'>";
      			echo "<input type='hidden' name='orderId' value='".$orderId."'>";
      			}
      				
      		?>

    
  </table>  
  <br><center><button type='submit' name='confirm' class='btn btn-primary'>Submit</button></center><br><br>
</form>
</div>


<?php
	}
	if(isset($_POST["confirm"])){
		$orderId=$_POST["orderId"];
		
		$sum=$_POST["sum"];
		$dish=$_POST["items"];
		$sql="update order_details set total_amt=".$sum.",advance_amt=".($sum/2)." where order_id=".$orderId.";";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: order_details.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		foreach ($dish as $key => $value) {
			$sql="INSERT INTO selected_dishes(order_id,dish_name) values (?,?);";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("location: order_details.php?error=stmtfailed");
				exit();
			}
			mysqli_stmt_bind_param($stmt,"ss",$orderId,$value);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);


				
			}
			echo "Booked order Successfully!!!";
		}  			
	

	include_once 'footer.php';
?>