						<?php
						include 'connection.php';
						include 'cookies.php';
						session_start();
						$message = "";
						$userId = $_COOKIE['userid'];
						$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
						$mysql_username = 'fall14seniorproj';
						$mysql_password = 'Seniorproject1#';
						$mysql_dbname = 'fall14seniorproj';
						// Connect to server and select database.
						$con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
						if (mysqli_connect_errno())
							{
						  	print "<script type=\"text/javascript\">"; 
							print "alert('ERROR Connecting/Sending data to database! Nothing was added/updated/or modified.')"; 
							print "</script>";
							echo  "<a href=\"website.php\">BACK TO MAIN PAGE</a>";  
							}
						else
						{
						$VName = mysqli_real_escape_string($con, $_POST['VName']);
						$VAddress = mysqli_real_escape_string($con, $_POST['VAddress']);
						$VCity = mysqli_real_escape_string($con, $_POST['VCity']);
						$VState= mysqli_real_escape_string($con, $_POST['VState']);
						$VZip = mysqli_real_escape_string($con, $_POST['VZip']);
						$VPPHone= mysqli_real_escape_string($con, $_POST['VPPHone']);
						$VShone = mysqli_real_escape_string($con, $_POST['VShone']);
						$VFaxNum = mysqli_real_escape_string($con, $_POST['VFaxNum']);
						$VSaleFN = mysqli_real_escape_string($con, $_POST['VSaleFN']);
						$VSaleLN = mysqli_real_escape_string($con, $_POST['VSaleLN']);
						$Parent = mysqli_real_escape_string($con, $_POST['Parent']);
						$StoreID = mysqli_real_escape_string($con, $_POST['StoreID']);
						$POCFN = mysqli_real_escape_string($con, $_POST['POCFN']);
						$POCLN= mysqli_real_escape_string($con, $_POST['POCLN']);
						$VEmail = mysqli_real_escape_string($con, $_POST['VEmail']);
						$User_ID=$_COOKIE['User_ID'];
						
						// Insert data into mysql 
						$sql="INSERT IGNORE INTO VENDOR(Company,Parent,POC_FN,POC_LN, Vender_Phone1,Vender_Phone2,Vender_Email,Vender_Fax,Vender_Street,Vender_ST,Vender_City,Vender_Zip,Store_ID) VALUES('$VName','$Parent','$POCFN','$POCLN','$VPPHone','$VShone','$VEmail','$VFaxNum','$VAddress','$VState','$VCity','$VZip','$StoreID')";
						$result = mysqli_query($con,$sql);
						
						// if successfully insert data into database, displays message "Successful". 
						if (!mysqli_query($con,$sql)) 
						{
						  die('Error: ' . mysqli_error($con));
						echo "<h1>FAILED insertion/add into database.<h1>";
						echo "<br>";
						echo "<a href='website.php'>Back to main page</a>";
						echo "<h1>ERROR:<?php echo $message; ?> Use Back button to go back so that you data is not lost.</h1>";
						}
						else 
						{
						echo "<h1>Successful insertion/add into database<h1>";
						echo "<br>";
						echo "<a href='website.php'>Back to main page</a>";
						}						
						mysqli_close($con);
						}
						?>
						<html>
						<head>
						<title>Add Vender</title>
						</head>
						<body>
				         <?php echo $message ?>
						</body>
						</html>