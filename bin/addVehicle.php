<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:../index.php");//user who are not log in redirected to the login page
	}
	
	require_once 'conDB.php';
	//conDb();	
	$conn = conDb();	
	
			$imageName = "";
			
			if(isset($_POST['number'])){
				$imageName = $_POST['number'];
			}
			else {
				$imageName = $_FILES["file"]["name"];
			}
			
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
			&& ($_FILES["file"]["size"] < 2000000))
			  {
			  if ($_FILES["file"]["error"] > 0)
				{
				//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
				}
			  else
				{
				//echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				//echo "Type: " . $_FILES["file"]["type"] . "<br />";
				//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			
				if (file_exists("../upload/" . $imageName.".".$_FILES["file"]["type"]))
				  {
				  //echo $imageName.".".$_FILES["file"]["type"] . " already exists. ";
				  }
				else
				  {
					if ($_FILES["file"]["type"]=="image/gif"){
						$type = "gif";
					}elseif(($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg")){
						$type = "jpg";	
					}
					
					
					//echo "<br />".$imageName.".".$type;
				  move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/" . $imageName.".".$type);
				  //echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
				  
				  }
				}
			  }
			else
			  {
			  echo "Invalid file";
			  }
	
	if(isset($_POST['number']) && isset($_POST['type']) && isset($_POST['model']) && isset($_POST['seats']) && isset($_POST['suppName1']) && isset($_POST['supDate']) ){
		
			$number = $_POST['number'];
			$imageName = $number.".".$type;
			$type = $_POST['type'];
			$model = $_POST['model'];
			$seats = $_POST['seats'];
			
			if(isset($_POST['AC'])){
				$AC = 1;
			}
			else {
				$AC = 0;
			}
			
			if(isset($_POST['driver'])){
				$driver = 1;
			}
			else {
				$driver = 0;
			}
			
			if(isset($_POST['airport'])){
				$airport = 1;
			}
			else {
				$airport = 0;
			}
			
			$suppName=$_POST['suppName1'];
			$supp="SELECT * FROM Supplier WHERE name='".$suppName."'";
			//$resultSup=mysql_query($supp);
			$resultSup=mysqli_query($conn, $supp);
			//$rowSup=mysql_fetch_assoc($resultSup);
			$rowSup=mysqli_fetch_assoc($resultSup);
			$supId=$rowSup["supId"];
			
			$supDate=$_POST['supDate'];
			
			$drvName=$_POST['drvName1'];
			$drv="SELECT * FROM Driver WHERE name='".$drvName."'";
			//$resultDrv=mysql_query($drv);
			$resultDrv=mysqli_query($conn, $drv);
			//$rowDrv=mysql_fetch_assoc($resultDrv);
			$rowDrv=mysqli_fetch_assoc($resultDrv);
			$drvId=$rowDrv["drvId"];
			
			$drvAssignedDate=$_POST['drvAssignedDate'];
			
			$CID="SELECT * FROM vehiclecharge WHERE type='".$type."' AND model='".$model."'";
			//$availabilityResult=mysql_query($CID);
			$availabilityResult=mysqli_query($conn, $CID);
			//$resultCid=mysql_query($CID);
			$resultCid=mysqli_query($conn, $CID);
			//$rowCid=mysql_fetch_assoc($resultCid);
			$rowCid=mysqli_fetch_assoc($resultCid);
			$cId=$rowCid["cId"];
			
			//if(mysql_num_rows($availabilityResult)!=0)
			if(mysqli_num_rows($availabilityResult)!=0)
			{
				if(isset($_POST['more'])){
					$more = $_POST['more'];
				}
				else {
					$more = "";
				}
			
				$sql="Insert into vehicles (vehicleNo, supId, supDate, drvId, drvAssignedDate, type, model, AC, seats, withDriver, airport, more, image, status, chargeId) values('$number', '$supId', '$supDate', '$drvId', '$drvAssignedDate', '$type', '$model', '$AC', '$seats', '$driver', '$airport', '$more', '$imageName', '1', '$cId')";
				
				//if (!mysql_query($sql)){
				if (!mysqli_query($conn, $sql)){
					die('Error2: ' . mysql_error());
				}else {
					echo '<script type="text/javascript"> alert("Vehicle was successfully added"); </script>';
					echo '<body bgcolor="#F0F0F0">';
					echo "<a href=../addVehicle.php>Back to Vehicle Addition</a>";
				}
			}
			else{
				echo '<script type="text/javascript"> alert("Vehicle Type or Model is not Registered!!!"); </script>';
				echo '<body bgcolor="#F0F0F0">';
				echo "<a href=../addVehicle.php>Back to Vehicle Addition</a>";
			}
	}
?>
