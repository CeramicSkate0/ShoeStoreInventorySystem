<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Store Homepage</title>
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
    <body>​
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
			      <a class="navbar-brand" href="website.php">Home</a>
			    </div>
			      <ul class="nav navbar-nav navbar-right">
			      	<a href="index.php"><button type="submit" class="btn btn-default navbar-btn">Sign out</button></a>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
<?php
//need to rework entire file to work with AddItem.html

include 'connection.php';

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

mysqli_select_db($con,$mysql_dbname);
$sql="SELECT * FROM PO_REQUEST";
$result = mysqli_query($con,$sql);
echo "<div class=\"table-responsive\">";
echo "<table class=\"table table-striped table-bordered table-hover\">
<tr>
<th> PO Request Number</th>
<th> Date Created </th>
<th> Date Filled</th>
<th> Date Expected </th>
<th> Open </th>
<th> User who made it</th>
<th> Store</th>
<th> Vender </th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td> " . $row['PO_Request_ID'] . " </td>";
  echo "<td> " . $row['Date_Generated'] . " </td>";
  echo "<td> " . $row['Fate_Filled'] . " </td>";
  echo "<td> " . $row['Date_Expected'] . " </td>";
  echo "<td> " . $row['Opened'] . " </td>";
  echo "<td> " . $row['User_ID'] . " </td>";
  echo "<td> " . $row['Store_ID'] . " </td>";
  echo "<td> " . $row['Vend_ID'] . " </td>";
  echo "</tr>";
}
echo "</table>";
echo "</div>";

mysqli_close($con);
?>
			</body>
			</html>