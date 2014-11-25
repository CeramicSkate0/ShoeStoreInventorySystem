						<?php
	        			include 'connection.php';
						include 'cookies.php';
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
						$Date_Generated = mysqli_real_escape_string($con, $_POST['Date_Generated']);
						$Vend_ID = mysqli_real_escape_string($con, $_POST['Vend_ID']);
						$store= mysqli_real_escape_string($con, $_POST['store']);
						$User = mysqli_real_escape_string($con, $_COOKIE['User_ID']);
						$Date_Expected = mysqli_real_escape_string($con, $_POST['Date_Expected']);
						// Insert data into mysql 
						$sql="INSERT IGNORE INTO PO_REQUEST (Date_Generated,Vend_ID,Store_ID,Date_Expected,User_ID) VALUES('$Date_Generated','$Vend_ID','$store','$Date_Expected','$User')";
						$result = mysqli_query($con,$sql);			
						if (!mysqli_query($con,$sql)) 
						{
						  die('Error: ' . mysqli_error($con));
						echo "<h1>FAILED insertion/add into database.<h1>";
						echo "<br>";
						echo "<a href='website.php'>Back to main page</a>";
						}
						else 
						{
						echo "<script type=\"text/javascript\">document.location.href=\"AddLineItem.php\";</script>";
						}
						}						
						mysqli_close($con);
												
						?>