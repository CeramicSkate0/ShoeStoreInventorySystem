<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
 <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Search For Vendor</title>
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
	        <h1>Search For a Vendor</h1>
	        <div class="row">
	        	<div class="col-sm-5">
	        		<div class="form-group">
	        	<form action="SearchVenderPrep.php" role="form" method="post">
	        			<div class="form-group">
	        				<label for="barcode">Search by Vendor Name: </label>
	        				<input type="text" class="form-control" id="query" name="query">
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
			$sql="SELECT * FROM VENDOR WHERE Company LIKE '%{$_POST['query']}%';";
			$result = mysqli_query($con,$sql);
			echo "<div class=\"table-responsive\">";
			echo "<table class=\"table table-striped table-bordered table-hover\">
			<tr>
			<th></th>
			<th> Name </th>
			<th> Store </th>
			<th> POC First Name </th>
			<th> POC Last Name </th>
			<th> POC Email </th>
			<th> Vendor Primary Phone </th>
			<th></th>
			</tr>";
			
			while($row  = mysqli_fetch_array($result , MYSQLI_BOTH)) 
			{
			  echo "<form method=\"post\" action=\"EditVender.php\">";
			  echo "<tr>"; 
			  echo "<td><a href=\"EditVender.php\"><input type=\"submit\" name=\"submit\" value=\"EDIT\"/></a></td>";
			  echo "<td> " . $row['Company'] . " </td>";
			  echo "<td> " . $row['Store_ID'] . " </td>";
			  echo "<td> " . $row['POC_FN'] . " </td>";
			  echo "<td> " . $row['POC_LN'] . " </td>";
			  echo "<td> " . $row['Vender_Email'] . " </td>";
			  echo "<td> " . $row['Vender_Phone1'] . " </td>";
			  echo "<td><input type=\"hidden\" name=\"Vend_ID\" id=\"Vend_ID\" value=\"{$row[Vend_ID]}\"/></td>";
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