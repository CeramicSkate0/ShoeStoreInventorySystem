<?php
session_start();
$hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = '';
$mysql_database = 'volunteerdb';

$userId = $_COOKIE['userid'];

$con = mysqli_connect($hostname, $mysql_username, $mysql_password, $mysql_database);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM volunteers WHERE UserID='" . $userId . "'");
$row = mysqli_fetch_array($result);
$firstName = $row[2];
$lastName = $row[1];
$email = $row[6];
$address = $row[3];
$city = $row[4];
$state = $row[5];
?>

<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Volunteer Homepage</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jumbotron-narrow.css">
        
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
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
			      <a class="navbar-brand" href="volwebsite.php">Brand</a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li>
			          <a href="searchjobs.php">Search jobs</a>			          
			        </li>
			        <li>
			          <a href="profile.php">Update profile</a>
			        </li>
			        <li>
			          <a href="volskills.php">Update skills </a>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			      	<a href="index.php"><button type="submit" class="btn btn-default navbar-btn">Sign out</button></a>
			        
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
	        
	        <div class="row marketing">
	        	<h1>Update Profile</h1>
	        	<form role="form" action="updateprofile.php" method="post">
	        		<div class="form-group">
	        			<label for="firstName">First name</label>
	        			<input type="text" class="form-control" id="firstName" value=<?php echo $firstName; ?>>
	        		</div>
	        		<div class="form-group">
	        			<label for="lastName">Last name</label>
	        			<input type="text" class="form-control" id="lastName" value=<?php echo $lastName; ?>>
	        		</div>
	        		<div class="form-group">
	        			<label for="email">Email address</label>
	        			<input type="email" class="form-control" id="email" value=<?php echo $email; ?>>
	        		</div>
	        		<div class="form-group">
	        			<label for="address">Address</label>
	        			<input type="text" class="form-control" id="address" value=<?php echo $address; ?>>
	        		</div>
	        		<div class="form-group">
	        			<label for="city">City</label>
	        			<input type="text" class="form-control" id="city" value=<?php echo $city; ?>>
	        		</div>
	        		<div class="form-group">
	        			<label for="state">State</label>
	        			<input type="text" class="form-control" id="state" value=<?php echo $state; ?>>
	        		</div>

	        		<button class="btn btn-primary">Submit</button>
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