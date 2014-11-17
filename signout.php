<?php	
include 'connection.php';
include 'cookies.php';

   if( isset($_SESSION["Email"]) && $_SESSION["Password"] )
    {
        echo "You are already logged in, ".$_SESSION['name']."! <br> I'm Logging you out";
        unset( $_SESSION );

        // *** The empty quotes do nothing
        // exit("");
        exit;
    }

header("Location:index.php");

?>
