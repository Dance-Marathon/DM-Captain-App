<?php
include_once("pageheader.php");
include_once("requirelogin.php");

for ($i=0; $i<14; $i++)
{
	$sql0 = "Insert Into Interviews Set team=$i, date='mon'";
	$sql0 = mysql_query($sql0);

//		echo str_replace('BANCEDARATHON', '<br />', (strip_tags($row[3]))) . '<br />';
		
}


?>
