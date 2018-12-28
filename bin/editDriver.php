<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");//user who are not log in redirected to the login page
	}
	
	require_once 'conDB.php';
	conDb();	

	
	if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])){
		
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$nic = $_POST['nic'];
			
			if(isset($_POST['remarks'])){
				$remarks = $_POST['remarks'];
			}
			else {
				$remarks = "";
			}
		$sql="UPDATE driver SET address='$address', phone='$phone', NIC='$nic', remarks='$remarks' WHERE name='".$name."'";
		
		if (!mysql_query($sql)){
			die('Error2: ' . mysql_error());
		}
		else {
			//header("location:../addDriver.php");	
			echo '<script type="text/javascript"> alert("Driver was successfully updated"); </script>';
			echo '<body bgcolor="#F0F0F0">';
			echo "<a href=../editDriver.php>Back to Driver Update</a>";
		}
		
	}
?>