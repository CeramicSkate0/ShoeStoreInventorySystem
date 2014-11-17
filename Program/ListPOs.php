<?php
include 'connection.php';

session_start();
$Email = $_COOKIE['Email'];
?>

<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>List POs</title>
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
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="AddItem.html">Add Item</a></li>
			            <li><a href="ListInv.php">List Inventory</a></li>
			            <!-- <li class="divider"></li> -->
			            <li><a href="RemoveItem.html">Remove Item</a></li>
			            <!-- <li class="divider"></li> -->
			            <li><a href="UpdateItem.html">Update Item</a></li>
						<li><a href="AdjustInv.html">Adjust Inventory</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Purchase Orders <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="ListPOs.php">List PO's</a></li>
			            <li><a href="SearchPOs.php">Search PO's</a></li>
			            <li class="divider"></li>
			            <li><a href="CreatePO.html">Create PO</a></li>
						<li><a href="ReceivePO.html">Receive PO</a></li>
						<li><a href="ChangePO.html">Change PO</a></li>
						<li><a href="DeletePO.html">Delete PO</a></li>
			            <!-- <li class="divider"></li>
			            <li><a href="#">One more separated link</a></li> -->
			          </ul>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			      	<a href="index.php"><button type="submit" class="btn btn-default navbar-btn">Sign out</button></a>
			        
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
	        
	        <div class="row marketing">
	        	<?php
	        		$con = DatabaseConnect('volunteerdb');
					if(is_string($con)) {
						echo $con;
					}
					else {
						$result = mysqli_query($con, "SELECT * FROM volunteers");
						echo "<table class='table table-hover'>
						<tr>
							<th>Last name:</th>
							<th>First name:</th>
							<th>Address:</th>
							<th>City:</th>
							<th>State:</th>
							<th>Email:</th>
							<th>Birthdate:</th>
							<th>Add to company:</th>
						</tr>";
						
						while($row = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>" . $row['LastName'] . "</td>";
							echo "<td>" . $row['FirstName'] . "</td>";
							echo "<td>" . $row['Address'] . "</td>";
							echo "<td>" . $row['City'] . "</td>";
							echo "<td>" . $row['State'] . "</td>";
							echo "<td>" . $row['Email'] . "</td>";
							echo "<td>" . $row['BirthDate'] . "</td>";
							echo "<td><button class='btn btn-primary btn-sm'>add</button></td>";
							echo "</tr>";
						}
						echo "</table>";
						mysqli_close($con);
					}
	        	?>
	        </div>
		</div>
		
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
    </body>
</html>