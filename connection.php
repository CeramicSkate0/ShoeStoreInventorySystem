<?php
	
	function DatabaseConnect($mysql_dbname)
	{
		//connect to database 
		//mysql hostname 
		$hostname = 'fall14seniorproj.db.7456864.hostedresource.com';
		
		// mysql username 
		$mysql_username = 'fall14seniorproj';
		
		//mysql password 
		$mysql_password = 'Seniorproject1#';
		
			
		$con = mysqli_connect($hostname, $mysql_username, $mysql_password, $mysql_dbname);
			
		if (mysqli_connect_errno())
		{
			return " Failed to connect to DataBase: " . mysqli_connect_error();
		}
		return $con;
	}
    
?>