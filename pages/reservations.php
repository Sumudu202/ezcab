<h1>Current Reservations</h1>

	<?php 
		require_once 'bin/conDB.php';
		conDb();
		
		$qry = "select * from reservation where completed = '0'";
		
		$result = mysql_query($qry);
		
		if(mysql_num_rows($result)==0){
			echo "<br><p style=\"text-align:center;font-size:12px;color:#aaa;\">No currrent reservations</p>";
		}
		while($info = mysql_fetch_array($result)){
	?>
    <div class="vehicleList">
    <div class="description"><center><b style="font-size:16px"><?php echo $info['vehicleID']?></b></center><br />
		<?php 
			$qry1 = "select * from users where userId='".$info['customerID']."'";
			$qry2 = "select customer.phone from users, customer where users.userId='".$info['customerID']."' and customer.name=users.name";
			
			$result1 = mysql_query($qry1);
			$result2 = mysql_query($qry2);
			
			while($info1 = mysql_fetch_array($result1)){
				while($info2 = mysql_fetch_array($result2)){
					echo "Reserved by :".$info1['name'].".<br>";
					echo "Phone No :".$info2['phone'].".<br><br>";
					echo "On ".$info['dueDate']." at ".$info['dueTime'].".<br>";
					echo "From ".$info['startFrom']." at ".$info['goingTo'].".<br><br>";
					echo "Comments :".$info['comments'].".<br><br>";
				}
			}
					
		?> 
        
     </div>
    <a href="bin/complete.php?resvID=<?php echo $info['reservationID'];?>&vehicle=<?php echo $info['vehicleID']?>" class="reserve" style="top:110px;float:right">Mark as Complete</a>
    </div>
    <?php }?>
