<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");//user who are not log in redirected to the login page
	}
	
	require_once 'conDB.php';
	conDb();	

		$name = $_POST['name'];

		$sql="DELETE FROM driver WHERE name='".$name."'";
		
		if (!mysql_query($sql)){
			die('Error2: ' . mysql_error());
		}
		else {
			//header("location:../deleteSupplier.php");	
			echo '<script type="text/javascript"> alert("Driver was successfully deleted"); </script>';
			echo '<body bgcolor="#F0F0F0">';
			echo "<a href=../deleteDriver.php>Back to Driver Delete</a>";
		}
?>

