<?php 

$server = "SERVER_HERE";
$username = "USERNAME_HERE";
$password = "PASSWORD_HERE"
$database = "DATABASE_NAME_HERE";

function connect() //connects to the mysql server and opens the assassins database
{
	$connect = @mysql_connect($server, $username, $password);

//connect to server

	if (!$connect) {
  		echo( "<P>Unable to connect to the applications database at this time.</P>" );
  		exit();
	}

	
//select the assassins database

	if (! @mysql_select_db($database) ) {
    	echo( "<P>Unable to locate the applications database at this time.</P>" );
    exit();
  	}
}
?>

