<?php
include_once("pageheader.php");
include_once("teamMatch.php");

$sql0 = "Select * From Interviews";
$sql0 = mysql_query($sql0);

while ($interviews = mysql_fetch_assoc($sql0))
{	
	foreach ($interviews as $interview)
	{
		if (($interview!=$interviews['team']) && ($interview!=$interview['date']))
		{
			$sql1= "Select * From Applicants WHERE ufid = '$interview'";
			$sql1 = mysql_query($sql1);
			$sql1 = mysql_fetch_assoc($sql1);
			if ($sql1['teama'] == $interview['team'])
			{
				if (($interview['date'] != $sql1['interview1d']) || ($interview['time'] != $sql1['interview1t'])
				{
									
				}
			}
		}
	}
	
	$sql1 = "Select * From Interviews WHERE date = '$date1' AND team = '$teama'";

	$sql1 = $sql1[$time1];
	if (($sql1) && ($sql1 != $ufid))
	{
		echo "Failure for $ufid at $date1 $time1, value is $sql1<br />";
	}
	
	$sql2 = "Select * From Interviews WHERE date = '$date2'  AND team = '$teamb'";
	$sql2 = mysql_query($sql2);
	$sql2 = mysql_fetch_assoc($sql2);
	$sql2 = $sql2[$time2];	
	if (($sql2) && ($sql2 != $ufid))
	{
		echo "Failure for $ufid at $date2 $time2, value is $sql2<br />";
	}

}

?>