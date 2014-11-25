<!doctype html>
<html class="no-js" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Homepage</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
		  html {background-color:#B3B3B3;}

		</style>
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
			      <a href="website.php"><button type="button" class="btn btn-default navbar-btn">Home</button></a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory Management<b class="caret"></b></a>
			          <ul class="dropdown-menu">
			          	<li><a href="ListInv.php">View Inventory</a></li>
			          	<li class="divider"></li>
			          	<li><a href="SearchInvPrep.php">Adjust Inventory</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product Maintenence<b class="caret"></b></a>
			          <ul class="dropdown-menu">
			          	<li><a href="SearchInvItemPrep.php">Edit a Product</a></li>
			          	<li><a href="AddItem.php">Add New Product</a></li>	 	          	
			          	<li><a href="AddNewBrand.php">Add New Brand</a></li>
			           	<li><a href="AddNewMaterial.php">Add New Material</a></li>	
			          	<li><a href="AddNewPattern.php">Add New Pattern</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Venders<b class="caret"></b></a>
			          <ul class="dropdown-menu">
			          	<li><a href="ViewAllVenders.php">View all Venders</a></li>
			          	<li><a href="SearchVenderPrep.php">Edit a Venders Info</a></li>
			          	<li><a href="AddNewVender.php">Add New Vender</a></li>	 	          	
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Purchase Orders <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="ListPO.php">List PO's</a></li>
			            <li><a href="SearchPO.php">Search PO's</a></li>
			            <li class="divider"></li>
			            <li><a href="AddPO.php">Create PO</a></li>
						<li><a href="SearchPO.php">Receive PO</a></li>
						<li><a href="SearchPO.php">Change PO</a></li>
						<li><a href="SearchPO.php">Delete PO</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">User Management<b class="caret"></b></a>
			          <ul class="dropdown-menu">
			          	<li><a href="AddNewUser.php">Add New User</a></li>	 	          	
			          	<li><a href="EditUser.php">Edit User</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<b class="caret"></b></a>
			          <ul class="dropdown-menu">
 	          	
			          </ul>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			      	<a href="signout.php"><button type="submit" class="btn btn-default navbar-btn">Logout</button></a>			        
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
	        
	        <div class="row marketing">
	        	<div class="col-md-6">
	        		<h1>Inventory:</h1>
	        		<h2></h2>
	        		<a href="ListInv.php"><button type=​"button" class=​"btn btn-default">​Get List of complete inventory</button></a>
	        		<h2></h2>
	        		<a href="SearchInvPrep.php"><button type=​"button" class=​"btn btn-default">​Adjust Inventory</button></a>
	        		<h2></h2>
	        	</div>
	        	<div class="col-md-6">
	        		<h1>Products:</h1> 
	        		<h2></h2>
	        		<a href="SearchInvItemPrep.php"><button type=​"button" class=​"btn btn-default">Edit a Product</button></a>
	        		<h2></h2>
	        		<a href="AddItem.php"><button type=​"button" class=​"btn btn-default">Add Product</button></a>
	        		<h2></h2>
	        		<a href="AddNewBrand.php"><button type=​"button" class=​"btn btn-default">​Add Brand</button></a>
	        		<h2></h2>
	        		<a href="AddNewMaterial.php"><button type=​"button" class=​"btn btn-default">​Add Material</button></a>
	        		<h2></h2>
	        		<a href="AddNewPattern.php"><button type=​"button" class=​"btn btn-default">​Add Pattern</button></a>
	        		<h2></h2>
	        	</div>
	        	<div class="col-md-6">
	        		<h1>Venders:</h1>
	        		<h2></h2>
	        		<a href="SearchVenderPrep.php"><button type=​"button" class=​"btn btn-default">​Edit Vender Information</button></a>
	        		<h2></h2>
	        		<a href="AddNewVender.php"><button type=​"button" class=​"btn btn-default">​Add Vender</button></a>
	        		<h2></h2>
	        		<a href="ViewAllVenders.php"><button type=​"button" class=​"btn btn-default">View All Venders</button></a>
	        	</div>
	        	<div class="col-md-6">
	        		<h1>Purchase Orders:</h1>
	        		<h2></h2>
	        		<a href="ListPO.php"><button type=​"button" class=​"btn btn-default">List purchase orders</button></a>
	        		<h2></h2>
	        		<a href="SearchPO.php"><button type=​"button" class=​"btn btn-default">Search for purchase orders by vendor, due date, or purchase order number</button></a>
					<h2></h2>
	        		<a href="AddPO.php"><button type=​"button" class=​"btn btn-default">Create a new purchase order</button></a>
					<h2></h2>
	        		<a href="SearchPO.php"><button type=​"button" class=​"btn btn-default">Receive line items on a purchase order</button></a>
					<h2></h2>
	        		<a href="SearchPO.php"><button type=​"button" class=​"btn btn-default">Revise details of an existing purchase order</button></a>
					<h2></h2>
	        		<a href="SearchPO.php"><button type=​"button" class=​"btn btn-default">Delete an existing purchase order</button></a>
	        		<h2></h2>
	        	</div>
	        	<div class="col-md-6">
	        		<h1>Users:</h1>
	        		<h2></h2>
	        		<a href="AddNewUser.php"><button type=​"button" class=​"btn btn-default">​Add User</button></a>
	        		<h2></h2>
	        		<a href="EditUser.php"><button type=​"button" class=​"btn btn-default">Edit User Info</button></a>
	        		<h2></h2>
	        	</div>
	        </div>
		</div>
		
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
    </body>
</html>