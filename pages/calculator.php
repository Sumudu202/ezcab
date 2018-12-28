<?php	
require_once 'bin/conDB.php';
//conDb();
$conn = conDb();

 @$currentNo=$_POST['vNo'];
 $query_disp="SELECT * FROM vehicles order by vehicleNo asc";
 //$result= mysql_query($query_disp);
 $result= mysqli_query($conn, $query_disp);

	?>
	
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["calculator"]["vNo"].value;
		if(x==null || x=="")
		{
			alert("Vehicle number should be selected!");
			document.forms["calculator"]["vNo"].focus();
			return false;
		}
		
		var x=document.forms["calculator"]["distance"].value;
		if(x==null || x=="")
		{
			alert("Distance should be filled out!");
			document.forms["calculator"]["distance"].focus();
			return false;
		}
		var x=document.forms["calculator"]["distance"].value;
		y=parseFloat(x);
		if(isNaN(y))
		{
			alert("Distance should be a number");
			document.forms["calculator"]["distance"].focus();
			return false;
		}
		
		var x=document.forms["calculator"]["waithour"].value;
		y=parseFloat(x);
		if(isNaN(y))
		{
			alert("waiting hours should be a number");
			document.forms["calculator"]["waithour"].focus();
			return false;
		}
		
		var x=document.forms["calculator"]["noDays"].value;
		y=parseFloat(x);
		if(isNaN(y))
		{
			alert("Number of Days should be a number");
			document.forms["calculator"]["noDays"].focus();
			return false;
		}
	}
	
	</script>

<h1>Calculator</h1>
</br>
</br>

<html>
<body>
<form method="post" action="calculator.php" name="calculator" onsubmit="return validateForm()" id="calculator" enctype="multipart/form-data">        	

<table width="70%">
			<tr></tr>
			<tr></tr>
			<tr>
			<td>Select Vehicle Number : </td>
			<td><select name="vNo">&nbsp &nbsp <option selected="<?php echo $currentNo ?>"><?php echo $currentNo ?></option>
			<?php
				//while($row=mysql_fetch_assoc($result)) {
				while($row=mysqli_fetch_assoc($result)) {
						echo "<option>".$row["vehicleNo"]."</option> \n";
						}
			?>
			</select>*</td>
			</tr>
			<tr>
        		<td>Distance (KM)</td>
            	<td><input type="text" name="distance"/>*</td>
			</tr>
			<tr>
				<td>
				<td>If you want to check the distance click <a href="http://www.mysrilanka.com/travel/distancechart.htm" target="_blank">here.</a></td>
				</td>
			</tr>
            <tr>
        		<td>Waiting Hours</td>
            	<td><input type="text" name="waithour"/>*</td>
            </tr>
			<tr>
        		<td>Number of Days</td>
            	<td><input type="text" name="noDays"/>*</td>
            </tr>
            <tr>
            <td></td>
        	<td><button type="submit">Submit</button><button type="reset">Clear</button></td>
			</tr>
			
			<?php
				if(isset($_POST['vNo']) && isset($_POST['distance'])){
					
						$vNo = $_POST['vNo'];
						$vehicleCharge="SELECT * FROM vehicles WHERE vehicleNo='".$vNo."'";
						//$resultCid=mysql_query($vehicleCharge);
						$resultCid = mysqli_query($conn, $vehicleCharge);
						//$rowCid=mysql_fetch_assoc($resultCid);
						$rowCid=mysqli_fetch_assoc($resultCid);
						$cId=$rowCid["chargeId"];
						
						$distance = $_POST['distance'];
						
						if(isset($_POST['waithour'])){
							$waithour = $_POST['waithour'];
						}
						else {
							$waithour =0;
						}
						
						if(isset($_POST['noDays'])){
							$noDays = $_POST['noDays'];
						}
						else {
							$noDays =0;
						}
						
						//finding values
						$charge="SELECT * FROM vehiclecharge WHERE cId='".$cId."'";
						//$resultCharge=mysql_query($charge);
						$resultCharge=mysqli_query($conn, $charge);
						//$rowCharge=mysql_fetch_assoc($resultCharge);
						$rowCharge=mysqli_fetch_assoc($resultCharge);
						$chargepkm=$rowCharge["chargepkm"];
						$chargepwaithour=$rowCharge["chargepwaithour"];
						$chargepday=$rowCharge["chargepday"];
						
					$charge=($distance*$chargepkm)+($waithour*$chargepwaithour)+($noDays*$chargepday);
					
				}
			?>
			<tr>
        		<td><br><br><br><br><br> Charge for the journey (Rs.) </td>
            	<td><br><br><br><br><br> <b><font size="5em" color="#B22222"><?php echo $charge; ?></font></b></td>
            </tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
            </tr>
        </table>
   
        </form>
</br>
</br>
</br>	
<br>	
<br>	
<br>	
<br>	
<p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp * Conditions apply - Please be aware this is an estimate only and subject to change  </p>	
</html>
</body>