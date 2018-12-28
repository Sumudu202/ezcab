<?php	
require_once 'bin/conDB.php';
conDb();

 @$currentDrv=$_POST['drvName1'];
 $query_disp="SELECT * FROM driver order by drvId asc";
 $result= mysql_query($query_disp);

	if(!(isset($_SESSION['user']) && (isset($_SESSION['permision']) && $_SESSION['permision'] == 2) )){
		header("location:../index.php");		
	}
	else{ ?>

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
					$detail="SELECT * FROM Driver WHERE name='".$currentDrv."'";
					$result=mysql_query($detail);
					$row=mysql_fetch_assoc($result);
					}
?>

<html>
<body>
 <form method="post" action="bin/deleteDriver.php" name="deletedriver" onsubmit="return validateForm()" id="deleteDriver" enctype="multipart/form-data">        	

<table width="70%">

			<tr>
        		<td></td>
            	<td><input type="hidden" name="name" value="<?php echo $row["name"]; ?>"/></td>
            </tr>
            <tr>
        		<td>Address</td>
            	<td><?php echo $row["address"]; ?></td>
            </tr>
            <tr>
        		<td>Phone</td>
            	<td><?php echo $row["phone"]; ?></td>
            </tr>
			<tr>
        		<td>NIC</td>
            	<td><?php echo $row["NIC"]; ?></td>
            </tr>
            <tr>
        		<td>Remarks</td>
            	<td><?php echo $row["remarks"]; ?></textarea></td>
            </tr>
			
			<tr>
        		<td></td>
				<td ><br><input type="submit" value="Delete Driver"></td>
            </tr>
							

</table>
   
        </form>
<?php }
?>
</html>
</body>
