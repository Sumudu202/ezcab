<?php	
	require_once 'bin/conDB.php';
	conDb();

 @$currentCID=$_POST['cid1'];
 $query_disp="SELECT * FROM vehicleCharge order by cId asc";
 $result= mysql_query($query_disp);

	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && $_SESSION['permision'] == 2) )){
		header("location:../index.php");		
	}
	else{ ?>
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["editVehicleCharge"]["type"].value;
		if(x==null || x=="")
		{
			alert("Vehicle type should be filled out!");
			document.forms["editVehicleCharge"]["type"].focus();
			return false;
		}
		var x=document.forms["editVehicleCharge"]["model"].value;
		if(x==null || x=="")
		{
			alert("Vehicle model should be filled out!");
			document.forms["editVehicleCharge"]["model"].focus();
			return false;
		}
		var x=document.forms["editVehicleCharge"]["chargepkm"].value;
		y=parseFloat(x);
		if(isNaN(y))
		{
			alert("Charge per KM should be a number");
			document.forms["editVehicleCharge"]["chargepkm"].focus();
			return false;
		}
		
	}
</script>
<center><h1>Manager Area</h1></center>
</br> </br>
<form action="" method="post">
&nbsp &nbsp &nbsp Select Charge ID : <select name="cid1">
&nbsp &nbsp <option selected="<?php echo $currentCID ?>"><?php echo $currentCID ?></option>

<?php
	while($row=mysql_fetch_assoc($result)) {
			echo "<option>".$row["cId"]."</option> \n";
			}
?>
		</select>
<input name="submit1" type="submit" value="Submit"/>
</form>
</br> </br>

<?php
if($currentCID==!""){
					$detail="SELECT * FROM vehicleCharge WHERE cId='".$currentCID."'";
					$result=mysql_query($detail);
					$row=mysql_fetch_assoc($result);
					}
?>

<html>
<body>
        <form method="post" action="bin/editVehicleCharge.php" name="editVehicleCharge" onsubmit="return validateForm()" id="editVehicleCharge" enctype="multipart/form-data">        	

    	<table width="70%">
        	
        	<tr>
        		<td><input type="hidden" size="4" name="cid" value="<?php echo $row["cId"]; ?>"/></td>
            </tr>
			<tr>
        		<td>Vehicle Type</td>
            	<td><input type="text" name="type" value="<?php echo $row["type"]; ?>"/>*</td>
            </tr>
            <tr>
        		<td>Model</td>
            	<td><input type="text" name="model" value="<?php echo $row["model"]; ?>"/>*</td>
            </tr>
            <tr>
        		<td>Charge per KM (Rs.)</td>
            	<td><input type="text" size="4" name="chargepkm" value="<?php echo $row["chargepkm"]; ?>"/>*</td>
            </tr>
			<tr>
        		<td>Charge per waiting hour (Rs.)</td>
            	<td><input type="text" size="4" name="chargepwaithour" value="<?php echo $row["chargepwaithour"]; ?>"/></td>
            </tr>
            <tr>
        		<td>Charge per day (Rs.)</td>
            	<td><input type="text" size="4" name="chargepday" value="<?php echo $row["chargepday"]; ?>"/></td>
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
</html>
</body>