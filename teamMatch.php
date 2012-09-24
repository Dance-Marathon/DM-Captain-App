<?php 

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

?>