<?php	
require_once 'bin/conDB.php';
conDb();

@$currentSupp=$_POST['suppName1'];
 $query_disp="SELECT * FROM supplier order by supId asc";
 $result= mysql_query($query_disp);

	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && ($_SESSION['permision'] == 2 || $_SESSION['permision'] == 3) ))){
		header("location:../index.php");		
	}
	else{ ?>
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["editsupplier"]["name"].value;
		if(x==null || x=="")
		{
			alert("Supplier name should be filled out!");
			document.forms["editsupplier"]["name"].focus();
			return false;
		}
		var x=document.forms["editsupplier"]["address"].value;
		if(x==null || x=="")
		{
			alert("Supplier address should be filled out!");
			document.forms["editsupplier"]["address"].focus();
			return false;
		}
		var x=document.forms["editsupplier"]["phone"].value;
		var y=parseFloat(x);
		if(isNaN(y) || x.length<10 || x.length>10)
			{
				alert("Phone should be a ten digit number");
				document.forms["editsupplier"]["phone"].focus();
				return false;
			}
	}
</script>

<center><h1>Manager Area</h1></center>
</br>
</br>

<form action="" method="post">
&nbsp &nbsp &nbsp Select Supplier Name : <select name="suppName1">
&nbsp &nbsp <option selected="<?php echo $currentSupp ?>"><?php echo $currentSupp ?></option>

<?php
	while($row=mysql_fetch_assoc($result)) {
			echo "<option>".$row["name"]."</option> \n";
			}
?>
		</select>
<input name="submit1" type="submit" value="Submit"/>
</form>

</br> </br>
<?php
if($currentSupp==!""){
					$detail="SELECT * FROM supplier WHERE name='".$currentSupp."'";
					$result=mysql_query($detail);
					$row=mysql_fetch_assoc($result);
					}
?>

<html>
<body>
 <form method="post" action="bin/editSupplier.php" name="editsupplier" onsubmit="return validateForm()" id="editSupplier" enctype="multipart/form-data">        	

<table width="70%">
			<tr></tr>
			<tr></tr>
			<tr>
        		<td></td>
            	<td><input type="hidden" name="name" value="<?php echo $row["name"]; ?>"/></td>
            </tr>
            <tr>
        		<td>Address</td>
            	<td><textarea rows="5" name="address"><?php echo $row["address"]; ?></textarea>*</td>
			</tr>
            <tr>
        		<td>Phone</td>
            	<td><input type="text" name="phone" value="<?php echo $row["phone"]; ?>"/>*</td>
            </tr>
			<tr>
        		<td>NIC</td>
            	<td><input type="text" name="nic" value="<?php echo $row["NIC"]; ?>"/></td>
            </tr>
            <tr>
        		<td>Remarks</td>
            	<td><textarea rows="5" name="remarks"><?php echo $row["remarks"]; ?> </textarea></td>
            </tr>
            <tr>
            <td></td>
        	<td><button type="submit">Update</button></td>
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
