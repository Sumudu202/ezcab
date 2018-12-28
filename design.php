<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ezCab - just for you - <?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
a.one:link {color:#0000ff}
a.one:visited {color: #A0522D}
a.one:hover {color: #FF00FF}
a.one:active {color: #00ff00}

a.two:link {color:#A0522D}
a.two:visited {color: #4D4D4D}
a.two:hover {color: #FF00FF}
a.two:active {color: #00ff00}
</style>

<script type="text/javascript">

	function validateForm()
	{
		var x=document.forms["login"]["userName"].value;
		if(x==null || x=="")
		{
			alert("User name should be filled out!");
			document.forms["login"]["userName"].focus();
			return false;
		}
		var x=document.forms["login"]["password"].value;
		if(x==null || x=="")
		{
			alert("Password should be filled out!");
			document.forms["login"]["password"].focus();
			return false;
		}
	}
</script>

</head>

<body>
	<div id="container">
    	<div id="header">
        	<div id="navi">
	            	<ul>
	                	<li><a href="index.php">&nbsp &nbsp <b>Home</b></a></li><font color="white">|</font>
						<li><a href="services.php"><b>Services</b></a></li><font color="white">|</font>
						<li><a href="gallary.php"><b>Gallery</b></a></li><font color="white">|</font>
	                    <li><a href="register.php"><b>Register</b></a></li><font color="white">|</font>  
						<li><a href="calculator.php"><b>Calculator</b></a></li><font color="white">|</font>						
	                    <li><a href="about.php"><b>About Us</b></a></li><font color="white">|</font>
	                    <li><a href="contact.php"><b>Contact Us</b></a></li>
	                </ul>
            </div>
            <div id="intro">
            	Welcome to the easiest way to getting arround. <b>ezCabs</b> just for you!
            </div>
        </div>
        <div id="body">
        	<div id="mainContent">
            	<div id="mainContentTop"></div>
                <div id="mainContentMid">
                	<?php include "pages/".$page.".php"; ?>                	
                </div>
                <div id="mainContentBottom"></div>
            </div>
            <div id="sidebar">
            	<?php
					if(!isset($_SESSION['user'])){ ?>
						<p class="header">Log In</p>
						<div class="content">
                        	<?php if(isset($_GET['err']) && ($_GET['err'] == 1)){?>
                            	<p class="err">Sorry. Incorrect usrname or password. Try again!</p>
                            <?php } 
							if(isset($_GET['err']) && $_GET['err'] == 2){?>
                            	<p class="err">You shoud Login first to make a resservation</p>
                            <?php }	?>
							<form method="post" action="bin/login.php" onsubmit="return validateForm()" name="login">
								<label>User Name</label>
								<input type="text" name="userName" id="userName" />
								<label>Password</label>
								<input type="password" name="password" id="password" />
                                <input type="hidden" name="page" value="<?php echo $current; ?>"/>
								<button type="submit">Login</button>
							</form>
						</div>
					<?php }
					else { ?>
						<p class="header">Hi! <?php echo $_SESSION['user']; ?></p>
                        <form method="post" action="bin/logout.php">								
								<center><button type="submit" style="float:none">Log out</button></center>                               
							</form>
					<?php }
						if(isset($_SESSION['permision']) && $_SESSION['permision']=='3'){
					?>								
						
						<font color="blue">Update</font>
						<div>&nbsp &nbsp &nbsp &nbsp &nbsp <a href="editSupplier.php" class="one">Supplier</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="editDriver.php" class="one">Driver</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="editVehicle.php" class="one">Vehicle</a></div>
						
						<hr>
						<div><a href="reservations.php" class="one"> Current Reservations </a>
						<br>
						<a href="chat.php" class="one">Chat</a> </div>
						
					<?php }
						if(isset($_SESSION['permision']) && $_SESSION['permision']=='2'){
					?>								
						<font color="blue">Add</font>
						<div>&nbsp &nbsp &nbsp &nbsp &nbsp <a href="addSupplier.php" class="one">Supplier</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="addDriver.php" class="one">Driver</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="addVehicle.php" class="one">Vehicle</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="addVehicleCharge.php" class="one">Vehicle Charge</a></div>
						
						<hr>
						
						<font color="blue">Update</font>
						<div>&nbsp &nbsp &nbsp &nbsp &nbsp <a href="editSupplier.php" class="one">Supplier</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="editDriver.php" class="one">Driver</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="editVehicle.php" class="one">Vehicle</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="editVehicleCharge.php" class="one">Vehicle Charge</a></div>
						
						<br>
						<font color="blue">Delete</font>
						<div>&nbsp &nbsp &nbsp &nbsp &nbsp <a href="deleteSupplier.php" class="one">Supplier</a>
						<br>
						&nbsp &nbsp &nbsp &nbsp &nbsp <a href="deleteDriver.php" class="one">Driver</a> </div>
						
						<hr>
						<div><a href="reservations.php" class="one"> Current Reservations </a>
						<br>
						<a href="chat.php" class="one">Chat</a> </div>
						
                  
           			<?php }
						if(isset($_SESSION['permision']) && $_SESSION['permision']=='1'){
					?>								
						<p><a href="chat.php" class="one">Chat</a></p>
						
					<?php }
					?>
            </div>
        </div>
		<div id="footer">
			<a href="index.php" class="two"><b>Home</b></a><font color="black">|</font>
			<a href="services.php" class="two"><b>Services</b></a><font color="black">|</font>
			<a href="gallary.php" class="two"><b>Gallery</b></a><font color="black">|</font>
	        <a href="register.php" class="two"><b>Register</b></a><font color="black">|</font>  
			<a href="calculator.php" class="two"><b>Calculator</b></a><font color="black">|</font>						
	        <a href="about.php" class="two"><b>About Us</b></a><font color="black">|</font>
	        <a href="contact.php" class="two"><b>Contact Us</b></a>
			<br>
			<br>
         	<center><font size="2">ezCabs Copyright &copy; 2016. All Rights Reserved.</font></center>
			<center><font size="1"> Designed and developped by Sumudu Manic Purage</font></center> 
        </div>
    </div>
</body>
</html>
