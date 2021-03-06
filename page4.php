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
include_once("teamMatch.php");
?>

<?php

if ($ufid)
{

	$sql0 = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
	$sql0 = mysql_query($sql0);
	
	$teama = mysql_result($sql0, 0, 'teama');
	$team1 = getTeam($teama);
	
	$teamb = mysql_result($sql0, 0, 'teamb');
	$team2 = getTeam($teamb);
	
	$interview1d = mysql_result($sql0, 0, 'interview1d');
	$interview1t = mysql_result($sql0, 0, 'interview1t');
	$interview2d = mysql_result($sql0, 0, 'interview2d');
	$interview2t = mysql_result($sql0, 0, 'interview2t');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="livevalidation_standalone.compressed.js" type="text/javascript"></script>
<script src="assets/js/jquery.filedrop.js"></script>
<script src="assets/js/script.js"></script>

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
<div class="container">
<div align="center">
<h1>Interview Time</h1>

<!--<table class="outside_table">
<tr><td>
		<div id="dropbox">
			<span class="message"><img src="drophere.png" /></i></span>
		</div>
			
</td></tr>
</table>-->

<table class="interview_times">

<form action="page5.php" method="post">
	<tr>

<td><table>
	<tr><td colspan="2"><h2><?php echo $team1;?></h2></td></tr>
	<tr><td>Date:</td><td><select id="date1" name="date">
		<option value="">Select a Date</option>
		<option value="sun">Sunday 9/16</option>
		<option value="mon">Monday 9/17</option>
		<option value="tues">Tuesday 9/18</option>
		<option value="weds">Wednesday 9/19</option>
		<option value="thurs">Thursday 9/20</option>
		</select></td></tr>
	<tr id="timeRow1" hidden><td>Time:</td><td>
		<select id="time1" name="time">
		</select>
	</td>	</tr>
	</table></td> <?php } ?>

	<td><table>
	<tr><td colspan="2"><h2><?php echo $team2;?></h2></td></tr>
	<tr><td>Date:</td><td><select id="date2" name="date">
		<option value=""> Select a Date</option>
		<option value="sun">Sunday 9/16</option>
		<option value="mon">Monday 9/17</option>
		<option value="tues">Tuesday 9/18</option>
		<option value="weds">Wednesday 9/19</option>
		<option value="thurs">Thursday 9/20</option>
		</select></td></tr>
	<tr id="timeRow2" hidden><td>Time:</td><td>
		<select id="time2" name="time">
		</select>
	</td></tr>
	</table></td>

	</tr>
		<tr id="submitRow2"><td colspan="2" style="text-align:center"><input type="submit" id="submitButton" value="Preview Application" style="margin-top:20px;"/></td>


</form>
</table>

</div>

<script type="text/javascript">


$(document).ready(function(){

	

	$('#date1').change(function(){
		
		var date = $('#date1').val();
	//	alert(date);
	$.post('loadtimes.php', {"date" : date, "team" : <?php echo $teama; ?>}, function(data){
	
		$('#timeRow1').fadeIn(1000);
		$('#time1').empty();
		$('#time1').append("<option value =''> Select a Time</option>");
		
		var times = $.parseJSON(data);
		$.each(times, function(value, time){
			if ((date == '<?php echo $interview1d;?>') && (value == <?php echo $interview1t; ?>))
			{
				$('#time1').append("<option value = " + value + " selected>" + time + "</option>");
			}
			else
			{
				$('#time1').append("<option value = " + value + ">" + time + "</option>");
			}
			
		});
	});
	
	});
	
	$('#time1').change(function(){
	
		var pass = {
		date : $('#date1').val(),
		time : $('#time1').val(),
		interview : "interview1",
		team : "<?php echo $teama; ?>"
		};
		
		if (($('#date1').val() == $('#date2').val()) && ($('#time1').val() == $('#time2').val()))
		{
			alert("You can't be in two places at once!");
			$('#time1').val(<?php echo $interview1t ?>);
			return false;
		}
		
		
		$.post('submitInterview.php', pass, function(data){
			
			var worked = $.parseJSON(data);
			if (worked)
			{
				return true;		
			}
			else
			{
				alert('Oops, that time was selected while you were waiting.\n Please pick a new one');
				$('#date1').change();		
			}
				
			});
	});
	
	
	$('#date2').change(function(){
		
		var date = $('#date2').val();
	//	alert(date);
	$.post('loadtimes.php', {"date" : date, "team" : <?php echo $teamb; ?>}, function(data){
	
		$('#timeRow2').fadeIn(1000);
		$('#time2').empty();
		$('#time2').append("<option value =''> Select a Time</option>");
		
		var times = $.parseJSON(data);
		$.each(times, function(value, time){
			
			if ((date == '<?php echo $interview2d;?>') && (value == <?php echo $interview2t; ?>))
			{
				$('#time2').append("<option value = " + value + " selected>" + time + "</option>");
			}
			else
			{
				$('#time2').append("<option value = " + value + ">" + time + "</option>");
			}
			
		});
	});
	
	});
	
	
	$('#time2').change(function(){
	
		var pass = {
		date : $('#date2').val(),
		time : $('#time2').val(),
		interview : "interview2",
		team : "<?php echo $teamb; ?>"
		};
		
		if (($('#date1').val() == $('#date2').val()) && ($('#time1').val() == $('#time2').val()))
		{
			alert("You can't be in two places at once!");
			$('#time2').val(<?php echo $interview2t ?>);
			return false;
		}
		
		
		$.post('submitInterview.php', pass, function(data){
			
			var worked = $.parseJSON(data);
			if (worked)
			{
				return true;		
			}
			else
			{
				alert('Oops, that time was selected while you were waiting.\n Please pick a new one');
				$('#date2').change();
			}
				
			})
	});
	
	
	if ('<?php echo $interview1d; ?>'!='')
	{
		$('#date1').val('<?php echo $interview1d;?>');
		$('#timeRow1').fadeIn(0);
		$('#date1').change();
	}

	if ('<?php echo $interview2d; ?>'!='')
	{
		$('#date2').val('<?php echo $interview2d;?>');
		$('#timeRow2').fadeIn(0);
		$('#date2').change();
	}	
	

});


</script>


<div class="footer">
	<div class="footer_content">
		A COPY OF THE OFFICIAL REGISTRATION AND FINANCIAL INFORMATION MAY BE OBTAINED FROM THE DIVISION OF CONSUMER SERVICES BY CALLING TOLL FREE 1-800-435-7352 WITHIN THE STATE. REGISTRATION DOES NOT IMPLY ENDORSEMENT, APPROVAL, OR RECOMMENDATION BY THE STATE. SHANDS TEACHING HOSPITAL AND CLINICS REGISTRATION NUMBER WITH THE STATE OF FLORIDA: SC01801<br />
		<div class="footer_spacing">
			<a href="http://www.health.ufl.edu/disclaimer.shtml">Disclaimer & Permitted Use</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://www.ufl.edu/disability/">Disability Services</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="https://security.health.ufl.edu">Security Policies</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://privacy.ufl.edu/privacystatement.html">UF Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://www.shands.org/terms.asp">Shands Privacy Policy</a>
		</div>
	</div>
</div>


</div>
</div>

</body>
</html>
<?php } ?>