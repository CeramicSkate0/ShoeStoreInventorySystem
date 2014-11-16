<html class="no-js">
  <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add New Vender</title>
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
	        <h1>Add New Pattern</h1>
	        <div class="row">
	        	<div class="col-sm-5">
	        		<form action="AddVenderSUBMIT.php" role="form" method="post">
	        			<div class="form-group">
	        				<label for="material">Vender Name: </label>
	        				<input type="text" class="form-control" id="VName" name='VName' placeholder="Enter Vender Name" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender Address: </label>
	        				<input type="text" class="form-control" id="VAddress" name='VAddress' placeholder="Enter Address" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender City: </label>
	        				<input type="text" class="form-control" id="VCity" name='VCity' placeholder="Enter City" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender State: </label>
	        				<input type="text" class="form-control" id="VState" name='VState' placeholder="Enter State" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender Zip: </label>
	        				<input type="number" class="form-control" maxlength="6" ="VZip" name='VZip' placeholder="Enter Zip" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender Primary Phone: </label>
	        				<input type="tel" class="form-control" id="VPPHone" name='VPPHone' placeholder="Enter Primary Phone" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender Secondary Phone: </label>
	        				<input type="tel" class="form-control" id="VSPhone" name='VShone' placeholder="Enter Secondary Phone">
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender Fax Number: </label>
	        				<input type="tel" class="form-control" id="VFaxNum" name='VFaxNum' placeholder="Enter Fax Number">
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender Sales Person First Name: </label>
	        				<input type="text" class="form-control" id="VSaleFN" name='POCFN' placeholder="Enter Sales Person First Name" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender Sales Person Last Name: </label>
	        				<input type="text" class="form-control" id="VSaleLN" name='POCLN' placeholder="Enter Sales Person Last Name" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Vender Email: </label>
	        				<input type="email" class="form-control" id="VEmail" name='VEmail' placeholder="Enter a Email address to contact them" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="material">Parent: </label>
	        				<input type="checkbox" class="form-control" id="Parent" name='Parent' placeholder="Enter if its Parent or not" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="store">Store</label>
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
							$sql="SELECT * FROM STORE";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"StoreID\" name=\"StoreID\"><option>-- Select A Store --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Store_ID'] . ">". $row['Store_ID'] ."</option>");
							  }
							echo "</select>";
							?>
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