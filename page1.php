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

if ($ufid)
{
	$_SESSION['ufid'] = $ufid;
	$table = "Applicants";
	$sql0 = "SELECT * FROM $table WHERE ufid = '$ufid'";
	$sql0 = mysql_query($sql0);

	$first = mysql_real_unescape_string(mysql_result($sql0, 0, "first"), 2);
	$last = mysql_real_unescape_string(mysql_result($sql0, 0, "last"), 2);
	$year = mysql_real_unescape_string(mysql_result($sql0, 0, "year"), 2);
	$grad = mysql_real_unescape_string(mysql_result($sql0, 0, "grad"), 2);
	$major = mysql_real_unescape_string(mysql_result($sql0, 0, "major"), 2);
	$gpa = mysql_real_unescape_string(mysql_result($sql0, 0, "gpa"), 2);
	$polo = mysql_real_unescape_string(mysql_result($sql0, 0, "polo"), 2);
	$shirt = mysql_real_unescape_string(mysql_result($sql0, 0, "shirt"), 2);	
	$teama = mysql_real_unescape_string(mysql_result($sql0, 0, "teama"), 2);
	$teamb = mysql_real_unescape_string(mysql_result($sql0, 0, "teamb"), 2);
	$teamc = mysql_real_unescape_string(mysql_result($sql0, 0, "teamc"), 2);
	if (!$teama)
	{
		$teama = 0;
	}
	if (!$teamb)
	{
		$teamb = 0;
	}
	if (!$teamc)
	{
		$teamc = 0;
	}
	$phone = mysql_real_unescape_string(mysql_result($sql0, 0, "phone"), 2);	
	$regemail = mysql_real_unescape_string(mysql_result($sql0, 0, "regemail"), 2);
	$lstreet = mysql_real_unescape_string(mysql_result($sql0, 0, "lstreet"), 2);
	$lcity = mysql_real_unescape_string(mysql_result($sql0, 0, "lcity"), 2);
	$lstate = mysql_real_unescape_string(mysql_result($sql0, 0, "lstate"), 2);
	$lzip = mysql_real_unescape_string(mysql_result($sql0, 0, "lzip"), 2);
	$pstreet = mysql_real_unescape_string(mysql_result($sql0, 0, "pstreet"), 2);
	$pcity = mysql_real_unescape_string(mysql_result($sql0, 0, "pcity"), 2);
	$pstate = mysql_real_unescape_string(mysql_result($sql0, 0, "pstate"), 2);
	$pzip = mysql_real_unescape_string(mysql_result($sql0, 0, "pzip"), 2);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="livevalidation_standalone.compressed.js" type="text/javascript"></script>
<style>

	label.valid {
		background: url('http://dev.jquery.com/view/trunk/plugins/validate/demo/images/checked.gif') no-repeat;
		display: block;
		width: 16px;
		height: 16px;
	}
</style>



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
<div class="first_page">
<h1>General Information</h1>

<form class="signupform" id="signupform" method="post" action="processPage1.php">

<table class="outside_table">

	<tr><td>
		<table class="internal_table">
			<tr><td>First Name</td><td><input id="first" name="first" type="text" value="<?php echo $first; ?>"/></td></tr>
			<tr><td>Last Name</td><td><input id="last" name="last" type="text" value="<?php echo $last; ?>"/></td></tr>
			<tr><td>Year: </td><td><select name="year">
				<option value="1" <?php if ($year == 1) {echo 'selected';}?>>Freshman</option>
				<option value="2" <?php if ($year == 2) {echo 'selected';}?>>Sophomore</option>
				<option value="3" <?php if ($year == 3) {echo 'selected';}?>>Junior</option>
				<option value="4" <?php if ($year == 4) {echo 'selected';}?>>Senior</option>
				<option value="5" <?php if ($year == 5) {echo 'selected';}?>>Super Senior</option>
				<option value="6" <?php if ($year == 6) {echo 'selected';}?>>Grad Student</option>
				</select></td></tr>
			<tr><td>Expected Graduation: </td><td><input id="grad" type="text" name="grad" value="<?php echo $grad; ?>"></td></tr>
			<tr><td>Major: </td><td><input id="major" type="text" name="major" value="<?php echo $major; ?>"></td></tr>
			<tr><td>GPA:  </td><td><input id="gpa" name="gpa" value="<?php echo $gpa; ?>"/><img width=16px id="checkGPA" src="check.png" style="display:none"></td></tr>
		</table>
	</td>

		<td>
		<table class="internal_table">
			<tr><td>Polo Size: </td><td><select name="polo">
				<option value="S" <?php if ($polo == 'S') {echo 'selected';}?>>Small</option>
				<option value="M" <?php if ($polo == 'M') {echo 'selected';}?>>Medium</option>
				<option value="L" <?php if ($polo == 'L') {echo 'selected';}?>>Large</option>
				<option value="XL" <?php if ($polo == 'XL') {echo 'selected';}?>>X-Large</option>
				<option value="XXL <?php if ($polo == 'XXL') {echo 'selected';}?>">XX-Large</option>
				</select></td></tr>
			<tr><td>T-Shirt Size: </td><td><select name="shirt">
				<option value="S" <?php if ($shirt == 'S') {echo 'selected';}?>>Small</option>
				<option value="M" <?php if ($shirt == 'M') {echo 'selected';}?>>Medium</option>
				<option value="L" <?php if ($shirt == 'L') {echo 'selected';}?>>Large</option>
				<option value="XL" <?php if ($shirt == 'XL') {echo 'selected';}?>>X-Large</option>
				<option value="XXL <?php if ($shirt == 'XXL') {echo 'selected';}?>">XX-Large</option>
				</select></td></tr>
			<?php if ($teama) { ?>
			<tr style="margin:10px 0;"><td colspan="2"><p style="color:#ff0000">If you change any of your teams your interview time for that team will be reset.</p></td></tr>
			<tr style="margin:0;"><td colspan="2"><p style="color:#ff0000">If you remove a team from your list any team-specific answers will be lost for that team.</p></td></tr>
			<?php } ?>
			
			<tr style="margin:0;"><td colspan="2"><p style="color:#f16c27">For more information on individual teams <a href="http://floridadm.org/teams" target="_blank">click here</a>.</p></td></tr>
			
			<tr><td>First Choice: </td><td><select name="teama" id="teama">
				<option value = 0>Select a Team</option>
				<option value = 1>Art/Layout</option>
				<option value = 2>Community Events</option>
				<option value = 3>Dancer Relations</option>
				<option value = 4>Entertainment</option>
				<option value = 5>Family Relations</option>
				<option value = 6>Finance</option>
				<option value = 7>Hospitality</option>
				<option value = 8>Marketing</option>
				<option value = 9>Morale</option>
				<option value = 10>Operations</option>
				<option value = 11>Public Relations</option>
				<option value = 12>Recruitment</option>
				<option value = 13>Technology</option>
				</select>	</td></tr>
				
			<tr id="second" hidden="true"><td>Second Choice: </td><td><select name="teamb" id="teamb"><option value = 0>None
				</select></td></tr>
				
			<tr id="third" hidden="true"><td>Third Choice: </td><td><select name="teamc" id="teamc"><option value = 0>None
				</select>		
			</td></tr>
			<tr><td>Phone Number: </td><td><input type="text" name="phone" id="phone" value="<?php echo $phone; ?>"></td></tr>
			<tr><td>Personal Email: </td><td><input type="text" name="regemail" id="regemail" value="<?php echo $regemail; ?>"></td></tr></td></tr>
			
		</table>
</td></tr>

<tr><td>
	<table class="internal_table">
	
		<tr><td>Local Address:</td></tr>
		<tr><td>Street: </td><td><input type="text" id="lstreet" name="lstreet"  value="<?php echo $lstreet; ?>"></td></tr>
		<tr><td>City:  </td><td><input type="text" id="lcity"  value="<?php if ($lcity){echo $lcity;} else{echo "Gainesville";} ?>" name="lcity"></td></tr>
		<tr><td>Zip: </td><td><input type="text" id="lzip" name="lzip" value="<?php if ($lzip){echo $lzip;} ?>"></td></tr>
				<tr><td>State: </td><td><input type="text" id="lstate" name="lstate" value="<?php if ($lstate){echo $lstate;} else{echo "FL";} ?>">
				</select></td></tr>
			
	</table>		
		
<td>		
	<table class="internal_table">
		<tr><td>Permanent Address:</td></tr>
		<tr><td>Street: </td><td><input type="text" id="pstreet" name="pstreet" value="<?php echo $pstreet; ?>"></td></tr>
		<tr><td>City:  </td><td><input type="text" id="pcity" name="pcity" value="<?php echo $pcity; ?>"></td></tr>
		<tr><td>Zip: </td><td><input type="text" id="pzip" name="pzip" value="<?php if ($pzip) {echo $pzip;} ?>"></td></tr>
		<tr><td>State: </td><td><input type="text" id="state" name="pstate" value="<?php if ($pstate){echo $pstate;} else{echo "FL";} ?>">
				</select></td></tr>
	<tr><td></td><td></td><td><input id="signupsubmit" name="signup" type="submit" value="Save and Continue" onsubmit="processPage1.php" /></td></tr>
	
	</table>
</td></tr>

</form>
</table>


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
</div>
<script language="javascript">


	var teams = new Array(
		"None", 
		"Art/Layout",
		"Community Events", 
		"Dancer Relations",  
		"Entertainment",
		"Family Relations",
		"Finance",
		"Hospitality",
		"Marketing",
		"Morale",
		"Operations",
		"Public Relations",
		"Recruitment",
		"Technology");
	
$(document).ready(function(){
	jQuery(function($){
	   $("#gpa").mask("9.99");
	   $("#phone").mask("(999) 999-9999");
	   $("#tin").mask("99-9999999");
	   $("#ssn").mask("999-99-9999");
  	   $("#lstate").mask("aa");
   	   $("#pstate").mask("aa");
	});


if (<?php echo $teama; ?>)
{
	var $teama = $("#teama");
	$teama.empty();
	
	$.each(teams, function(index,value){ 
		
		if (index == "<?php echo $teama ?>")
			{
				$teama.append("<option value = " + index + " selected>" + value + "</option>");
			}
		else if (index > 0)
		{
			$teama.append("<option value = " + index + ">" + value + "</option>");
		}
		else if (0 == "<?php echo $teama ?>")
		{
			$teama.append("<option value = " + index + " selected>Select a Team</option>");
		}
		
	});
	
	if ($teama.value != 0)
	{
		var selectedA = document.getElementById("teama").value;
		var selectedB = "<?php echo $teamb; ?>";
	
		$('#second').fadeIn(0);
		
		var $teamb = $("#teamb");
		
		$teamb.empty();
	
		$.each(teams, function(index, value) {
			if (index != selectedA)
			{
				if (index == selectedB)
				{
					$teamb.append("<option value = " + index + " selected>" + value + "</option>");
				}
				else
				{
					$teamb.append("<option value = " + index + ">" + value + "</option>");
				}
			}
		});
		
		
		if ($teama.value != 0)
		{
			var selectedA = document.getElementById("teama").value;
			var selectedB = "<?php echo $teamb; ?>";
		
			$('#second').fadeIn(0);
			
			var $teamb = $("#teamb");
			
			$teamb.empty();
		
			$.each(teams, function(index, value) {
				if (index != selectedA)
				{
					if (index == selectedB)
					{
						$teamb.append("<option value = " + index + " selected>" + value + "</option>");
					}
					else
					{
						$teamb.append("<option value = " + index + ">" + value + "</option>");
					}
				}
			});
			
			if (selectedB != 0)
			{
				var selectedC = "<?php echo $teamc; ?>";
				
				$('#third').fadeIn(0);
				
				var $teamc = $("#teamc");
				
				$teamc.empty();
			
				$.each(teams, function(index, value) {
					if (index != selectedA && index != selectedB)
						if (index == selectedC)
							$teamc.append("<option value = " + index + " selected>" + value + "</option>");
						else
							$teamc.append("<option value = " + index + " >" + value + "</option>");
				});
			
			}
		}	
		
	}

}
$('#teama').change(function() 
{
	var selectedA = document.getElementById("teama").value;
	var selectedB = document.getElementById("teamb").value;	
	var selectedC = document.getElementById("teamc").value;


	$('#second').fadeIn(1000);
	
	var $teamb = $("#teamb");
	
	$teamb.empty();

	$.each(teams, function(index, value) {
		if (index != selectedA)
		{
			if (index == selectedB)
			{
				$teamb.append("<option value = " + index + " selected>" + value + "</option>");
			}
			else
			{
				$teamb.append("<option value = " + index + ">" + value + "</option>");
			}
		}
	});
	
	var $teamc = $("#teamc");

	if ($teamc.is(":visible"))
	{
		$teamc.empty();
		$.each(teams, function(index, value)
		{
			if (index != selectedA && index != selectedB)
				if (index == selectedC)
					$teamc.append("<option value = " + index + " selected>" + value + "</option>");
				else
					$teamc.append("<option value = " + index + ">" + value + "</option>");
		});

	}	
});

$('#teamb').change(function()
{

	var selectedA = document.getElementById("teama").value;
	var selectedB = document.getElementById("teamb").value;	
	var selectedC = document.getElementById("teamc").value;
	
	if (selectedB != 0)
	{
		$('#third').fadeIn(1000);
		
		var $teamc = $("#teamc");
		
		$teamc.empty();
	
		$.each(teams, function(index, value) {
			if (index != selectedA && index != selectedB)
				if (index == selectedC)
					$teamc.append("<option value = " + index + " selected>" + value + "</option>");
				else
					$teamc.append("<option value = " + index + " >" + value + "</option>");
		});
	}
	else
	{
		$('#third').fadeOut(1000);
		
		var $teamc = $("#teamc");
		
		$teamc.val(0);
		
		
	}

});


});

var first = new LiveValidation('first', {onlyOnSubmit: true, validMessage:" " } );
first.add( Validate.Presence, {failureMessage:" " } );

var last = new LiveValidation('last', {onlyOnSubmit: true, validMessage:" " } );
last.add( Validate.Presence, {failureMessage:" " } );

var grad = new LiveValidation('grad', {onlyOnSubmit: true, validMessage:" " } );
grad.add( Validate.Presence, {failureMessage:" " } );

var major = new LiveValidation('major', {onlyOnSubmit: true, validMessage:" " } );
major.add( Validate.Presence, {failureMessage:" " } );

var gpa = new LiveValidation('gpa', {onlyOnSubmit: true, validMessage:" " } );
gpa.add( Validate.Numericality, {minimum:0, maximum: 4, failureMessage:" " } );
gpa.add( Validate.Presence, {failureMessage:" " } );

var teama = new LiveValidation('teama', {onlyOnSubmit: true, validMessage:" "} );
teama.add( Validate.Numericality, {minimum:1, failureMessage:" " } );

var phone = new LiveValidation('phone', {onlyOnSubmit: true, validMessage:" " } );
phone.add( Validate.Presence, {failureMessage:" " } );

var regemail = new LiveValidation('regemail', {onlyOnSubmit: true, validMessage:" " } );
regemail.add( Validate.Email, {failureMessage:" " } );
regemail.add( Validate.Presence, {failureMessage:" " } );

var lstreet = new LiveValidation('lstreet', {onlyOnSubmit: true, validMessage:" "});
lstreet.add( Validate.Presence, {failureMessage:" " } );

var lcity = new LiveValidation('lcity', {onlyOnSubmit: true, validMessage:" "});
lcity.add( Validate.Presence, {failureMessage:" " } );

var lzip = new LiveValidation('lzip', {onlyOnSubmit: true, validMessage:" "});
lzip.add( Validate.Numericality, {minimum:0, maximum: 99999, failureMessage:" " } );
lzip.add( Validate.Presence, {failureMessage:" " } );

var pstreet = new LiveValidation('pstreet', {onlyOnSubmit: true, validMessage:" "});
pstreet.add( Validate.Presence, {failureMessage:" " } );

var pcity = new LiveValidation('pcity', {onlyOnSubmit: true, validMessage:" "});
pcity.add( Validate.Presence, {failureMessage:" " } );

var pzip = new LiveValidation('pzip', {onlyOnSubmit: true, validMessage:" "});
pzip.add( Validate.Numericality, {minimum:0, maximum: 99999, failureMessage:" " } );
pzip.add( Validate.Presence, {failureMessage:" " } );
</script>

</body>
</html> <?php } ?>