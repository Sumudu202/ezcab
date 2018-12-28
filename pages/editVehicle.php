<?php
require_once 'bin/conDB.php';
conDb();

 @$currentVcl=$_POST['vehicleNo'];
 $query_disp3="SELECT * FROM vehicles order by vehicleNo asc";
 $result3= mysql_query($query_disp3);
 
	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && ($_SESSION['permision'] == 2 || $_SESSION['permision'] == 3) ))){
		header("location:../index.php");		
	}
	else{ ?>
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["editvehicle"]["type"].value;
		if(x==null || x=="")
		{
			alert("Vehicle type should be filled out!");
			document.forms["editvehicle"]["type"].focus();
			return false;
		}
		var x=document.forms["editvehicle"]["model"].value;
		if(x==null || x=="")
		{
			alert("Vehicle model should be filled out!");
			document.forms["editvehicle"]["model"].focus();
			return false;
		}
		var x=document.forms["editvehicle"]["seats"].value;
		if(x==null || x=="")
		{
			alert("Number of Seats should be filled out!");
			document.forms["editvehicle"]["seats"].focus();
			return false;
		}
		var x=document.forms["editvehicle"]["seats"].value;
		y=parseFloat(x);
		if(isNaN(y))
		{
			alert("Number of Seats should be a number");
			document.forms["editvehicle"]["seats"].focus();
			return false;
		}
		var x=document.forms["editvehicle"]["supName"].value;
		if(x==null || x=="")
		{
			alert("Supplier Name should be filled out!");
			document.forms["editvehicle"]["supName"].focus();
			return false;
		}
		var x=document.forms["editvehicle"]["supDate"].value;
		if(x==null || x=="")
		{
			alert("Supplied date should be filled out!");
			document.forms["editvehicle"]["supDate"].focus();
			return false;
		}
	}
</script>
<center><h1>Manager Area</h1></center>
</br>
</br>
		
<form action="" method="post">
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Select Vehicle : <select name="vehicleNo">
&nbsp &nbsp &nbsp  <option selected="<?php echo $currentVcl ?>"><?php echo $currentVcl ?></option>

<?php
	while($row=mysql_fetch_assoc($result3)) {
			echo "<option>".$row["vehicleNo"]."</option> \n";
			}
?>
		</select>
<input name="submit1" type="submit" value="Submit"/>
</form>
</br>
</br>


<?php
if($currentVcl==!""){
					$detail="SELECT * FROM vehicles WHERE vehicleNo='".$currentVcl."'";
					$result4=mysql_query($detail);
					$row=mysql_fetch_assoc($result4);
					}
?>

<html>
<body>
        <form method="post" action="bin/editVehicle.php" name="editvehicle" onsubmit="return validateForm()" id="editVehicle" enctype="multipart/form-data">        	

    	<table width="70%">
        	
        	<tr>
        		<td><input type="hidden" name="number" value="<?php echo $row["vehicleNo"]; ?>"/></td>
            </tr>
            <tr>
        		<td>Type</td>
            	<td><input type="text" name="type" value="<?php echo $row["type"]; ?>"/>*</td>
            </tr>
			<tr>
        		<td>Model</td>
            	<td><input type="text" name="model" value="<?php echo $row["model"]; ?>"/>*</td>
            </tr>
            <tr>
        		<td>AC</td>
				<td><?php if($row['AC']==1){?> <input type="checkbox" name="AC" checked /><?php; } else { ?><input type="checkbox" name="AC"/><?php; }?></td>
			</tr>
            <tr>
        		<td>Number of Seats</td>
            	<td><input type="text" size="2" name="seats" value="<?php echo $row["seats"]; ?>"/>*</td>
            </tr>
            <tr>
        		<td>With Driver</td>
				<td><?php if($row['withDriver']==1){?> <input type="checkbox" name="driver" checked /><?php; } else { ?><input type="checkbox" name="driver"/><?php; }?></td>
            </tr>
            <tr>
        		<td>Airport</td>
				<td><?php if($row['airport']==1){?> <input type="checkbox" name="airport" checked /><?php; } else { ?><input type="checkbox" name="airport"/><?php; }?></td>
            </tr>
			
			<tr>
        		<td>Supplier Name</td>
				<?php 
				$supp="SELECT * FROM supplier WHERE supId='".$row["supId"]."'";
				$resultSup=mysql_query($supp);
				$rowSup=mysql_fetch_assoc($resultSup);
				?>
				<td><input type="text" name="supName" value="<?php echo $rowSup["name"]; ?>"/>*</td>
			<tr>
        		<td>Supplied Date</td>
            	<td><input type="text" name="supDate" value="<?php echo $row["SupDate"]; ?>"/>(Y/M/D) *</td>
            </tr>
			<tr>
        		<td>Driver Name</td>
				<?php 
				$drv="SELECT * FROM driver WHERE drvId='".$row["drvId"]."'";
				$resultDrv=mysql_query($drv);
				$rowDrv=mysql_fetch_assoc($resultDrv);
				?>
				<td><input type="text" name="drvName" value="<?php echo $rowDrv["name"]; ?>"/></td>
			</tr>
			<tr>
        		<td>Driver Assigned Date</td>
            	<td><input type="text" name="drvAssignedDate" value="<?php echo $row["drvAssignedDate"]; ?>"/>(Y/M/D)</td>
            </tr>
			<tr>
        		<td>More</td>
            	<td><textarea rows="5" name="more"><?php echo $row["more"]; ?></textarea></td>
            </tr>
            <tr>
            <td></td>
        	<td><button type="submit">Update</button>
            </tr>
			<tr>
            	<td></td>
                <td>* required fields</td>
            </tr>
        </table>
   
        </form>
	<?php }
?>