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
	
include_once("../pageheader.php");
include_once("../teamMatch.php");
if (isset($_SESSION['login']))
{
	if ($_SESSION['login'] == "1c7943b67b2c1a6f9b1468ee9e830509")
	{

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="../styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<link href="tablesorter/themes/blue/style.css" rel="stylesheet" type="text/css" />
<script src="../jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="../jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="../livevalidation_stand	alone.compressed.js" type="text/javascript"></script>
<script type="text/javascript" src="tablesorter/jquery.tablesorter.js"></script> 

<head>
<title>Captain Application</title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34432499-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div class="overall_container">

    
<?php

if (isset($_GET['team']))
	$team=mysql_escape_string($_GET['team']);
else
	$team=1;
if ($team > 1)
{
?>
<h1 style="text-align:left; margin-left:20px;"><a href="accepted.php?team=<?php echo ($team - 1);?>">Previous Team</a></h1><?php } ?>
<h1 style="text-align:left; margin-left:20px;"><?php echo getTeam($team); ?> </h1>
<h1 style="text-align:left; margin-left:20px;"><a href="accepted.php?team=<?php echo ($team + 1);?>">Next Team</a></h1>

<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 

    <th>First Name</th> 
    <th>Last Name</th>
    <th>UFID</th> 
    <th>Year</th>   
    <th>Phone</th> 
    <th>UFL</th>
    <th>Reg Email</th>
    <th>Shirt</th>
    <th>Polo</th>
    <th>Local Street</th>
    <th>Local Zip</th>    
    <th>Perm Street</th>
    <th>Perm City</th>    
    <th>Perm State</th>        
    <th>Perm Zip</th>       
</tr> 
</thead> 
<tbody> 


<?php

if ($team)
	$sql0 = "SELECT * From Applicants WHERE accepted = $team";
else
	$sql0 = "SELECT * From Applicants WHERE confirm = 1";
$sql0 = mysql_query($sql0);

$i=0;
while ($applicant = mysql_fetch_assoc($sql0))
{

	if ($team == $applicant['teama'])
	{
		$interviewd = $applicant['interview1d'];
		$interviewt = $applicant['interview1t'];
	}
	else if ($team == $applicant['teamb'])
	{
		$interviewd = $applicant['interview2d'];
		$interviewt = $applicant['interview2t'];
	
	}
	else
	{
		$interviewd = 0;
		$interviewt = 0;	
	}

	if ($team)
	{
		if (($team == $applicant['captain1']) || ($team == $applicant['captain2']))
		{
			$returning = "Yes";
		}
		else
		{
			$returning = "No";
		}
	}
	else if ($applicant['captain1'] || $applicant['captain2'])
	{
		$returning = "Yes";
					
	}
	else
	{
		$returning = "No";
	}
	echo '<tr>';
	echo '<td>' . $applicant['first'] . '</td>';
	echo '<td>' . $applicant['last'] . '</td>';
	echo '<td>' . $applicant['ufid'] . '</td>';
	echo '<td>' . $applicant['year'] . '</td>';
	echo '<td>' . $applicant['phone'] . '</td>';
	echo '<td>' . $applicant['uflemail'] . '</td>';
	echo '<td>' . $applicant['regemail'] . '</td>';
	echo '<td>' . $applicant['shirt'] . '</td>';
	echo '<td>' . $applicant['polo'] . '</td>';
	echo '<td>' . $applicant['lstreet'] . '</td>';
	echo '<td>' . $applicant['lzip'] . '</td>';
	echo '<td>' . $applicant['pstreet'] . '</td>';
	echo '<td>' . $applicant['pcity'] . '</td>';
	echo '<td>' . $applicant['pstate'] . '</td>';
	echo '<td>' . $applicant['pzip'] . '</td></tr>';		

//	print_r($sql1);
$i++;
}

?>

</tbody> 
</table> 
<?php echo '<p style="margin-left:10px;">'. $i .' rows</p>'; ?>
<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#myTable").tablesorter({
	        
   	        sortList: [[0,0]]
	        
        }); 
    } 
); 
    
</script>



</div>
</div>
</div>
<?php 	}
	else
	{
		$_SESSION['redirect']='accepted.php?team='.$team;
		header("Location:index.php");
	}
}
else
{
	$_SESSION['redirect']='accepted.php?team='.$team;
	header("Location:index.php");
} ?>