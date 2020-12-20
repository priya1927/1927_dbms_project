
<?php
    include_once 'header.php';
    if(isset($_SESSION["cust_id"])){
    $sql="select * from order_details where cust_id=".$_SESSION["cust_id"].";";
    $result=mysqli_query($conn,$sql);
    $result_check=mysqli_num_rows($result);
    if($result_check>0){
        while($row=mysqli_fetch_assoc($result)){
?>
<div class="card"  style="border-width: 2px;border-color: black;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align: center;margin:15px;">
    <h2>Order Id:<?php echo $row["order_id"];?></h2>
    <div class="card-body" style="padding: 2px;">
        <p>Order date:<?php echo $row["order_date"];?></p>
        <p>Order time:<?php echo $row["order_time"];?></p>
        <p>Venue:<?php echo $row["venue"];?></p>
        <p>City:<?php echo $row["city"];?></p>
        <p>District:<?php echo $row["district"];?></p>
        <p>Pin code:<?php echo $row["zip"];?></p>
        <p>No of people:<?php echo $row["no_of_people"];?></p>
        <p>Total amount:<?php echo $row["total_amt"];?></p>
        <p>Advance amount:<?php echo $row["advance_amt"];?></p>
        <p>Order status:<?php echo $row["order_status"];?></p>
        <table class="table table-bordered">
        <thead>
        <tr>
            <th>Dish Name</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $sum=0;
        $sql3="select dish_name from selected_dishes where order_id=".$row["order_id"].";";
        $result3=mysqli_query($conn,$sql3);
        if(mysqli_num_rows($result3)>0){
            while($row3=mysqli_fetch_assoc($result3)){
                $sql4="select * from dishes where dish_name='".$row3["dish_name"]."';";
                $result4=mysqli_query($conn,$sql4);
                if(mysqli_num_rows($result4)>0){
                    while($row4=mysqli_fetch_assoc($result4)){
        ?>
        
        
          <tr>
            <td><?php echo $row4["dish_name"]?></td>
            <td><?php echo $row4["price"]; }}}} ?></td>
          </tr>
          </tbody>
          <tfoot style='vertical-align:bottom;font-weight: bold;'><tr><td>Total for <?php echo $row["no_of_people"]; ?> no. of people</td><td><?php echo $row["total_amt"];  ?></td></tr></tfoot>
      </table>
    </div>
</div>
<?php

}
}
}
    include_once 'footer.php';
?>