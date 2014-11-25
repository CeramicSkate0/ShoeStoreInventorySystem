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
			 $PO_REQUEST_ID =$_POST['PO_Number'];
			 $sql="SELECT * FROM PO_REQUEST WHERE PO_Request_ID=".$PO_REQUEST_ID."";
			 $result = mysqli_query($con,$sql);
			 while ($row=mysqli_fetch_assoc($result))
			 {
			 $PO_REQUEST_ID1 = $row['PO_Request_ID'];
			 $Date_Generated=$row['Date_Generated'];
			 $Date_Expected = $row['Date_Expected']; 
			 $User_ID = $row['User_ID'];
			 $Store_ID= $row['Store_ID'];
			} 
			mysqli_close($con);
			?>
  <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adjust Inventory</title>
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
	        <h1>Adjust PO</h1>
	        <div class="row">
	        	<div class="col-sm-5">
	        		<form action="UpdatePOSUBMIT.php" role="form" method="post">
	        			<div class="form-group">
	        				<label for="itemName">PO Number: </label>
	        				<input type="number" class="form-control" id="POID" name='POID'  readonly value="<?php echo $_POST['PO_Number']; ?>"required>
	        			</div>
	        			<div class="form-group">
	        				<label for="retailPrice">Date Generated: </label>
	        				<input type="text" class="form-control" id="dateG" name="dateG" value="<?php echo $Date_Generated; ?>"required>
	        			<div class="form-group">
	        				<label for="Line Item Cost">Date Expected: </label>
	        				<input type="text"   class="form-control" id="dateE" name="dateE" value="<?php echo $Date_Expected; ?>"required>
	        			</div>
	        			<div class="form-group">
	        				<label for="retailPrice">User: </label>
	        				<input type="text"  class="form-control" id="user" name="user" value="<?php echo $User_ID; ?>"required>
	        			</div>
	        			<div class="form-group">
	        				<label for="retailPrice">Store: </label>
	        				<input type="text"  class="form-control" id="store" name="store" value="<?php echo $Store_ID; ?>"required>
	        			</div>
	        			<input type="submit" name="Submit" value="Update">	        			
						<a href="website.php"><input type="button" name="Cancel" value="Cancel"></a>
	        		</form>
	        	</div>
	        </div>  	
    </body>
</html>