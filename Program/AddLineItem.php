<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Create Line Item</title>
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
			      <ul class="nav navbar-nav navbar-right">
			      	<a href="index.php"><button type="submit" class="btn btn-default navbar-btn">Sign out</button></a>   
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
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

							$sql="SELECT PO_Request_ID FROM PO_REQUEST ORDER BY PO_Request_ID DESC LIMIT 1";
							
							$result = mysqli_query($con,$sql);
							
							 while ($row=mysqli_fetch_assoc($result))
			 					{
			 						$row1 = $row['PO_Request_ID'];
			 					}
			 				mysqli_close($con);
			?>
	        <h1>Add Line Item to PO</h1>
	        <h3>PO Number:<?php echo $row1;?></h3>
	        <form action="AddAllLineItemSUBMIT.php" role="form" method="post">
	        <div class="row"> 
				<form action="AddLineItemSUBMIT.php" role="form" method="post">
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
							$sql="SELECT * FROM LINE_ITEM WHERE LINE_ITEM.PO-REQUEST=(SELECT @@Identity)";
							$result = mysqli_query($con,$sql);
							
							if ($result)
							{
							while($row = mysqli_fetch_array($result))
							  {
							$counter = 2;
							echo "<div class=\"col-md-1\">";
							echo "<label for=\"lineNumber\">Line #: </label>";
							?>
							<input type="number" class="form-control" id="lineNumber" name="lineNumber" value="<?php echo"$counter"; ?>">
							<?php
							$counter++;
							echo "</div>";
							echo "<div class=\"col-md-2\">";
							echo "<label for=\"itemNumber\">Item #: </label>";
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
							$sql="SELECT * FROM PRODUCT ORDER BY Product_ID";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"ItemNum\" name=\"ItemNum\"><option>-- Select A Item Number --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("<option value=". $row['Product_ID'] . ">Item #: ". $row['Product_ID'] ." Name: ". $row['Name'] ."</option>");
							  }
							echo "</select>";
							echo "</div>";
							echo "<div class=\"col-md-1\">";
							echo "<label for=\"quantity\">Quantity: </label>";
							echo "<input type=\"number\" min=\"0\"  class=\"form-control\" id=\"quantity\" name=\"quantity\" placeholder=\"Enter Quantity\">";
							echo "</div>";
							echo "<div class=\"col-md-1\">";
							echo "<label for=\"cost\">Item Cost: </label>";
							echo "<input type=\"text\" class=\"form-control\" id=\"cost\" name=\"cost\" placeholder=\"Enter cost\">";
							echo "</div>";
							echo "<div class=\"col-md-2\"> <!-- This field needs to calculate quantity X cost -->";
							echo "<label for=\"lineTotal\">Line Total Cost: </label>";
							echo "<input type=\"text\" class=\"form-control\" id=\"lineTotal\" name=\"lineTotal\">";
							echo "</div>";
							echo "<button type=\"submit\" class=\"btn btn-default\">Add Anoter Line Item</button>";
							echo "</div><hr>";
							  }
							  }
						else {
							echo "<div class=\"col-md-1\">";
							echo "<label for=\"lineNumber\">Line #: </label>";
							$counter=1;
							?>
							<input type="number" class="form-control" id="lineNumber" name="lineNumber" value="<?php echo"$counter"; ?>">
							<?php
							echo "</div>";
							echo "<div class=\"col-md-2\">";
							echo "<label for=\"itemNumber\">Item #: </label>";
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
							$sql="SELECT * FROM PRODUCT ORDER BY Product_ID";
							$result = mysqli_query($con,$sql);
							echo "<select  class=\"form-control\" id=\"ItemNum\" name=\"ItemNum\"><option>-- Select A Item Number --</option>";
							// for each open job, create the HTML<option> tag with the data name
							while($row = mysqli_fetch_array($result))
							  {
							      echo("<option value=". $row['Product_ID'] . ">Item #: ". $row['Product_ID'] ." Name: ". $row['Name'] ."</option>");
							  }
							echo "</select>";
							echo "</div>";
							echo "<div class=\"col-md-1\">";
							echo "<label for=\"quantity\">Quantity: </label>";
							echo "<input type=\"number\" min=\"0\"  class=\"form-control\" id=\"quantity\" name=\"quantity\" placeholder=\"Enter Quantity\">";
							echo "</div>";
							echo "<div class=\"col-md-1\">";
							echo "<label for=\"cost\">Item Cost: </label>";
							echo "<input type=\"text\" class=\"form-control\" id=\"cost\" name=\"cost\" placeholder=\"Enter cost\">";
							echo "</div>";
							echo "<div class=\"col-md-2\"> <!-- This field needs to calculate quantity X cost -->";
							echo "<label for=\"lineTotal\">Line Total Cost: </label>";
							echo "<input type=\"text\" class=\"form-control\" id=\"lineTotal\" name=\"lineTotal\">";
							echo "</div>";
							echo "<button type=\"submit\" class=\"btn btn-default\">Add Anoter Line Item</button>";
							echo "</div>";
							mysqli_close($con);
							 }
							?>
							<hr>
				</form>
				<br>
				<button type="submit" class="btn btn-default">Submit All</button>
				<a href="website.php"><button type="" class="btn btn-default">Cancel</button></a>
				</form>
				<input type="hidden" class="form-control" id="itemNum" name="itemNum" value="<?php $ItemNum=0; ?>">
	    </div>
		
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
    </body>
</html>