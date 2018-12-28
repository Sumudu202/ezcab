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
         	<center><font size="2">ezCabs Copyright &copy; 2016. All Rights Reserved.</font> </center>
			<center><font size="1"> Designed and developped by Sumudu Manic Purage</font></center>
        </div>
    </div>
</body>
</html>
