<h1>Make reservation</h1>
<?php 
	if(!(isset($_SESSION['user']) && isset($_SESSION['permision']))){
		header("Location:index.php?err=2");
	}
	else {
		if(isset($_GET['vehicle'])){
			$vehicle = $_GET['vehicle'];
			
			require_once 'bin/conDB.php';
			//conDb();
			$conn = conDb();
			
			$qry = "select * from vehicles where vehicleNo = '$vehicle'";
			
			//$result = mysql_query($qry);
			$result = mysqli_query($conn, $qry);
			//while($info = mysql_fetch_array($result)){ 
			while($info = mysqli_fetch_assoc($result)){		?>
			
	<script type="text/javascript">
		function validateForm()
		{
			var x=document.forms["reservation"]["date"].value;
			if(x==null || x=="")
			{
				alert("Date should be filled out!");
				return false;
			}
			var x=document.forms["reservation"]["time"].value;
			if(x==null || x=="")
			{
				alert("Time Should be filled Out!");
				return false;
			}
			var x=document.forms["reservation"]["from"].value;
			if(x==null || x=="")
			{
				alert("Starting poit should be filled out!");
				return false;
			}
			
			var x=document.forms["reservation"]["to"].value;
			if(x==null || x=="")
			{
				alert("Destination should be filled out!");
				return false;
			}
			
		}
	</script>
	
	<form action="bin/reserve.php" method="post" name="reservation" onsubmit="return validateForm()" id="reservation">
	
		<input type="hidden" name="customerID" value="<?php echo $_SESSION['userID']?>"/>        
		<input type="hidden" name="vehicleID" value="<?php echo $vehicle?>"/>
		<table width="50%">
			<tr>
				<td>Customer Name</td>
				<th><?php echo $_SESSION['name']?></th>
			</tr>
			<tr>
				<td>Vehicle No</td>
				<th><?php echo $vehicle?></th>
			</tr>
			<tr>
				<td>Date :</td>
				<th><input type="date" name="date"/></th>
			</tr>
			<tr>
				<td>Time :</td>
				<th><input type="text" name="time"/></th>
			</tr>
			<tr>
				<td>From :</td>
				<th><input type="text" name="from"/></th>
			</tr>
			
			<tr>
				<td>To :</td>
				<th><input type="text" name="to"/></th>
			</tr>
			<tr>
				<td>Comment :</td>
				<th><textarea rows="4" cols="15"name="comment"></textarea></th>
			</tr>        
			<tr>
				<th colspan="2">
					<button type="submit">Reserve</button>
					<button type="reset">clear</button>
				</th>            
			</tr>
		</table>
	</form>
		<?php 
			}
		}
		else if(isset($_GET['success'])){?>
			<script type="text/javascript">
				alert("Record added Successfully");
			</script>
		<?php
			//header("Location:index.php");
		}
	}
?>