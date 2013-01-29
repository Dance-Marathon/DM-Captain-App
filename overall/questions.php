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
$team = $_SESSION["team"];
$result = mysql_query("SELECT * FROM Questions WHERE id = '$team'");
$questionArray = array();
$count = 0;
while ($row = mysql_fetch_assoc($result)) {
	$questionArray[$count++] = $row['question'];
}
$questionArraySize = sizeof($questionArray);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="../styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<link href="overallStyles.css" rel="stylesheet" type="text/css" />
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
echo '<ul id="nav">
	<li><a href="accepted.php?team='.$team.'" onClick="displayOverallSection();return false">Confirmed Users</a></li>
	<li><a href="list.php?team='.$team.'&display=uncomfirmed">Accept Users</a></li>
	<li><a href="interview.php?team='.$team.'">Interviews</a></li>
	<li><a href="questions.php?team='.$team.'">Questions</a></li>
</ul>';

//Someone could just change the url and edit other people's teams. Unless manager, use session
$team = $_SESSION["team"];

?>
<h1 style="text-align:left; margin-left:20px;">
Team Questions - <?php echo getTeam($team); ?>
</h1>

<div style = "margin:0 0 50px 50px">

<h2 style = "color:#014083">Number of questions: 
<select id="numOfQuestions" style ="vertical-align:middle">
	<?php
		
		for ($i = 1; $i < 6; $i++) {
			if ($i == $questionArraySize) {
				echo "<option value='".$i."' selected>".$i."</option>";
			}else{
				echo "<option value='".$i."'>".$i."</option>";
			}
		}
	?>
</select>
</h2>

<div id="questionDiv">
<?php
displayQuestions($questionArraySize);
?>
</div>

</div>

<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#myTable").tablesorter({
	        
   	        sortList: [[9,0]]
	        
        }); 
		
		
		$("#numOfQuestions").blur(function() {
			var numOfQuestions = $("#numOfQuestions option:selected").val();
			$.post("ajaxPosts/loadQuestions.php",{numOfQuestions: numOfQuestions},
			function(data) {
				$("#questionDiv").html(data);
			});
		});
    } 
); 

function confirm(ufid) {
	name = "confirm"+ufid;
	element = document.getElementById(name);
	$("#"+name+"").html("Confirmed");
	$.post("ajaxPosts/confirmUser.php", {ufid: ufid}, 
	function(data) {
			
	});
}
    
</script>



</div>
</div>
</div>
<?php
}
else
{
	header("Location:index.php");
} 

function displayQuestions($num) {
	global $questionArray;
	for ($i = 0; $i < $num; $i++) {
		$question = $questionArray[$i];
		$qNum = $i+1;
		displayQuestionBox($qNum, $question);
	}
}

function displayQuestionBox($number, $question) {
	echo '<h2>Question '.$number.':</h2>
	<textarea style="width:550px;height:150px">'.$question.'</textarea>';
}
?>