<?php 
	if(isset($_GET['vehicle'])){
		$vehicle = $_GET['vehicle'];
		
		require_once 'bin/conDB.php';
		//conDb();
		$conn = conDb();
		
		$qry = "select * from vehicles where vehicleNo = '$vehicle'";
		
		//$result = mysql_query($qry);
		$result = mysqli_query($conn, $qry);
		//while($info = mysql_fetch_array($result)){ 
		while($info = mysqli_fetch_assoc($result)){
?>
		<h1><?php echo $info['model']; ?></h1>
        
        <table align="center" border="0" cellspacing="5px">
        	<tr>
            	<td colspan="2"><img class="vehicle" src="upload/<?php echo $info['image']; ?>"/></td>
            </tr>
        	<tr>
            	<th>Vehicle No</th>
                <td><b><i><?php echo $info['vehicleNo']; ?></b></i></td>
            </tr>
			<tr>
            	<th>AC</th>
                <td><?php if($info['AC']==1){ echo "Yes"; } else { echo "No"; }?></td>
            </tr>
            <tr>
            	<th>Seats</th>
                <td><?php echo $info['seats']; ?></td>
            </tr>
            <tr>
            	<th>Driver</th>
                <td><?php if($info['withDriver']==1){ echo "Yes"; } else { echo "No"; }?></td>
            </tr>
            <tr>
            	<th>Airport Drop</th>
                <td><?php if($info['airport']==1){ echo "Available"; } else { echo "Not Availabale"; }?></td>
            </tr>
             <tr>
            	<td colspan="2"><?php echo $info['more']; ?></td>
            </tr>
             <tr>
            	<td colspan="2" align="right"><a href="reserve.php?vehicle=<?php echo $info['vehicleNo']?>" class="more">Reserve Now</a></td>
            </tr>
        </table>
<?php
		}
	}
?>