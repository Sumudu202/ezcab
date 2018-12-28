<?php
require_once 'bin/conDB.php';
//conDb();	
$conn = conDb();

 @$currentSupp=$_POST['suppName1'];
 $query_disp1="SELECT * FROM supplier order by supId asc";
 //$result1= mysql_query($query_disp1);
 $result1= mysqli_query($conn, $query_disp1);
 
 @$currentDrv=$_POST['drvName1'];
 $query_disp2="SELECT * FROM driver order by drvId asc";
 //$result2= mysql_query($query_disp2);
 $result2= mysqli_query($conn, $query_disp2);
	
	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && $_SESSION['permision'] == 2) )){
		header("location:../index.php");		
	}
	else{ ?>
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["vehicle"]["number"].value;
		if(x==null || x=="")
		{
			alert("Vehicle number should be filled out!");
			document.forms["vehicle"]["number"].focus();
			return false;
		}
		var x=document.forms["vehicle"]["type"].value;
		if(x==null || x=="")
		{
			alert("Vehicle type should be filled out!");
			document.forms["vehicle"]["type"].focus();
			return false;
		}
		var x=document.forms["vehicle"]["model"].value;
		if(x==null || x=="")
		{
			alert("Vehicle model should be filled out!");
			document.forms["vehicle"]["model"].focus();
			return false;
		}
		var x=document.forms["vehicle"]["seats"].value;
		if(x==null || x=="")
		{
			alert("Number of Seats should be filled out!");
			document.forms["vehicle"]["seats"].focus();
			return false;
		}
		var x=document.forms["vehicle"]["seats"].value;
		y=parseFloat(x);
		if(isNaN(y))
		{
			alert("Number of Seats should be a number");
			document.forms["vehicle"]["seats"].focus();
			return false;
		}
		var x=document.forms["vehicle"]["suppName1"].value;
		if(x==null || x=="")
		{
			alert("Supplier Name should be filled out!");
			document.forms["vehicle"]["suppName1"].focus();
			return false;
		}
		var x=document.forms["vehicle"]["supDate"].value;
		if(x==null || x=="")
		{
			alert("Supplied date should be filled out!");
			document.forms["vehicle"]["supDate"].focus();
			return false;
		}
	}
</script>
		<center><h1>Manager Area</h1></center>
		</br> </br>
        <form method="post" action="bin/addVehicle.php" name="vehicle" onsubmit="return validateForm()" id="addVehicle" enctype="multipart/form-data">        	

    	<table width="70%">
        	
        	<tr>
        		<td>Vehicle No</td>
            	<td><input type="text" name="number"/>*</td>
            </tr>
            <tr>
        		<td>Type</td>
				<td><input type="text" name="type"/>*</td>
            </tr>
			<tr>
        		<td>Model</td>
            	<td><input type="text" name="model"/>*</td>
            </tr>
            <tr>
        		<td>Picture</td>
            	<td><input type="file" name="file"/></td>
            </tr>
            <tr>
        		<td>AC</td>
            	<td><input type="checkbox" name="AC"/></td>
            </tr>
            <tr>
        		<td>Number of Seats</td>
            	<td><input type="text" size="2" name="seats"/>*</td>
            </tr>
            <tr>
        		<td>With Driver</td>
            	<td><input type="checkbox" name="driver"/></td>
            </tr>
            <tr>
        		<td>Airport</td>
            	<td><input type="checkbox" name="airport"/></td>
            </tr>
			
			<tr>
        		<td>Supplier Name</td>
				<td><select name="suppName1">
					&nbsp &nbsp <option selected="<?php echo $currentSupp ?>"><?php echo $currentSupp ?></option>

					<?php
						//while($row=mysql_fetch_assoc($result1)) {
						while($row=mysqli_fetch_assoc($result1)) {
								echo "<option>".$row["name"]."</option> \n";
								}
					?>
					</select>*</td>
			<tr>
        		<td>Supplied Date</td>
            	<td><input type="text" name="supDate"/>(Y/M/D) *</td>
            </tr>
			<tr>
        		<td>Driver Name</td>
				<td><select name="drvName1">
					&nbsp &nbsp <option selected="<?php echo $currentDrv ?>"><?php echo $currentDrv ?></option>

					<?php
						//while($row=mysql_fetch_assoc($result2)) {
						while($row=mysqli_fetch_assoc($result2)) {
								echo "<option>".$row["name"]."</option> \n";
								}
					?>
					</select></td>
			</tr>
			<tr>
        		<td>Driver Assigned Date</td>
            	<td><input type="text" name="drvAssignedDate"/>(Y/M/D)</td>
            </tr>
			<tr>
        		<td>More</td>
            	<td><textarea rows="5" name="more"></textarea></td>
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