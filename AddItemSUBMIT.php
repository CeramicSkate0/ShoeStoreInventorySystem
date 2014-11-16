						<?php
						include 'connection.php';
						include 'cookies.php';
						session_start();
						$message = "";
						$userId = $_COOKIE['userid'];
						// Verify that all form feilds have been entered.
						if(!isset($_POST['itemName'], $_POST['barcode'], $_POST['upc'], $_POST['factnum'], $_POST['quantity'], $_POST['retail']))
						{
							$message = 'Please fill out the entire form';
						}
						elseif (ctype_alpha($_POST['itemName']) != true)
						{
						    $message = "Item name must contain alphabet letters only.";
						}
						// verify that the last name is the correct length
						elseif (strlen( $_POST['barcode']) > 13 || strlen($_POST['barcode']) < 11)
						{
						    $message = 'Incorrect Length for barcode';
						}
						elseif (ctype_digit($_POST['barcode']) != true)
						{
						    $message = "Barcode must be number";
						}				
						// verify that the first name is the correct length
						elseif (strlen( $_POST['upc']) > 15 || strlen($_POST['upc']) < 1)
						{
						    $message = 'Incorrect Length for upc';
						}						
						// verify that the company name has only alpha numeric characters
						elseif (ctype_digit($_POST['upc']) != true)
						{
						    $message = "UPC must be number";
						}	
						// verify that the company name has only alpha numeric characters
						elseif (ctype_digit($_POST['lineItemCost']) != true)
						{
						    $message = "Line Item Cost must be number";
						}
						elseif (strlen( $_POST['lineItemCost']) > 6 || strlen($_POST['lineItemCost']) < 1)
						{
						    $message = 'Incorrect Length for upc';
						}	
						elseif (ctype_digit($_POST['retail']) != true)
						{
						    $message = "Retail Price must be number";
						}
						elseif (strlen( $_POST['retail']) > 6|| strlen($_POST['retail']) < 1)
						{
						    $message = 'Incorrect Length for upc';
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
						$itemName = mysqli_real_escape_string($con, $_POST['itemName']);
						$barcode= mysqli_real_escape_string($con, $_POST['barcode']);
						$upc = mysqli_real_escape_string($con, $_POST['upc']);
						$department = mysqli_real_escape_string($con, $_POST['dept']);
						$brand= mysqli_real_escape_string($con, $_POST['brand']);
						$size = mysqli_real_escape_string($con, $_POST['size']);
						$width = mysqli_real_escape_string($con, $_POST['width']);
						$color = mysqli_real_escape_string($con, $_POST['color']);
						$material = mysqli_real_escape_string($con, $_POST['material']);
						$pattern = mysqli_real_escape_string($con, $_POST['pattern']);
						$season = mysqli_real_escape_string($con, $_POST['season']);
						$quantity = mysqli_real_escape_string($con, $_POST['quantity']);
						$retail = mysqli_real_escape_string($con, $_POST['retail']);
						$comments = mysqli_real_escape_string($con, $_POST['comments']);
						$lineItemCost = mysqli_real_escape_string($con, $_POST['lineItemCost']);
						$factnum = mysqli_real_escape_string($con, $_POST['factnum']);
						$heelheight = mysqli_real_escape_string($con, $_POST['heelHeight']);
						$User_ID=$_COOKIE['User_ID'];
						
						// Insert data into mysql 
						$sql="INSERT IGNORE INTO PRODUCT(Dept_ID, Name, Brand_ID, Size_ID, Pattern_ID, Material_ID, Barcode, UPC, Factory_Num, Width, Heel_Height, Color, Season, Inventory_Last_Taken_By, Comment, Retail_Price, Line_Item_Cost, Quantity_On_Hand) VALUES('$department','$itemName', '$brand', '$size', '$pattern', '$material', '$barcode', '$upc', '$factnum', '$width', '$heelheight', '$color',  '$season', '$User_ID','$comments', '$retail', '$lineItemCost', '$quantity')";
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
						}
						?>
						<html>
						<head>
						<title>Add Product</title>
						</head>
						<body>
				         <?php echo $message ?>
						</body>
						</html>