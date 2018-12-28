<?php	
	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && $_SESSION['permision'] == 2) )){
		header("location:../index.php");		
	}
	else{ ?>
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["driver"]["name"].value;
		if(x==null || x=="")
		{
			alert("Driver name should be filled out!");
			document.forms["driver"]["name"].focus();
			return false;
		}
		var x=document.forms["driver"]["address"].value;
		if(x==null || x=="")
		{
			alert("Driver address should be filled out!");
			document.forms["driver"]["address"].focus();
			return false;
		}
		var x=document.forms["driver"]["phone"].value;
		var y=parseFloat(x);
		if(isNaN(y) || x.length<10 || x.length>10)
			{
				alert("Phone should be a ten digit number");
				document.forms["driver"]["phone"].focus();
				return false;
			}
	}
</script>
		<center><h1>Manager Area</h1></center>
		</br> </br>
        <form method="post" action="bin/addDriver.php" name="driver" onsubmit="return validateForm()" id="addDriver" enctype="multipart/form-data">        	

    	<table width="70%">
        	
        	<tr>
        		<td>Driver Name</td>
            	<td><input type="text" name="name"/>*</td>
            </tr>
            <tr>
        		<td>Address</td>
				<td><textarea rows="5" name="address"></textarea> &nbsp *</td>
            </tr>
            <tr>
        		<td>Phone</td>
            	<td><input type="text" name="phone"/>*</td>
            </tr>
			<tr>
        		<td>NIC</td>
            	<td><input type="text" name="nic"/></td>
            </tr>
            <tr>
        		<td>Remarks</td>
            	<td><textarea rows="5" name="remarks"></textarea></td>
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