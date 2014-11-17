<?php
function CreateCookies($Email)
{
	$con = DatabaseConnect('fall14seniorproj');
	if(is_string($con))
	{
		echo $con;
	}
	else
	{
		$sql = "SELECT * FROM EMPLOYEE WHERE Email='$Email'";	
		if (!mysqli_query($con, $sql)) 
		{
			die('ERROR: ' . mysqli_error($con));
		}
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_BOTH);
		$User_ID = $row[0];
		$Email= $row[1];
		//$LastName= $row[2];
		//$FirstName = $row[3];
		mysqli_close($con);
		
		// Setting cookies
		setcookie("FirstName", $FirstName);
		setcookie("LastName", $LastName);
		setcookie("User_ID", $User_ID);
		setcookie("Email", $Email);	
	}	
}
?>