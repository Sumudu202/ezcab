<?php
	function conDb(){
		//$link = mysql_connect("localhost","root","") or die("Can't Connect to the server");
		//mysql_select_db("ezcab")or die("selecting database error");
		
		$db_host        = '104.37.86.39';
		$db_user        = 'loxicrnr';
		$db_pass        = '!0Z#r2lp5cRLZ5';
		$db_database    = 'loxicrnr'; 
		$db_port        = '3306';
		$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database,$db_port);
		
		return $conn;
	}
?>