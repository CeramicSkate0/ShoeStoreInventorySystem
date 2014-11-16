<html class="no-js">
  <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Item To Inventory</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
	   	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link rel="stylesheet" href="css/bootstrap2.css">
		<!-- <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jumbotron-narrow.css"> -->
        

        				<style>
				        .currency {
				            padding-left:12px;
				        }
				
				        .currency-symbol {
				            position:absolute;
				            padding: 3px 5px;
				        }
				        </style>
    </head>
    <body>​
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
	        <h1>Add Product</h1>
	        <div class="row">
	        	<div class="col-sm-5">
	        		<form action="AddItemSUBMIT.php" role="form" method="post">
	        			<div class="form-group">
	        				<label for="itemName">Item Name: </label>
	        				<input type="text" class="form-control" id="itemName" name='itemName' placeholder="Enter item name" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="barcode">Barcode: </label>
	        				<input type="number" class="form-control" id="barcode" name="barcode" placeholder="Enter barcode number" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="upc">UPC: </label>
	        				<input type="number" class="form-control" id="upc" name="upc" placeholder="Enter UPC number" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="heelHeight">Factory Number: </label>
	        				<input type="number" class="form-control" id="factnum" name="factnum" placeholder="Enter Factorty Number" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="dept">Department</label>
							<?php
							include 'connection.php';
							$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
							$mysql_username = 'fall14seniorproj';
							$mysql_password = 'Seniorproject1#';
						    $mysql_dbname = 'fall14seniorproj';
						
						    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
							if (mysqli_connect_errno())
							{
								echo "DB Connection failed"+ mysqli_connect_errno();
							}
							mysqli_select_db($con,$mysql_dbname);
							$sql="SELECT * FROM DEPARTMENT";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"dept\" name=\"dept\"><option>-- Select A Deptartment --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Dept_ID'] . ">". $row['Name'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
						<div class="form-group">
	        				<label for="brand">Brand</label>
							<?php
							include 'connection.php';
							$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
							$mysql_username = 'fall14seniorproj';
							$mysql_password = 'Seniorproject1#';
						    $mysql_dbname = 'fall14seniorproj';
						
						    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
							if (mysqli_connect_errno())
							{
								echo "DB Connection failed"+ mysqli_connect_errno();
							}
							mysqli_select_db($con,$mysql_dbname);
							$sql="SELECT * FROM BRAND";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"brand\" name=\"brand\"><option>-- Select A Brand --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Brand_ID'] . ">". $row['Name'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
						<div class="form-group">
	        				<label for="size">Size: </label>
	        				<?php
							include 'connection.php';
							$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
							$mysql_username = 'fall14seniorproj';
							$mysql_password = 'Seniorproject1#';
						    $mysql_dbname = 'fall14seniorproj';
						
						    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
							if (mysqli_connect_errno())
							{
								echo "DB Connection failed"+ mysqli_connect_errno();
							}
							mysqli_select_db($con,$mysql_dbname);
							$sql="SELECT * FROM SIZE";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"size\" name=\"size\"><option>-- Select A Size --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Size_ID'] . ">". $row['Size'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
						<div class="form-group">
	        				<label for="width">Width: </label>
	        				<?php
							include 'connection.php';
							$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
							$mysql_username = 'fall14seniorproj';
							$mysql_password = 'Seniorproject1#';
						    $mysql_dbname = 'fall14seniorproj';
						
						    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
							if (mysqli_connect_errno())
							{
								echo "DB Connection failed"+ mysqli_connect_errno();
							}
							mysqli_select_db($con,$mysql_dbname);
							$sql="SELECT * FROM SIZE";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"width\" name=\"width\"><option>-- Select A Width --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Size_ID'] . ">". $row['Size'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
						<div class="form-group">
	        				<label for="heelHeight">Heel Height: </label>
	        				<?php
							include 'connection.php';
							$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
							$mysql_username = 'fall14seniorproj';
							$mysql_password = 'Seniorproject1#';
						    $mysql_dbname = 'fall14seniorproj';
						
						    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
							if (mysqli_connect_errno())
							{
								echo "DB Connection failed"+ mysqli_connect_errno();
							}
							mysqli_select_db($con,$mysql_dbname);
							$sql="SELECT * FROM SIZE";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"heelHeight\" name=\"heelHeight\"><option>-- Select A Heel Height --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Size_ID'] . ">". $row['Size'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
						<div class="form-group">
	        				<label for="color">Color: </label>
	        				<input type="text" class="form-control" id="color" name="color" placeholder="Enter color" required>
	        			</div>
						<div class="form-group">
							<label for="color">Material: </label>
	        				<?php
							include 'connection.php';
							$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
							$mysql_username = 'fall14seniorproj';
							$mysql_password = 'Seniorproject1#';
						    $mysql_dbname = 'fall14seniorproj';
						
						    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
							if (mysqli_connect_errno())
							{
								echo "DB Connection failed"+ mysqli_connect_errno();
							}
							mysqli_select_db($con,$mysql_dbname);
							$sql="SELECT * FROM MATERIAL";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"material\" name=\"material\"><option>-- Select A Material --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Material_ID'] . ">". $row['Name'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
						<div class="form-group">
	        				<label for="pattern">Pattern: </label>
	        				<?php
							include 'connection.php';
							$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
							$mysql_username = 'fall14seniorproj';
							$mysql_password = 'Seniorproject1#';
						    $mysql_dbname = 'fall14seniorproj';
						
						    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
							if (mysqli_connect_errno())
							{
								echo "DB Connection failed"+ mysqli_connect_errno();
							}
							mysqli_select_db($con,$mysql_dbname);
							$sql="SELECT * FROM PATTERN";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"pattern\" name=\"pattern\"><option>-- Select A Pattern --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Pattern_ID'] . ">". $row['Name'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
						<div class="form-group">
	        				<label for="season">Season: </label>
	        				<input type="text" class="form-control" id="season" name="season" placeholder="Enter season" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="retailPrice">Starting Quantity: </label>
	        				<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter how many you currently have" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="Line Item Cost">Cost: </label>
	        				<input type="text"   class="form-control" id="lineItemCost" name="lineItemCost" placeholder="Cost" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="retailPrice">Retail Price: </label>
	        				<input type="text"  class="form-control" id="retail" name="retail" placeholder="Retail Price" required> 
	        			</div>
						<div class="form-group">
	        				<label for="comment">Comments: </label>
	        				<textarea class="form-control" rows="3" id="comment"></textarea>
	        			</div>
	        			<input type="submit" name="Submit" value="Submit">	        			
						<a href="website.php"><input type="button" name="Cancel" value="Cancel"></a>
	        		</form>
	        	</div>
				
	        </div>  	
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
    </body>
</html>