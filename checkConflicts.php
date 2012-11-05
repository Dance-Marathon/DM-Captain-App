<?php
/* Dance Marathon Captain Application
    Copyright 2012 Dance Marathon at the University of Florida

This product includes software developed by the Dance Marathon at the University of Florida 2013 Technology Team.
The following developers contributed to this project:
	Matthew Gerstman
	Eric Smith

Dance Marathon at the University of Florida is a year-long effort that culminates in a 26.2-hour event where over 800 students stay awake and on their feet to symbolize the obstacles faced by children with serious illnesses or injuries. The event raises money for Shands Hospital for Children, your local Children’s Miracle Network Hospital, in Gainesville, FL. Our contributions are used where they are needed the most, including, but not limitied to, purchasing life-saving medial equipment, funding pediatric research, and purchasing diversionary activities for the kids.

For more information you can visit http://floridadm.org
   
This software includes the following open source plugins listed below:
	Title:		HTML5 Image Uploader
	Link:		http://tutorialzine.com/2011/09/html5-file-upload-jquery-php/
	Copyright: 	None, but we're nice and want to give credit.

	Title:		jQuery Validation Plugin 1.9.0
	Link:		http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	Copyright:	Copyright (c) 2006 - 2011 Jörn Zaefferer
	License:	MIT License (http://www.opensource.org/licenses/mit-license.php)

	Title:		TableSorter 2.0 - Client-side table sorting with ease!
	Link:		http://tablesorter.com
	Copyright:	Copyright (c) 2007 Christian Bach
	License:	http://www.opensource.org/licenses/mit-license.php */
	
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