						<?php
						include 'connection.php';
						include 'cookies.php';
						session_start();
						$message = "";
						$userId = $_COOKIE['userid'];
						if(!isset($_POST['material']))
						{
							$message = 'Please fill out the entire form';
						}
						elseif (ctype_alpha($_POST['material']) != true)
						{
						    $message = "Material must contain alphabet letters only.";
						}
						// verify that the last name is the correct length
						elseif (strlen( $_POST['material']) < 1)
						{
						    $message = 'Incorrect Length for material';
						}
						else 
						{
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
						$vari = mysqli_real_escape_string($con, $_POST['material']);
						// Insert data into mysql 
						$sql="INSERT IGNORE INTO MATERIAL(Name) VALUES('$vari')";
						$result = mysqli_query($con,$sql);
						
						// if successfully insert data into database, displays message "Successful". 
						if (!mysqli_query($con,$sql)) 
						{
						  die('Error: ' . mysqli_error($con));
						echo "<h1>FAILED insertion/add into database.<h1>";
						echo "<br>";
						echo "<a href='website.php'>Back to main page</a>";
						}
						else 
						{
						echo "<h1>Successful insertion/add into database<h1>";
						echo "<br>";
						echo "<a href='website.php'>Back to main page</a>";
						}
						}						
						mysqli_close($con);
						}
						?>
												<html>
						<head>
						<title>Add Patter</title>
						</head>
						<body>
						<h1>ERROR:<?php echo $message; ?> Use Back button to go back so that you data is not lost.</h1>
						</body>
						</html>