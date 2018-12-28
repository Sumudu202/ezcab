<?php
	session_start();
	
	require_once 'conDB.php';
	//conDb();
	$conn = conDb();
	
	$sql = "select * from users where username = '".$_POST['userName']."' and password = '".$_POST['password']."'";
	
	//echo $sql;
	
	//$result = mysql_query($sql);
	$result = mysqli_query($conn, $sql);
	
	//if(mysql_num_rows($result)>0){
	if(mysqli_num_rows($result)>0){
		//$user = mysql_fetch_array($result);
		$user = mysqli_fetch_assoc($result);
		
		$_SESSION['user'] = $user['userName'];
		$_SESSION['permision'] = $user['permision'];
		$_SESSION['userID'] = $user['userId'];
		$_SESSION['name'] = $user['name'];
		header("location:../".$_POST['page'].".php");	
	}
	else{
		header("location:../".$_POST['page'].".php?err=1");	
	}
?>