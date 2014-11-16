<?php
include 'connection.php';
$company_name = $_COOKIE['companyname'];
$company_id = $_COOKIE['companyid'];

?>

<!doctype html>
<html class="no-js">
    <head>
        <script type="text/Javascript">
			$(function(){
			    $('#namecheckbox').on('change', function() { 
			        if($(this).is(':checked')) {
			            $('#name').addClass('myshow').removeClass('myhide');
			        }
			        else {
			        	$('#name').addClass('myhide').removeClass('myshow');
			        }
			    });
			});
			$(function(){
			    $('#citycheckbox').on('change', function() { 
			        if($(this).is(':checked')) {
			            $('#city').addClass('myshow').removeClass('myhide');
			            $('#next1').prop('id', 'next4');
			        }
			        else {
			        	$('#city').addClass('myhide').removeClass('myshow');
			        }
			    });
			});
			$(function(){
			    $('#skillcheckbox').on('change', function() { 
			        if($(this).is(':checked')) {
			            $('#skills').addClass('myshow').removeClass('myhide');
			            $('#next1').prop('id', 'next4');
			        }
			        else {
			        	$('#skills').addClass('myhide').removeClass('myshow');
			        }
			    });
			});
			$(function(){
			    $('#submit').click(function(){
			    	$('#myform').hide();
			    });
			});
		</script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Search POs</title>
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
	        	<form action="volsearch.php" role="form" method="post" id="myform">
		        	<div class="col-md-4">
		        		<label for="namecheckbox">Search by name</label>
						<input type="checkbox" class="checkbox" id="namecheckbox" name="namecheckbox" />
		        		<div id="name" class="myhide" >
		        			<div class="form-group">
								<label for="firstName">First name</label>
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" />
							</div>
							<div class="form-group">
								<label for="lastName">Last name</label>
								<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name"  />
							</div>        						
		        		</div>
		        		
		        		<label for="citycheckbox">Search by city</label>
						<input type="checkbox" class="checkbox" id="citycheckbox" name="citycheckbox" />
		        		<div id="city" class="myhide" >
		        			<div class="form-group">
								<label for="city">City</label>
								<input type="text" class="form-control" id="city" name="city" placeholder="City"  />
							</div>    						
		        		</div>
		        	</div>
		        	<div class="col-md-8">
		        		<label for="skillcheckbox">Search by skills</label>
						<input type="checkbox" class="checkbox" id="skillcheckbox" name="skillcheckbox" />
		        		<div id="skills" class="myhide" >
		        			<div class="row form-group">
				    			<h3>General skills: </h3>
				    			<div class="col-md-4">
					    			<label class="checkbox">
									  <input type="checkbox" name="general[]" value="Lift25"> Able to lift 25 lbs
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="Lift50"> Able to lift 50 lbs
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="Lift75"> Able to lift 75 lbs
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="Cleaning"> Cleaning
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="CrowdControl"> Crowd control
									</label>
								</div>
								<div class="col-md-4">
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="Filing"> Filing
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="Organizing"> Organizing
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="Proofreading"> Proofreading
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="PublicSpeaking"> Public speaking
									</label>
								</div>
								<div class="col-md-4">
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="ResearchTechniques"> Research techniques
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="TelephoneSkills"> Telephone skills
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="WorkChildren"> Working with children
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="general[]" value="WorkTeens"> Working with teens
									</label>
								</div>
				  			</div> <!-- end general skills -->
				    		
				    		<div class="row form-group">
				    			<h3>Computer skills: </h3>
				    			<div class="col-md-4">
					    			<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="DataEntry"> Data entry
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="Access"> Databases/Access
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="GeneralComputer"> General computer skills
									</label>
								</div>
								<div class="col-md-4">
									<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="GraphicDesign"> Graphic design
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="Internet"> Internet and email
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="InternetCoding"> Internet coding
									</label>
								</div>
								<div class="col-md-4">
									<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="Presentations"> Presentations/Powerpoint
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="Spreadsheets"> Spreadsheets/Excel
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="computer[]" value="WordProcessors"> Word processors/Word
									</label>
								</div>
				    		</div> <!-- end computer skills -->
				    		
				    		<div class="row form-group">
				    			<h3>Special skills: </h3>
				    			<div class="col-md-4">
					    			<label class="checkbox">
									  <input type="checkbox" name="special[]" value="BanquetService"> Banquet service
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="CashHandling"> Cash handling
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="Crafts"> Crafts
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="EventSetup"> Event setup
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="Multilingual"> Fluent in other language(s)
									</label>
								</div>
								<div class="col-md-4">
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="Fundraising"> Fundraising
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="Landscaping"> Landscaping
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="Painting"> Painting
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="Photography"> Photography
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="Sculpture"> Sculpture
									</label>
								</div>
								<div class="col-md-4">
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="SignLanguage"> Sign language
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="SpeedReading"> Speed reading
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="Tutoring"> Teaching/tutoring
									</label>
									<label class="checkbox">
									  <input type="checkbox" name="special[]" value="VideoEditing"> Video editing
									</label>
								</div>
				    		</div> <!-- end special skills --> 
				    		<div class="row form-group">
				    			<h3>Library skills: </h3>
				    			<div class="col-md-4">
					    			<label class="checkbox">
									  <input type="checkbox" name="library[]" value="ArchivalPreservation"> Archival preservation
									</label>
								</div>
								<div class="col-md-4">
									<label class="checkbox">
									  <input type="checkbox" name="library[]" value="ArchivalProcessing"> Archival processing
									</label>
								</div>
								<div class="col-md-4">
									<label class="checkbox">
									  <input type="checkbox" name="library[]" value="DeweyDecimal"> Dewey Decimal System
									</label>
								</div>
				    		</div> <!-- end library skills -->						
		        		</div>
		        	</div>
		        	<input type="submit" class="btn btn-primary" id="submit"/> 
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