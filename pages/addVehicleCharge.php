<?php	
	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && $_SESSION['permision'] == 2) )){
		header("location:../index.php");		
	}
	else{ ?>
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["addVehicleCharge"]["cid"].value;
		if(x==null || x=="")
		{
			alert("Charge ID should be filled out!");
			document.forms["addVehicleCharge"]["cid"].focus();
			return false;
		}
		var x=document.forms["addVehicleCharge"]["type"].value;
		if(x==null || x=="")
		{
			alert("Vehicle type should be filled out!");
			document.forms["addVehicleCharge"]["type"].focus();
			return false;
		}
		var x=document.forms["addVehicleCharge"]["model"].value;
		if(x==null || x=="")
		{
			alert("Vehicle model should be filled out!");
			document.forms["addVehicleCharge"]["model"].focus();
			return false;
		}
		var x=document.forms["addVehicleCharge"]["chargepkm"].value;
		y=parseFloat(x);
		if(isNaN(y))
		{
			alert("Charge per KM should be a number");
			document.forms["addVehicleCharge"]["chargepkm"].focus();
			return false;
		}
		
	}
</script>
		<center><h1>Manager Area</h1></center>
		</br> </br>
        <form method="post" action="bin/addVehicleCharge.php" name="addVehicleCharge" onsubmit="return validateForm()" id="addVehicleCharge" enctype="multipart/form-data">        	

    	<table width="70%">
        	
        	<tr>
        		<td>Charge ID</td>
            	<td><input type="text" size="4" name="cid"/>*</td>
            </tr>
			<tr>
        		<td>Vehicle Type</td>
            	<td><input type="text" name="type"/>*</td>
            </tr>
            <tr>
        		<td>Model</td>
            	<td><input type="text" name="model"/>*</td>
            </tr>
            <tr>
        		<td>Charge per KM (Rs.)</td>
            	<td><input type="text" size="4" name="chargepkm"/>*</td>
            </tr>
			<tr>
        		<td>Charge per waiting hour (Rs.)</td>
            	<td><input type="text" size="4" name="chargepwaithour"/></td>
            </tr>
            <tr>
        		<td>Charge per day (Rs.)</td>
            	<td><input type="text" size="4" name="chargepday"/></td>
            </tr>
            <tr>
            <td></td>
        	<td><button type="submit">Submit</button><button type="reset">Clear</button></td>
			</tr>
			<tr>
            	<td></td>
                <td>* required fields</td>
            </tr>
        </table>
   
        </form>
	<?php }
?>