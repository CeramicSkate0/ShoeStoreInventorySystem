						<?php
	        			include 'connection.php';
						include 'cookies.php';

						session_start();
						$message = "";
						
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
						$Product_ID = $_POST['Product_ID'];
						$ItemName = mysqli_real_escape_string($con, $_POST['itemName']);
						$Quantity = mysqli_real_escape_string($con, $_POST['quantity']);
						$Barcode = mysqli_real_escape_string($con, $_POST['barcode']);
						$UPC = mysqli_real_escape_string($con, $_POST['upc']);
						$FactNum = mysqli_real_escape_string($con, $_POST['factnum']);
						$LineItemCost = mysqli_real_escape_string($con, $_POST['lineItemCost']);
						$Retail = mysqli_real_escape_string($con, $_POST['retail']);
						$Comment = mysqli_real_escape_string($con, $_POST['comment']);
						// Insert data into mysql 
						$sql="UPDATE PRODUCT SET Name='{$ItemName}',Quantity_On_Hand='{$Quantity}',Barcode='{$Barcode}',UPC='{$UPC}',Factory_Num='{$FactNum}',Line_Item_Cost='{$LineItemCost}',Retail_Price='{$Retail}',Comment='{$Comment}' WHERE Product_ID='{$Product_ID}';";
						$result = mysqli_query($con,$sql);
						
						// if successfully insert data into database, displays message "Successful". 
						if (!mysqli_query($con,$sql)) 
						{
						  die('Error: ' . mysqli_error($con));
						echo "<h1>FAILED Update into database.<h1>";
						echo "<br>";
						//echo $sql;
						echo "<a href='website.php'>Back to main page</a>";
						}
						else 
						{
						echo "<h1>SUCCESSFUL Update into database<h1>";
						echo "<br>";
						//echo $sql;
						echo "<a href='website.php'>Back to main page</a>";
						}						
						mysqli_close($con);
						}
						?>
						?>