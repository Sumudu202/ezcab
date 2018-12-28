<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");//user who are not log in redirected to the login page
	}
	
	require_once 'conDB.php';
	conDb();	

	if(isset($_POST['number']) && isset($_POST['type']) && isset($_POST['model']) && isset($_POST['seats']) && isset($_POST['supName']) && isset($_POST['supDate']) ){
		
			$number = $_POST['number'];
			$type = $_POST['type'];
			$model = $_POST['model'];
			$seats = $_POST['seats'];
			
			if(isset($_POST['AC'])){
				$AC = 1;
			}
			else {
				$AC = 0;
			}
			
			if(isset($_POST['driver'])){
				$driver = 1;
			}
			else {
				$driver = 0;
			}
			
			if(isset($_POST['airport'])){
				$airport = 1;
			}
			else {
				$airport = 0;
			}
			
			$suppName=$_POST['supName'];
			$supp="SELECT * FROM Supplier WHERE name='".$suppName."'";
			$resultSup=mysql_query($supp);
			$rowSup=mysql_fetch_assoc($resultSup);
			$supId=$rowSup["supId"];
			
			$supDate=$_POST['supDate'];
			
			$drvName=$_POST['drvName'];
			$drv="SELECT * FROM Driver WHERE name='".$drvName."'";
			$resultDrv=mysql_query($drv);
			$rowDrv=mysql_fetch_assoc($resultDrv);
			$drvId=$rowDrv["drvId"];
			
			$drvAssignedDate=$_POST['drvAssignedDate'];
			
			if(isset($_POST['more'])){
				$more = $_POST['more'];
			}
			else {
				$more = "";
			}
		
		$sql="UPDATE vehicles SET supId='$supId', supDate='$supDate', drvId='$drvId', drvAssignedDate='$drvAssignedDate', type='$type', model='$model', AC='$AC', seats='$seats', withDriver='$driver', airport='$airport', more='$more' WHERE vehicleNo='".$number."'";
		
		if (!mysql_query($sql)){
			die('Error2: ' . mysql_error());
		}else {
			echo '<script type="text/javascript"> alert("Vehicle was successfully updated"); </script>';
			echo '<body bgcolor="#F0F0F0">';
			echo "<a href=../editVehicle.php>Back to Update Vehicle</a>";
		}
				
	}
?>
