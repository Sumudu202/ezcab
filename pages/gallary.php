<h1>Gallery</h1>
	<?php 
		require_once 'bin/conDB.php';
		//conDb();
		$conn = conDb();
		
		$qry = "select * from vehicles where status = '1'";
		
		//$result = mysql_query($qry);
		$result = mysqli_query($conn, $qry);
		//while($info = mysql_fetch_array($result)){
			
		while($info = mysqli_fetch_assoc($result)){
	?>
    <div class="vehicleList">
    <img src="upload/<?php echo $info['image']?>"/>
    <div class="description"><center><b><?php echo $info['model']?></b></center>
		<?php 
			echo $info['seats']." seats,";
		
			if($info['AC']==1){
				echo "Full AC,";
			}
			
			if($info['withDriver']==1){
				echo "with driver. ";
			}
			else {
				echo "without driver. ";
			}
			
			if($info['airport']==1){
				echo "Airport drop available. ";
			}
			else {
				echo "Airport drop not available. ";
			}
			echo $info['more'];
		?> 
        
     </div>
    <a href="reserve.php?vehicle=<?php echo $info['vehicleNo']?>" class="reserve">Reserve Now</a>
    <a href="info.php?vehicle=<?php echo $info['vehicleNo']?>" class="more">More>></a>
    </div>
	<?php }?>

	<?php 
		require_once 'bin/conDB.php';
		//conDb();
		$conn = conDb();
		$qry = "select * from vehicles where status = '0'";
		
		//$result = mysql_query($qry);
		$result = mysqli_query($conn, $qry);
		//while($info = mysql_fetch_array($result)){
		while($info = mysqli_fetch_assoc($result)){
	?>
	<div class="vehicleList">
    <img src="upload/<?php echo $info['image']?>"/>
    <div class="description"><center><b><?php echo $info['model']?></b></center>
		<?php 
			echo $info['seats']." seats,";
		
			if($info['AC']==1){
				echo "Full AC,";
			}
			
			if($info['withDriver']==1){
				echo "with driver. ";
			}
			else {
				echo "without driver. ";
			}
			
			if($info['airport']==1){
				echo "Airport drop available. ";
			}
			else {
				echo "Airport drop not available. ";
			}
			echo $info['more'];
		?> 
        
     </div>
    <font color="red"><b>Reserved</b></font>
    </div>
    <?php }?>