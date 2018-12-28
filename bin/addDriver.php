<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");//user who are not log in redirected to the login page
	}
	
	require_once 'conDB.php';
	//conDb();	
	$conn = conDb();
	
	if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])){
		
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$nic = $_POST['nic'];
			$joinedDate=date("Y/m/d");
			
			if(isset($_POST['remarks'])){
				$remarks = $_POST['remarks'];
			}
			else {
				$remarks = "";
			}
		
		$availability="select * From driver where name='".$name."'";
		//$availabilityResult=mysql_query($availability);
		$availabilityResult=mysqli_query($conn, $availability);
		//if(mysql_num_rows($availabilityResult)==0)
		if(mysqli_num_rows($availabilityResult)==0)
		{
		$sql="Insert into driver (name, address, phone, NIC, joinedDate, remarks) values('$name', '$address', '$phone', '$nic', '$joinedDate', '$remarks')";
		
		//if (!mysql_query($sql)){
		if (!mysqli_query($conn, $sql)){
			die('Error2: ' . mysql_error());
		}else {
			//header("location:../addDriver.php");	
			echo '<script type="text/javascript"> alert("Driver was successfully registered"); </script>';
			echo "<a href=../addDriver.php> Back to Driver Addition</a>";
		}
		}
		else 
		{
		echo '<script type="text/javascript"> alert("Driver name already exists!"); </script>';
		//header("Location:../register.php");
		echo '<body bgcolor="#F0F0F0">';
		echo "<a href=../addDriver.php> Back to Driver Addition</a>";
		}
	}
?>