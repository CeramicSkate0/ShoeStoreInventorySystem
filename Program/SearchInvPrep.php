<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
 <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adjust Product Inventory</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link rel="stylesheet" href="css/bootstrap2.css">
		<!-- <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jumbotron-narrow.css"> -->
        
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
	<body>
	<div class="container-fluid">
		<nav class="navbar navbar-inverse" role="navigation"> 
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a href="website.php"><button type="button" class="btn btn-default navbar-btn">Home</button></a>
			    </div>
			</div>
		</nav>
	        <h1>Adjust inventory for a product</h1>
	        <div class="row">
	        	<div class="col-sm-5">
	        		<div class="form-group">
	        	<form action="SearchInvPrep.php" role="form" method="post">
	        			<div class="form-group">
	        				<label for="barcode">Search by Item Number: </label>
	        				<input type="number" class="form-control" id="query" name="query" required>
	        			</div>
        			<input type="submit" name="submit" value="Search"/>
        			<a href="website.php"><input type="button" name="Cancel" value="Cancel"></a>
	        	</form>
	        	</div>
	        </div>

	        </br>
		<?php
			include 'connection.php';
			session_start();
			$message = "";
			//mysql hostname 
			$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
			
			// mysql username 
			$mysql_username = 'fall14seniorproj';
			
			//mysql password 
			$mysql_password = 'Seniorproject1#';
			
		    // database name 
		    $mysql_dbname = 'fall14seniorproj';
		
		    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
			mysqli_select_db($con,$mysql_dbname);
			if (mysqli_connect_errno())
			{
				echo "DB Connection failed"+ mysqli_connect_errno();
			}

			if(isset($_POST['query']))
			{
			$sql="SELECT * FROM PRODUCT WHERE Product_ID LIKE '%{$_POST['query']}%';";
			$result = mysqli_query($con,$sql);
			echo "<div class=\"table-responsive\">";
			echo "<table class=\"table table-striped table-bordered table-hover\">
			<tr>
			<th></th>
			<th> Item # </th>
			<th> Name </th>
			<th> Brand </th>
			<th> Quantity </th>
			<th> Barcode </th>
			<th> UPC </th>
			<th> Factory Number </th>
			<th> Size </th>
			<th> Last Person To Update </th>
			<th></th>
			</tr>";
			
			while($row  = mysqli_fetch_array($result , MYSQLI_BOTH)) 
			{
			  echo "<form method=\"post\" action=\"EditInv.php\">";
			  echo "<tr>"; 
			  echo "<td><a href=EditInv.php ><input type=\"submit\" name=\"submit\" value=\"EDIT\"/></a></td>";
			  echo "<td> " . $row['Product_ID'] . " </td>";
			  echo "<td> " . $row['Name'] . " </td>";
			  echo "<td> " . $row['Brand_ID'] . " </td>";
			  echo "<td> " . $row['Quantity_On_Hand'] . " </td>";
			  echo "<td> " . $row['Barcode'] . " </td>";
			  echo "<td> " . $row['UPC'] . " </td>";
			  echo "<td> " . $row['Factory_Num'] . " </td>";
			  echo "<td> " . $row['Size_ID'] . " </td>";
			  echo "<td> " . $row['Inventory_Last_Taken_By'] . " </td>"; 
			  echo "<td><input type=\"hidden\" name=\"Product_ID\" id=\"Product_ID\" value=\"{$row[Product_ID]}\"/></td>";
			  echo "</tr>";
			  echo "</form>";
			}
			echo "</table>";
			echo "</div>";
			mysqli_close($con);
			}
			?>
	</body>
</html>