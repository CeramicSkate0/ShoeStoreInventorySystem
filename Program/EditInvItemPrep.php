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
			 $Product_ID =$_POST['Product_ID'];
			 $sql="SELECT * FROM PRODUCT WHERE Product_ID={$_POST['Product_ID']}";
			 $result = mysqli_query($con,$sql);
			 while ($row=mysqli_fetch_assoc($result))
			 {
			 $Product_ID = $row['Product_ID'];
			 $Name = $row['Name'];
			 $Size_ID = $row['Size_ID']; 
			 $Barcode = $row['Barcode'];
			 $UPC= $row['UPC'];
			 $Factory_Num = $row['Factory_Num'];
			 $Width= $row['Width'];
			 $Heel_Height = $row['Heel_Height'];
			 $Material_ID = $row['Material_ID'];
			 $Pattern_ID = $row['Pattern_ID'];
			 $Season = $row['Season'];
			 $Inventory_Last_Taken_By = $row['Inventory_Last_Taken_By'];
			} 
			mysqli_close($con);
			?>
  <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adjust Product Details</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	   	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<script src="js/bootstrap.min.js"></script>	
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link rel="stylesheet" href="css/bootstrap2.css">
		<!-- <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jumbotron-narrow.css"> -->
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
	        <h1>Adjust Product Details</h1>
	        <div class="row"> 
	        	<div class="col-sm-5">
	        		<form action="UpdateProductSUBMIT.php" role="form" method="post">
	        			<div class="form-group">
	        				<label for="itemName">Item Name: </label>
	        				<input type="text" class="form-control" id="itemName" name='itemName' value="<?php echo$Name ?>">
	        			</div>
	        			<div class="form-group">
	        				<label for="barcode">Barcode: </label>
	        				<input type="number" class="form-control" id="barcode" name="barcode" value="<?php echo$Barcode ?>">
	        			</div>
	        			<div class="form-group">
	        				<label for="upc">UPC: </label>
	        				<input type="number" class="form-control" id="upc" name="upc" value="<?php echo$UPC ?>">
	        			</div>
	        			<div class="form-group">
	        				<label for="heelHeight">Factory Number: </label>
	        				<input type="number" class="form-control" id="factnum" name="factnum" value="<?php echo$Factory_Num ?>">
	        			</div>
	        			<div class="form-group">
	        				<label for="Line Item Cost">Size: </label>
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
							echo "<select  class=\"form-control\" id=\"size\" name=\"size\"><option>{$Size_ID}</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Size_ID'] . ">". $row['Size'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
	        			<div class="form-group">
	        				<label for="retailPrice">Width: </label>
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
							echo "<select  class=\"form-control\" id=\"width\" name=\"width\"><option>{$Width}</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Size_ID'] . ">". $row['Size'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
						<div class="form-group">
	        				<label for="comment">Heel Height: </label>
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
							echo "<select  class=\"form-control\" id=\"heel\" name=\"heel\"><option>{$Heel_Height}</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Size_ID'] . ">". $row['Size'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
	        			<div class="form-group">
	        				<label for="comment">Color: </label>
	        				<input type="text"  class="form-control" id="color" name="color" value="<?php echo$Color ?>">
	        			</div>
	        			<div class="form-group">
	        				<label for="comment">Material: </label>
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
							echo "<select  class=\"form-control\" id=\"material\" name=\"material\"><option>{$Material_ID}</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Material_ID'] . ">". $row['Name'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
	        			<div class="form-group">
	        				<label for="comment">Pattern: </label>
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
							echo "<select  class=\"form-control\" id=\"pattern\" name=\"pattern\"><option>{$Pattern_ID}</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Pattern_ID'] . ">". $row['Name'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>
	        			<div class="form-group">
	        				<label for="comment">Season: </label>
	        				<input type="text"  class="form-control" id="season" name="season" value="<?php echo$Season ?>">
	        			</div>
	        			<input type="hidden"  class="form-control" id="Product_ID" name="Product_ID" value="<?php echo$Product_ID ?>">
	        			<input type="submit" name="Submit" value="Update">	        			
						<a href="website.php"><input type="button" name="Cancel" value="Cancel"></a>
	        		</form>
	        	</div>
	        </div>  	
    </body>
</html>