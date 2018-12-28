<?php 
	session_start();
	
	if(isset($_SESSION['permision']) && ($_SESSION['permision']=='2'||$_SESSION['permision']=='3')){
	
	$page = "reservations";
	$title = "Manager Area - Current Reservations";
	$current = "reservations";
	
	include "design.php";
	
	}
	else {
		header("Location:index.php");
	}
?>