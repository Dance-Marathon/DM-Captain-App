<?php
include_once("../../pageheader.php");
$sql = mysql_query("SELECT * FROM Applicants");

while($row = mysql_fetch_array($sql)) {
		$ufid = $row['ufid'];
		$ufid = str_replace("-","",$ufid);
		$email = $row['uflemail'];
		mysql_query("UPDATE Applicants SET ufid2 = '$ufid'  WHERE uflemail ='$email'");
}

?>