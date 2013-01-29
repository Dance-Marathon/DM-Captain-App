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

function getTeam($num)
{
	switch ($num) {
		case 0:
			return "None";
		case 1:
			return "Art/Layout";
		case 2:
			return "Community Events";
		case 3:
			return "Dancer Relations";
		case 4:
			return "Entertainment";
		case 5:
			return "Family Relations";
		case 6:
			return "Finance";
		case 7:
			return "Hospitality";
		case 8:
			return "Marketing";
		case 9:
			return "Morale";
		case 10:
			return "Operations";
		case 11:
			return "Public Relations";
		case 12:
			return "Recruitment";
		case 13:
			return "Technology";
		case 14:
			return "Overall";
		case 15:
			return "Internal";
		case 16:
			return "External";
		
		
	}
}

function fixDate($date)
{

	switch($date)
	{
		case "sun":
			return  "9/16";
		case "mon":
			return  "9/17";
		case "tues":
			return  "9/18";
		case "weds":
			return  "9/19";
		case "thurs":
			return  "9/20";									
	}
	

}

function fixInterview($date, $time)
{
	$return = "";

	switch($date)
	{
	
		case "0":
			return "None";
		case "sun":
			$return = "9/16";
			break;
		case "mon":
			$return = "9/17";
			break;
		case "tues":
			$return = "9/18";
			break;
		case "weds":
			$return = "9/19";
			break;
		case "thurs":
			$return = "9/20";									
			break;
	}
	
	$time =  intval($time) - 1200;
	if ($time < 500)
	{
		return "None";
	}
	if ($time < 1000)
		$time = substr($time, 0, 1) . ':' . substr($time, 1, 2) .'PM';
	else
		$time = substr($time, 0, 2) . ':' . substr($time, 2, 2) .'PM';
	return $return . ' ' . $time;

}

function getName($ufid)
{
	if ($ufid == '1')
	{
		return "Closed";
	}
	$noHyphen = str_replace("-","",$ufid);
	$ufid = $noHyphen;
	$sql0 = "Select * From Applicants WHERE ufid = '$ufid'";
	$sql0 = mysql_query($sql0);
	$sql0 = mysql_fetch_assoc($sql0);
	return $sql0['first'] . ' ' . $sql0['last'];

}

function getYear($year)
{
	switch ($year) {
		case 1:
			return "Freshman";
		case 2:
			return "Sophomore";
		case 3:
			return "Junior";
		case 4:
			return "Senior";
		case 5:
			return "Super Senior";
		case 6:
			return "Grad Student";
	}
		
}

function getTeams() {
echo '<select name="team" id="teamList">';
	$sql = mysql_query("SELECT *FROM Teams");
	while($row = mysql_fetch_array($sql)) {
		$teamName = $row['team'];
		$id = $row['id'];
		echo "<option value = '".$id."'>".$teamName."</option>";
	}	
echo '</select>';
}

?>