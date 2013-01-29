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

/*
if (isset($_GET['team']))
{
	$team = mysql_escape_string($_GET['team']);
}
else
{
	$team = 0;
}
*/

if (isset($_SESSION['team']))
{
	$team = mysql_escape_string($_SESSION['team']);
}
else
{
	$team = 0;
}

//NEEDS LOGIN
if (isset($_SESSION['login']))
{

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="../styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<link href="tablesorter/themes/blue/style.css" rel="stylesheet" type="text/css" />
<link href="overallStyles.css" rel="stylesheet" type="text/css" />
<script src="../jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="../jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="../livevalidation_standalone.compressed.js" type="text/javascript"></script>
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
<div class="interview_container">

<?php   
echo '<ul id="nav">
	<li><a href="accepted.php?team='.$team.'" onClick="displayOverallSection();return false">Confirmed Users</a></li>
	<li><a href="list.php?team='.$team.'&display=uncomfirmed">Accept Users</a></li>
	<li><a href="interview.php?team='.$team.'">Interviews</a></li>
	<li><a href="questions.php?team='.$team.'">Questions</a></li>
</ul>';
 
?>
<h1 style="text-align:left; margin-left:20px;"><?php echo getTeam($team); ?> </h1> 

<table id="myTable" class="tablesorter" style="float:left;margin:-50px 0 50px 20px"> 
<thead> 
<tr> 
	<th>Open/Close</th>
	<th>Date</th>
	<?php if (!($team)) { ?> <th>Team</th> <?php } ?>
    <th>5:00PM</th>
    <th>5:10PM</th>
    <th>5:20PM</th>
    <th>5:30PM</th>
    <th>5:40PM</th>
    <th>5:50PM</th>
    <th>6:00PM</th>
    <th>6:10PM</th>
    <th>6:20PM</th>
    <th>6:30PM</th>
    <th>6:40PM</th>
    <th>6:50PM</th> 
    <th>7:00PM</th> 
    <th>7:10PM</th> 
    <th>7:20PM</th> 
    <th>7:30PM</th> 
    <th>7:40PM</th> 
    <th>7:50PM</th>
    <th>8:00PM</th>
    <th>8:10PM</th>
    <th>8:20PM</th>
    <th>8:30PM</th>
    <th>8:40PM</th>
    <th>8:50PM</th> 
    <th>9:00PM</th> 
    <th>9:10PM</th> 
    <th>9:20PM</th> 
    <th>9:30PM</th> 
    <th>9:40PM</th> 
    <th>9:50PM</th>
    <th>10:00PM</th>    
    <th>10:10PM</th> 
	<th>10:20PM</th>
	<th>10:30PM</th> 
	<th>10:40PM</th> 
	<th>10:50PM</th>
</tr> 
</thead> 
<tbody> 

<pre>   
    
<?php

if ($team)
{
	$sql0 = "SELECT * From Interviews where team = $team"; // WHERE teama = $team or teamb = $team or teamc = $team";
	$sql0 = mysql_query($sql0);

	$j = 0;
	while ($interviews = mysql_fetch_array($sql0, MYSQL_NUM))
	{
		$j++;
		$Date = $interviews[0];
		$Team = $interviews[1];
		echo "<tr>";
		echo '
		<td id="editAll'.$j.'" class="item">
		<span id="editAll'.$j.'Span">Close All</span>
		<select id="editAll'.$j.'Input" style="display:none" class="editAllSelection">
			<option value=0>Open All</option>
			<option value=1 selected>Close All</option>
		</select>
		<input type = "hidden" id = "Date'.$j.'" value="'.$Date.'">
		<input type = "hidden" id = "Team'.$j.'" value="'.$Team.'">
		</td>';
		$k = 0;
		$addFifty = 0;
		$countFive = 0;
		foreach ($interviews as $interview)
		{
		$k++;
			if ($interview == $interviews[0])
			{
				echo "<td>" . fixDate($interview) . "</td>";
				$interviews[0]="zero";
			}
			else if ($interview != $interviews[1])
			{
				$time = (1670 + $addFifty + 10*$k);
				$countFive++;
				if ($countFive > 5) {
					$addFifty += 40;
					$countFive = 0;
				}
				$unique = $j.$k;
				$interviews[1]="one";
				echo "<input type = 'hidden' id = 'time".$unique."' value = '".$time."' />";
				echo "<input type = 'hidden' id = 'date".$unique."' value = '".$Date."' />";
				echo "<input type = 'hidden' id = 'team".$unique."' value = '".$Team."' />";
				if ($interview != '1') {
					echo "<td class='".$Date.$Team." item' id='edit".$unique."'>";
					if ($interview) {
						echo "<span>
						<a href='applicant.php?team=$team&ufid=$interview'>" . getName($interview) . "</a>
						</span>";
					}else{
						echo "<span id='edit".$unique."Span'>Open</span>
						<select id='edit".$unique."Input' style='display:none' class='editSelection'>
							<option value=0 selected>Open</option>
							<option value=1>Closed</option>
						</select>";
					}
					echo "
					</td>";
				}else{
					$unique = $j.$k;
					echo "<td class='".$Date.$Team." item' id='edit".$unique."'>
						<span id='edit".$unique."Span'>Closed</span>
						<select id='edit".$unique."Input' style='display:none' class='editSelection'>
							<option value=0>Open</option>
							<option value=1 selected>Closed</option>
						</select>
						</td>";
				}
			}
		}
		echo "</tr>";
	}
}
else
{
	$j = 0;
	for ($i=0; $i <14; $i++)
	{
		
	$sql0 = "SELECT * From Interviews where team = $i"; // WHERE teama = $team or teamb = $team or teamc = $team";
	$sql0 = mysql_query($sql0);
	
	while ($interviews = mysql_fetch_array($sql0, MYSQL_NUM))
	{
		$j++;
		$Date = $interviews[0];
		$Team = $interviews[1];
		echo "<tr>";
		echo '
		<td id="editAll'.$j.'" class="item">
		<span id="editAll'.$j.'Span">Close All</span>
		<select id="editAll'.$j.'Input" style="display:none" class="editAllSelection">
			<option value=0>Open All</option>
			<option value=1 selected>Close All</option>
		</select>
		<input type = "hidden" id = "Date'.$j.'" value="'.$Date.'">
		<input type = "hidden" id = "Team'.$j.'" value="'.$Team.'">
		</td>';
		$k = 0;
		$addFifty = 0;
		$countFive = 0;
		foreach ($interviews as $interview)
		{
		$k++;
			if ($interview == $interviews[0])
			{
				echo "<td>" . fixDate($interview) . "</td>";
				$interviews[0]="zero";				
			}
			else if ($interview == $interviews[1])
			{
				echo '<td>'.getTeam($interview).'</td>';
				$interviews[1]="one";				
				
			}
			else
			{
				$time = (1670 + $addFifty + 10*$k);
				$countFive++;
				if ($countFive > 5) {
					$addFifty += 40;
					$countFive = 0;
				}
				$unique = $j.$k;
				$interviews[1]="one";
				echo "<input type = 'hidden' id = 'time".$unique."' value = '".$time."' />";
				echo "<input type = 'hidden' id = 'date".$unique."' value = '".$Date."' />";
				echo "<input type = 'hidden' id = 'team".$unique."' value = '".$Team."' />";
				if ($interview != 1) {
					echo "<td class='".$Date.$Team." item' id='edit".$unique."'>";
					if ($interview) {
						echo "<span>
						<a href='applicant.php?team=$team&ufid=$interview'>" . getName($interview) . "</a>
						</span>";
					}else{
						echo "<span id='edit".$unique."Span'>Open</span>
						<select id='edit".$unique."Input' style='display:none' class='editSelection'>
							<option value=0 selected>Open</option>
							<option value=1>Closed</option>
						</select>";
					}
					echo "
					</td>";
				}else{
					$unique = $j.$k;
					echo "<td class='".$Date.$Team." item' id='edit".$unique."'>
						<span id='edit".$unique."Span'>Closed</span>
						<select id='edit".$unique."Input' style='display:none' class='editSelection'>
							<option value=0>Open</option>
							<option value=1 selected>Closed</option>
						</select>
						</td>";
				}
			}
		}
		echo "</tr>";
	}
		
	}

}
?>

</tbody> 
</table> 

<script type="text/javascript">
$(document).ready(function() 
    { 
       <?php if ($team)
		        echo '$("#myTable").tablesorter({       sortList: [[0,0]]       });';        		
			 else
	 	        echo '$("#myTable").tablesorter({       sortList: [[1,0],[0,0]]       });'; 
		?>
				
				
		$('.item').mouseover(
		function(){	
			var myId = $(this).attr('id');
			$('#'+myId+'Input').css("display", "inline").focus();
			$('#'+myId+'Span').css("display", "none");
		});
		
		$('.editSelection').blur(
		function(){	
			var selectId = $(this).attr('id');
			var value = $("#"+selectId+" option:selected").val();
			var textValue = $("#"+selectId+" option:selected").text();
			var myId = $(this).attr('id');
			var spanId = myId.replace("Input","Span");
			var unique = myId.replace("Input","");
			    unique = unique.replace("edit","");
			var time = $("#time"+unique).val();
			var date = $("#date"+unique).val();
			var team = $("#team"+unique).val();
			$(this).css("display", "none");
			$("#"+spanId).html(textValue);
			$("#"+spanId).css("display", "block");
			$.post("ajaxPosts/interviewChange.php",{time:time, date:date, team:team, value:value}, 
				function(data) {
			});
		});
		
		$('.editAllSelection').blur(
		function(){	
			var selectId = $(this).attr('id');
			var value = $("#"+selectId+" option:selected").val();
			var textValue = $("#"+selectId+" option:selected").text();
			var myId = $(this).attr('id');
			var spanId = myId.replace("Input","Span");
			var index = myId.replace("Input","");
			    index = index.replace("editAll","");
			var date = $("#Date"+index).val();
			var team = $("#Team"+index).val();
			var time = 1700;
			$(this).css("display", "none");
			$("#"+spanId).html(textValue);
			$("#"+spanId).css("display", "block");
			$("."+date+team).each(function() {
				var $t = $(this).children().first();
				var id = $(this).attr('id');
				if (value == 0) {
					tVal = "Open";
				}else{
					tVal = "Closed";
				}
				if(!$t.html() || $t.html() == "Closed" || $t.html() == "Open") {
					$t.html(tVal);
					$.post("ajaxPosts/interviewChange.php",{time:time, date:date, team:team, value:value}, 
						function(data) {
					});
				}
				//post date, team, and time
				time += 10;
			});
		});
    } 
); 
    
</script>



</div>
</div>
</div> 
<?php 
}
else
{
	$_SESSION['redirect']='interview.php?team='.$team;
	header("Location:index.php");
} ?>