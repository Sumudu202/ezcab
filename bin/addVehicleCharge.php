<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");//user who are not log in redirected to the login page
	}
	
	require_once 'conDB.php';
	//conDb();
	$conn = conDb();	

	
	if(isset($_POST['cid']) && isset($_POST['type']) && isset($_POST['model']) && isset($_POST['chargepkm'])){
		
			$cid = $_POST['cid'];
			$type = $_POST['type'];
			$model = $_POST['model'];
			$chargepkm = $_POST['chargepkm'];
			$chargepwaithour = $_POST['chargepwaithour'];
			$chargepday = $_POST['chargepday'];
			
		$sql="Insert into vehiclecharge (cId, type, model, chargepkm, chargepwaithour, chargepday) values('$cid', '$type', '$model', '$chargepkm', '$chargepwaithour', '$chargepday')";
		
		//if (!mysql_query($sql)){
		if (!mysqli_query($conn, $sql)){
			die('Error2: ' . mysql_error());
		}
		else {
			//header("location:../addSupplier.php");	
			echo '<script type="text/javascript"> alert("Vehicle charge was successfully added"); </script>';
			echo '<body bgcolor="#F0F0F0">';
			echo "<a href=../addVehicleCharge.php> Back to Vehicle Charge</a>";
		}
	}
?>