<?php
	include_once("../../pageheader.php");
	$ufid = mysql_real_escape_string($_POST['ufid']);
	$result = mysql_query("SELECT * FROM overalls WHERE ufid = '$ufid' AND registered = '0'");
	$numRows = mysql_num_rows($result);
	
	if($numRows == 0) {
		echo "This UFID is not eligible to become an Overall.";
	}else{
		echo "1";
	}
?>