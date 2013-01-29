<?php

include_once("pageheader.php");
include_once("requirelogin.php");
include_once("teamMatch.php"); 

// Update and/or make teams table
	mysql_query("CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14");

	mysql_query("INSERT INTO `teams` (`id`, `team`) VALUES
(1, 'Art/Layout'),
(2, 'Community Events'),
(3, 'Dancer Relations'),
(4, 'Entertainment'),
(5, 'Family Relations'),
(6, 'Finance'),
(7, 'Hospitality'),
(8, 'Marketing'),
(9, 'Morale'),
(10, 'Operations'),
(11, 'Public Relations'),
(12, 'Recruitment'),
(13, 'Technology'),
(14, 'All')");

// remove hyphens from ufid's in applicants

$sql = mysql_query("SELECT * FROM Applicants");

while($row = mysql_fetch_array($sql)) {
		$ufid = $row['ufid'];
		$ufid = str_replace("-","",$ufid);
		$email = $row['uflemail'];
		mysql_query("UPDATE Applicants SET ufid = '$ufid'  WHERE uflemail ='$email'");
}

//remove hyphen from ufids in interviews 

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


?>