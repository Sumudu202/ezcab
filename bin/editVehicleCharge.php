<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");//user who are not log in redirected to the login page
	}
	
	require_once 'conDB.php';
	conDb();	

	
	if(isset($_POST['cid']) && isset($_POST['type']) && isset($_POST['model']) && isset($_POST['chargepkm'])){
		
			$cid = $_POST['cid'];
			$type = $_POST['type'];
			$model = $_POST['model'];
			$chargepkm = $_POST['chargepkm'];
			$chargepwaithour = $_POST['chargepwaithour'];
			$chargepday = $_POST['chargepday'];
			
		$sql="UPDATE vehicleCharge SET type='$type', model='$model', chargepkm='$chargepkm', chargepwaithour='$chargepwaithour', chargepday='$chargepday' WHERE cId='".$cid."'";
		
		if (!mysql_query($sql)){
			die('Error2: ' . mysql_error());
		}
		else {
			//header("location:../addSupplier.php");	
			echo '<script type="text/javascript"> alert("Vehicle charge was successfully updated"); </script>';
			echo '<body bgcolor="#F0F0F0">';
			echo "<a href=../editVehicleCharge.php> Back to Vehicle Charge Update</a>";
		}
	}
?>