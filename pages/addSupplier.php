<?php	
	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && $_SESSION['permision'] == 2) )){
		header("location:../index.php");		
	}
	else{ ?>
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["supplier"]["name"].value;
		if(x==null || x=="")
		{
			alert("Supplier name should be filled out!");
			document.forms["supplier"]["name"].focus();
			return false;
		}
		var x=document.forms["supplier"]["address"].value;
		if(x==null || x=="")
		{
			alert("Supplier address should be filled out!");
			document.forms["supplier"]["address"].focus();
			return false;
		}
		var x=document.forms["supplier"]["phone"].value;
		var y=parseFloat(x);
		if(isNaN(y) || x.length<10 || x.length>10)
			{
				alert("Phone should be a ten digit number");
				document.forms["supplier"]["phone"].focus();
				return false;
			}
	}
	
</script>
		<center><h1>Manager Area</h1></center>
		</br> </br>
        <form method="post" action="bin/addSupplier.php" name="supplier" onsubmit="return validateForm()" id="addSupplier" enctype="multipart/form-data">        	

    	<table width="70%">
        	
        	<tr>
        		<td>Supplier Name</td>
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
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
            	<td></td>
                <td>* required fields</td>
            </tr>
        </table>
   
        </form>
	<?php }
?>