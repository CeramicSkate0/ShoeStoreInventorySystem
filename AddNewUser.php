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
	        <h1>Add User</h1>
	        <div class="row">
	        	<div class="col-sm-5">
	        		<form action="AddNewUserSUBMIT.php" role="form" method="post">
	        			<div class="form-group">
	        				<label for="email">User Email: </label>
	        				<input type="email" class="form-control" id="email" name='email' placeholder="Enter users email" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="pass1">User Password: </label>
	        				<input type="password" class="form-control" id="password" name='password' placeholder="Enter password" required>
	        			</div>
	        			<div class="form-group">
	        				<label for="pass2">Confirm Password: </label>
	        				<input type="password" class="form-control" id="password2" name='password2' placeholder="Confirm Password"required> 
	        			</div>
	        			<div class="form-group">
	        				<label for="fn">First Name: </label>
	        				<input type="text" class="form-control" id="first" name='first' placeholder="Enter First Name"required>
	        			</div>
	        			<div class="form-group">
	        				<label for="mi">Middle Initial: </label>
	        				<input type="text" class="form-control" id="mi" name='mi' placeholder="Enter Middel Initial">
	        			</div>	
	        			<div class="form-group">
	        				<label for="ln">Last Name: </label>
	        				<input type="text" class="form-control" id="last" name='last' placeholder="Enter Last Name"required>
	        			</div>
	        			<div class="form-group">
	        				<label for="title">Title</label>
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
							$sql="SELECT * FROM TITLE";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"title\" name=\"title\"><option>-- Select A Store --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Title_ID'] . ">". $row['Title'] ."</option>");
							  }
							echo "</select>";
							?>
	        			</div>	
	        			<div class="form-group">
	        				<label for="accttype">Account Type</label>
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
							$sql="SELECT * FROM ACCOUNT";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"account\" name=\"account\"><option>-- Select A Account Type --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("</option><option value=". $row['Account_ID'] . ">". $row['Type'] ."</option>");
							  }
							echo "</select>";
							?>
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
							echo "<select  class=\"form-control\" id=\"store\" name=\"store\"><option>-- Select A Store --</option>";
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