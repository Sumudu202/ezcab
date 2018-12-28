<?php	
require_once 'bin/conDB.php';
conDb();

@$currentDrv=$_POST['drvName1'];
 $query_disp="SELECT * FROM driver order by drvId asc";
 $result= mysql_query($query_disp);

	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && ($_SESSION['permision'] == 2 || $_SESSION['permision'] == 3) ))){
		header("location:../index.php");		
	}
	else{ ?>
 <script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["editdriver"]["name"].value;
		if(x==null || x=="")
		{
			alert("Driver name should be filled out!");
			document.forms["editdriver"]["name"].focus();
			return false;
		}
		var x=document.forms["editdriver"]["address"].value;
		if(x==null || x=="")
		{
			alert("Driver address should be filled out!");
			document.forms["editdriver"]["address"].focus();
			return false;
		}
		var x=document.forms["editdriver"]["phone"].value;
		var y=parseFloat(x);
		if(isNaN(y) || x.length<10 || x.length>10)
			{
				alert("Phone should be a ten digit number");
				document.forms["editdriver"]["phone"].focus();
				return false;
			}
	}
</script>

<center><h1>Manager Area</h1></center>
</br> </br>
<form action="" method="post">
&nbsp &nbsp &nbsp Select Driver Name : <select name="drvName1">
&nbsp &nbsp <option selected="<?php echo $currentDrv ?>"><?php echo $currentDrv ?></option>

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
if($currentDrv==!""){
					$detail="SELECT * FROM driver WHERE name='".$currentDrv."'";
					$result=mysql_query($detail);
					$row=mysql_fetch_assoc($result);
					}
?>

<html>
<body>
 <form method="post" action="bin/editDriver.php" name="editdriver" onsubmit="return validateForm()" id="editDriver" enctype="multipart/form-data">        	

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
