<?php
include_once("../pageheader.php");
include_once("../teamMatch.php"); 
/*
$sql = mysql_query("SELECT * FROM Applicants");

while($row = mysql_fetch_array($sql)) {
		$ufid = $row['ufid'];
		$ufid = str_replace("-","",$ufid);
		$email = $row['uflemail'];
		mysql_query("UPDATE Applicants SET ufid = '$ufid'  WHERE uflemail ='$email'");
}


$sql = mysql_query("SELECT * FROM Interviews");

while($row = mysql_fetch_array($sql, MYSQL_NUM)) {
		$date = $row[0];
		$team = $row[1];
		$k = 0;
		$addFifty = 0;
		$countFive = 0;
		echo "<h3>".$date."</h3>";
		foreach ($row as $cell)
		{
			$k++;
			if ($cell != $row[0] && $cell != $row[1])
			{
			$time = (1670 + $addFifty + 10*$k);
			$countFive++;
			if ($countFive > 5) {
				$addFifty += 40;
				$countFive = 0;
			}
			$oldCell = $cell;
			$cell = str_replace("-","",$cell);
			echo $date.", ".$time.", ".$team.", ".$cell."<br />";
			mysql_query("UPDATE Interviews SET `$time` = '$cell' WHERE `$time` = '$oldCell' AND Team = '$team'");
			}
		}
}
*/
?>