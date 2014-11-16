<?php	
include 'connection.php';
include 'cookies.php';

// begin our session
session_start();

   if( isset($_SESSION["Email"]) && $_SESSION["Password"] )
    {
        echo "You are already logged in, ".$_SESSION['name']."! <br> I'm Logging you out";
        unset( $_SESSION );
        session_destroy();

        // *** The empty quotes do nothing
        // exit("");
        exit;
    }

    $loggedIn = false;

    $Email = isset($_POST["Email"]) ? $_POST["Email"] : null;

    $Password = isset($_POST["Password"]) ? $_POST["Password"] : null;

   
    if (!empty($Email) && !empty($Password))
    {
	//mysql hostname 
	$mysql_hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
	
	// mysql username 
	$mysql_username = 'fall14seniorproj';
	
	//mysql password 
	$mysql_password = 'Seniorproject1#';
	
    // database name 
    $mysql_dbname = 'fall14seniorproj';

    $con = new mysqli($mysql_hostname, $mysql_username,$mysql_password,$mysql_dbname,3306);
	if (mysqli_connect_errno())
	{
		echo "DB Connection failed"+ mysqli_connect_errno();
	}
   $query = "SELECT Email FROM EMPLOYEE WHERE Email = '$Email' AND Password = '$Password'";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_array($result);

        if(!$row)
        {
			$message = "Invalid username and/or password";
        }
        else 
        {
            $loggedIn = true;
        }
    if (!$loggedIn)
    {
		$message = "Invalid username and/or password";
    }
    else
    {
	CreateCookies($Email);
	echo "<script type=\"text/javascript\">document.location.href=\"website.php\";</script>";
    }		
}
?>
<html class="no-js">
	 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="stylesheet" href="css/bootstrap2.css">
		<!--<link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jumbotron-narrow.css"> -->
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
	<body>
		<nav class="navbar navbar-inverse" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle Navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </div>		
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-left">
			        <a href="index.php"><button type="submit" align="center" class="btn btn-default navbar-btn">Back</button></a>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		<div class="container">
			<form class="form-signin" action="signin.php" role="form" method="post">
				<h2 class="form-signin-heading">Login</h2>
				<p>Enter Email below:</p>
				<input type="email" class="form-control" placeholder="Email" id="Email" name="Email" required autofocus>
				<p>Enter Password below:</p>
				<input type="password" class="form-control" placeholder="Password" id="Password" name="Password" required>
				<h1></h1>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				<h2 color="red" align="center"><?php echo $message ?></h2>
			</form>
		</div>
	</body>
</html>
