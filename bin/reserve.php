<?php 

	if(isset($_POST['customerID']) && isset($_POST['vehicleID']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['from']) && isset($_POST['to']) && isset($_POST['comment'])){
		$customerID = $_POST['customerID'];
		$vehicleID = $_POST['vehicleID'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$from = $_POST['from'];
		$to = $_POST['to'];
		$comment = $_POST['comment']; 
		
		require_once 'conDB.php';
		//conDb();
		$conn = conDb();
		
		$qry = "insert into reservation (customerID, vehicleID, dueDate, dueTime, startFrom, goingTo, comments, completed) values('$customerID', '$vehicleID', '$date', '$time', '$from', '$to', '$comment', '0')";
		
		//mysql_query($qry);	
		mysqli_query($conn, $qry);
		
		$qry1 = "update vehicles set status='0' where vehicleNo = '$vehicleID'";
		
		//if(mysql_query($qry1)){
		if(mysqli_query($conn, $qry1)){
			header("Location:../reserve.php?success='1'");
		}
		else {
			echo mysql_error();
		}
		
		
	}
?>