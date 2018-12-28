<?php 
	session_start();
	
	require_once 'conDB.php';
	//conDb();
	$conn = conDb();

	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$mail = $_POST['email'];
		
		if(!isset($_POST['address'])){
			$address = "";				 
		}
		else {
			$address = $_POST['address'];	
		}
		
		if(!isset($_POST['NIC'])){
			$NIC = "";				 
		}
		else {
			$NIC = $_POST['NIC'];	
		}
		$availability="select * From users where userName='".$username."'";
		//$availabilityResult=mysql_query($availability);
		$availabilityResult=mysqli_query($conn, $availability);
		//if(mysql_num_rows($availabilityResult)==0)
		if(mysqli_num_rows($availabilityResult)==0)
		{
		$qry1 = "insert into users (userName, password, name, permision) values('$username', '$password', '$name', '1' )";
		$qry2 = "insert into customer (name, address, phone, email, NIC) values('$name', '$address', '$phone', '$mail', '$NIC')";
		
		//if(mysql_query($qry1) && mysql_query($qry2)){
		if(mysqli_query($conn, $qry1) && mysqli_query($conn, $qry2)){
			$_SESSION['user'] = $username;
			$_SESSION['permision'] = '1';
			header("Location:../register.php");
		}
		else {
			echo "Record not added";	
		}
		}
		else 
		{
		echo '<script type="text/javascript"> alert("user name already exists!"); </script>';
		//header("Location:../register.php");
		echo '<body bgcolor="#F0F0F0">';
		echo "<a href=../register.php> Back to Registration</a>";
		}
		}
?>