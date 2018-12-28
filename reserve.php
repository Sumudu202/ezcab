<?php 
	session_start();
	
	if(isset($_SESSION['permision']) && isset($_SESSION['user'])){
	
	$page = "reserve";
	$title = "Manager Area - Make Reservation";
	$current = "reserve";
	
	include "design.php";
	
	}
	else {
		//header("Location:index.php?err=2");
		echo '<script type="text/javascript"> alert("You must login or register before researving a vehicle !!!"); </script>';
		echo "<a href=../register.php> User Registration</a>";
	}
?>