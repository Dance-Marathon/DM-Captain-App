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
	License:	http://www.opensource.org/licenses/mit-license.php
	
	Title:		Masked Input plugin for jQuery
	Link:		http://digitalbush.com/projects/masked-input-plugin/
	Copyright:	Copyright (c) 2007-2011 Josh Bush (digitalbush.com)
	License:	MIT License (http://www.opensource.org/licenses/mit-license.php)*/
	
include_once("pageheader.php");
include_once("requirelogin.php");
?>
<?php

	$team = htmlspecialchars($_POST['team']);	
	$date = htmlspecialchars($_POST['date']);

	if ($date)
	{
		$sql0 = "SELECT * FROM Interviews WHERE Date = '$date' and Team = $team";
		$sql0 = mysql_query($sql0);
		
		$return = array();
		$times = mysql_fetch_array($sql0, MYSQL_ASSOC);		
	
		foreach ($times as $military => $applicant)
		{
			if (!$applicant || $applicant == $ufid)
			{
				$temp = (string)((int)($military) - 1200);
				if (((int)$temp) < 1000)
					$temp = substr($temp, 0, 1) . ":" . substr($temp, 1, 2) . " PM";
				else
					$temp = substr($temp, 0, 2) . ":" . substr($temp, 2, 2) . " PM";
				$return[$military] = $temp;			
			}			
	
		}
	
		echo json_encode($return);
	}
?>