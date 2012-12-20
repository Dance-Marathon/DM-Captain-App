<?php
include_once("../../pageheader.php");
$sql = mysql_query("SELECT * FROM applicants");

while($row = mysql_fetch_array($sql)) {
		$ufid = $row['ufid'];
		$ufid = str_replace("-","",$ufid);
		$email = $row['uflemail'];
		mysql_query("UPDATE applicants SET ufid2 = '$ufid'  WHERE uflemail ='$email'");
}

?>