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
						$Email = mysqli_real_escape_string($con, $_POST['email']);
						$Password = mysqli_real_escape_string($con, $_POST['password']);
						$First = mysqli_real_escape_string($con, $_POST['first']);
						$Last = mysqli_real_escape_string($con, $_POST['last']);
						$MI = mysqli_real_escape_string($con, $_POST['mi']);
						$Store = mysqli_real_escape_string($con, $_POST['store']);
						$Title= mysqli_real_escape_string($con, $_POST['title']);
						$Account= mysqli_real_escape_string($con, $_POST['account']);
						// Insert data into mysql 
						$sql="INSERT IGNORE INTO EMPLOYEE(Email,Password,LastName,FirstName,MI,Store_ID,Title_ID,Account_ID) VALUES('$Email','$Password','$First','$Last','$MI','$Store','$Title','$Account')";
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
						echo "<h1>SUCCESSFUL insertion/add into database<h1>";
						echo "<br>";
						echo "<a href='website.php'>Back to main page</a>";
						}
						}						
						mysqli_close($con);
						?>