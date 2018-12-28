<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "Still you are not login to the system, if you donot have an account goto <a href=register.php>resiter</a> otherwise please login to your account";
}
?>