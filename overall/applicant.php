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
include_once("../getUnformattedQuestion.php"); 
?>
<?php

if (isset($_GET['ufid']))
{
	$ufid = $_GET['ufid'];
}
else
{
	$ufid = 0;
}

if (isset($_SESSION['team']))
{
	$team = mysql_escape_string($_SESSION['team']);
}
else
{
	$team = 0;
}

if (isset($_SESSION['login']))
{



if ($ufid)
{
	$sql0 = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
	$sql0 = mysql_query($sql0);
	$sql0 = mysql_fetch_array($sql0);
	
	$ufid = $sql0['ufid'];
	$uflemail = $sql0['uflemail'];
	$password = $sql0['password'];
	$first = $sql0['first'];
	$last = $sql0['last'];
	$year = $sql0['year'];
	$grad = $sql0['grad'];
	$major = $sql0['major'];
	$gpa = $sql0['gpa'];
	$shirt = $sql0['shirt'];
	$teama = $sql0['teama'];
	$teamb = $sql0['teamb'];
	$teamc = $sql0['teamc'];
	$phone = $sql0['phone'];
	$regemail = $sql0['regemail'];
	$lstreet = $sql0['lstreet'];
	$lzip = $sql0['lzip'];
	$lcity = $sql0['lcity'];
	$lstate = $sql0['lstate'];
	$pstreet = $sql0['pstreet'];
	$pzip = $sql0['pzip'];
	$pcity = $sql0['pcity'];
	$pstate = $sql0['pstate'];
	$dancer = $sql0['dancer'];
	$staff1 = $sql0['staff1'];
	$staff2 = $sql0['staff2'];
	$captain1 = $sql0['captain1'];
	$captain2 = $sql0['captain2'];
	$overall1 = $sql0['overall1'];
	$overall2 = $sql0['overall2'];
	$improvements = mysql_real_unescape_string($sql0['improvements'], 2);
	$orgs = mysql_real_unescape_string($sql0['orgs'], 2);
	$question1 = mysql_real_unescape_string($sql0['question1'], 2);
//	$question1 = $sql0['question1'];
	$question2 = mysql_real_unescape_string($sql0['question2'], 2);
	$question3 = mysql_real_unescape_string($sql0['question3'], 2);
	$question4 = mysql_real_unescape_string($sql0['question4'], 2);
	$question5 = mysql_real_unescape_string($sql0['question5'], 2);
	$question6 = mysql_real_unescape_string($sql0['question6'], 2);
	$interview1d = $sql0['interview1d'];
	$interview1t = $sql0['interview1t'];
	$interview2d = $sql0['interview2d'];
	$interview2t = $sql0['interview2t'];
	$img = $sql0['img'];	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="../
styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="livevalidation_standalone.compressed.js" type="text/javascript"></script>

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


<div class="overall">
<table class="overall_table">
<tbody>
<tr>
<td rowspan="3" class="overall_list"><br />
<h2><a href="list.php?team=<?php echo $team ?>">All Applicants</a></h2><br />
<h2><a href="interview.php?team=<?php echo $team ?>">Interview View</a></h2><br />
<h2><a href="logout.php">Logout</a></h2><br />
</td>
<td><img class="overall_img" src="<?php if ($img) {echo "../uploads/".$img;} ?>" /></td>


<td class="overall_stats">
<h2><?php echo $first . ' ' . $last; ?></h2>
<br />
<p>
<b>Year:</b> <?php echo getYear($year); ?> <br />
<b>Expected Graduation:</b> <?php echo $grad; ?> <br />
<b>Major:</b> <?php echo $major; ?> <br />
<b>GPA:</b> <?php echo $gpa; ?> <br />
<br />
<b>First Choice:</b> <?php echo getTeam($teama); ?> <br />
<b>&nbspInterview:</b> <?php echo fixInterview($interview1d,$interview1t) ?> <br />
<b>Second Choice:</b> <?php echo getTeam($teamb); ?> <br />
<b>&nbspInterview:</b> <?php echo fixInterview($interview2d,$interview2t) ?> <br />
<b>Third Choice:</b> <?php echo getTeam($teamc); ?> <br />
<br />
<?php if ($dancer) { echo "<b>Years Danced: </b>" . $dancer . "<br />";} ?>
<?php if ($staff1) { echo "<b>Recent Staffed: </b>" . getTeam($staff1) . "<br />";} ?>
<?php if ($staff2) { echo "<b>Previous Staffed: </b>" . getTeam($staff2) . "<br />";} ?>
<?php if ($captain1) { echo "<b>Recent Captain: </b>" . getTeam($captain1) . "<br />";} ?>
<?php if ($captain2) { echo "<b>Previous Captain: </b>" . getTeam($captain2) . "<br />";} ?>
<?php if ($overall1) { echo "<b>Recent Overall: </b>" . getTeam($overall1) . "<br />";} ?>
<?php if ($overall2) { echo "<b>Previous Overall: </b>" . getTeam($overall2) . "<br />";} ?>
<br />
<b>UFL Email: </b><a href="mailto:<?php echo $uflemail; ?>"><?php echo $uflemail; ?></a><br />
<b>Email: </b><a href="mailto:<?php echo $regemail; ?>"><?php echo $regemail; ?></a><br />
<b>Phone: </b><?php echo $phone; ?><br />
</p>
</td>
</tr>
<tr>
<td class="overall_bio" colspan="3" style="width:960px">
<p><i>What improvements do you think could be made to the event, as well as improvements specific to the position(s) you're applying for?</i><br /><br />
&nbsp;&nbsp;&nbsp;<?php echo $improvements; ?><br /><br />
<p><i>What are your other interests and activities? Please list all other organizations you are active in and your involvement with each of these organizations.</i><br /><br />
&nbsp;&nbsp;&nbsp;<?php echo $orgs; ?><br /><br />

<h2><?php echo getTeam($teama);?></h2>
<p><i><?php echo getUnformattedQuestion($teama, 1);?></i><br /><br />
<?php echo $question1; ?></p><br />
<p><i><?php echo getUnformattedQuestion($teama, 2, $question1);?></i><br /><br />
<?php echo $question2; if (getUnformattedQuestion($teama, 3)) {?></p><br />
<p><i><?php echo getUnformattedQuestion($teama, 3, $question1);?></i><br /><br />
<?php echo $question3; } if ($teamb) {?></p><br />
<h2><?php echo getTeam($teamb);?></h2>
<p><i><?php echo getUnformattedQuestion($teamb, 1);?></i><br /><br />
<?php echo $question4; ?></p><br />
<p><i><?php echo getUnformattedQuestion($teamb, 2, $question4);?></i><br /><br />
<?php echo $question5; } if ($teamc) {?></p><br />
<h2><?php echo getTeam($teamc);?></h2>
<p><i><?php echo getUnformattedQuestion($teamc, 1);?></i><br /><br />
<?php echo $question6; }?></p><br />

</td>
</p>

</tr>
</tbody>
</table>
</div>



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



</body>
</html> <?php } ?>
<?php 
}
else
{
	header("Location:index.php");
} ?>