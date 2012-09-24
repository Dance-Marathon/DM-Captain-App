<?php 

function connect() //connects to the mysql server and opens the assassins database
{
	$connect = @mysql_connect("dmapplications.db.9305917.hostedresource.com", "dmapplications", "BanceMarathon1");

//connect to server

	if (!$connect) {
  		echo( "<P>Unable to connect to the applications database at this time.</P>" );
  		exit();
	}

	
//select the assassins database

	if (! @mysql_select_db("dmapplications") ) {
    	echo( "<P>Unable to locate the applications database at this time.</P>" );
    exit();
  	}
}
?>