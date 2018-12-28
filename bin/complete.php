<?php 
	session_start();
	if(!(isset($_SESSION['user']) && isset($_SESSION['permision']) && $_SESSION['permision']==2)){
		header("Location:../index.php?err=2");//user who are not log in redirected to the login page
	}
	
	if(isset($_GET['resvID']) && isset($_GET['vehicle'])){
		$resvID = $_GET['resvID'];
		$vehicle = $_GET['vehicle'];
		require_once 'conDB.php';
		conDb();
		
		$qry = "update reservation set completed='1' where reservationID='$resvID'";
		
		if(!mysql_query($qry)){
			//echo mysql_error();	
		}
		else {
			$qry1 = "update vehicles set status='1' where vehicleNo='$vehicle'";
		
			if(!mysql_query($qry1)){
				//echo mysql_error();	
		}
		else {
			//echo "Success";  
			header("location:../reservations.php");
		}
				
		}
	}
					
	
?>