<?php
include_once("pageheader.php");
include_once("requirelogin.php");
?>
<?php

if ($ufid)
{
	$sql0 = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
	$sql0 = mysql_query($sql0);
	
	if (mysql_num_rows($sql0))
	{
		$dancer = mysql_real_unescape_string(mysql_result($sql0, 0, "dancer"), 2);
		$staff1 = mysql_real_unescape_string(mysql_result($sql0, 0, "staff1"), 2);
		$staff2 = mysql_real_unescape_string(mysql_result($sql0, 0, "staff2"), 2);	
		$captain1 = mysql_real_unescape_string(mysql_result($sql0, 0, "captain1"), 2);
		$captain2 = mysql_real_unescape_string(mysql_result($sql0, 0, "captain2"), 2);	
		$overall1 = mysql_real_unescape_string(mysql_result($sql0, 0, "overall1"), 2);	
		$overall2 = mysql_real_unescape_string(mysql_result($sql0, 0, "overall2"), 2);	
		$improvements = mysql_real_unescape_string(mysql_result($sql0, 0, "improvements"), 2);
		$orgs = mysql_real_unescape_string(mysql_result($sql0, 0, "orgs"), 2);
	}
	else
	{
		$dancer = 0;
		$staff1 = 0;
		$staff2 = 0;
		$captain1 = 0;
		$captain2 = 0;
		$overall1 = 0;
		$overall2 = 0;
		$improvements = 0; 
		$orgs = 0;
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="jquery.maskedinput-1.3.js" type="text/javascript"></script>
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


<h1>General Questions</h1>

<table class="outside_table">

<form action="processPage2.php" method=post>
<tr>
<td>
	<table class="internal_table">
		What is your past involvement in Dance Marathon at UF?<br />
		
		<tr><td>Dancer: </td><td><input type="checkbox" id="dancer" value="dancer"  /></td></tr>
		<tr id="dancerRow" hidden><td colspan="2"></td><td>What year(s) did you dance?</td><td><input type="text" id="dancer" name="dancer" value="<?php echo $dancer; ?>"/></td></tr>
		
		<tr><td>Staff: </td><td><input type="checkbox" id="staff"  /></td></tr>
		<tr id="staff1Row" hidden><td colspan="2"></td><td>What team were you on most recently?</td><td><select id="staff1" name="staff1">				<option value = 0>Select a Team</option>
				<option value = 3>Dancer Relations</option>
				<option value = 7>Hospitality</option>
				<option value = 9>Morale</option>
				<option value = 10>Operations</option></select></td></tr>
		<tr id="staff2Row" hidden><td colspan="2"></td><td>Before that?</td><td><select id="staff2" name="staff2"><option value = 0>None</select></td></tr>
		
		
		<tr><td>Captain: </td><td><input type="checkbox" id="captain" value="captain"  /></td></tr>
		<tr id="captain1Row" hidden><td colspan="2"></td><td>What team were you on most recently?</td><td><select id="captain1" name="captain1"><option value = 0>Select a Team</option>
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
				<option value = 13>Technology</option></select></td></tr>
		<tr id="captain2Row" hidden><td colspan="2"></td><td>Before that?</td><td><select id="captain2" name="captain2"><option value = 0>None</select></td></tr>
		
		
		
		<tr><td>Overall: </td><td><input type="checkbox" id="overall" value="overall"  /></td></tr>
		<tr id="overall1Row" hidden><td colspan="2"></td><td>What team were you on most recently?</td><td><select id="overall1" name="overall1">
				<option value = 0>Select a Team</option>
				<option value = 14>Overall</option>
				<option value = 15>Internal</option>				
				<option value = 16>External</option>								
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
			
		</select></td></tr>
		<tr id="overall2Row" hidden><td colspan="2"></td><td>Before that?</td><td><select id="overall2" name="overall2">
							<option value = 0>Select a Team</option>
				<option value = 14>Overall</option>
				<option value = 15>Internal</option>				
				<option value = 16>External</option>								
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
			
		</select></td></tr>
		<tr id="overall3Row" hidden><td colspan="2"></td><td>Before that?</td><td><select id="overall3" name="overall3"><option value = 0>None<option value = 1>I am Kenny Brighton</select></td></tr>
	</table>
</td>



<td>What improvements do you think could be made to the event, as well as improvements specific to the position(s) you're applying for? <textarea spellcheck="true" rows="4" cols="50"  name="improvements"><?php echo $improvements; ?></textarea></td></tr>



<td>What are your other interests and activities? Please list all other organizations you are active in and your involvement with each of these organizations. <textarea spellcheck="true" rows="4" cols="50"  name="orgs"><?php echo $orgs; ?></textarea></td>

<td><input type="submit" value="Save and Continue" /></td></tr>

</tr>

</form>

</table>

<script type="text/javascript">
 $(document).ready(function(){


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
		
	var staffTeams  = {
		0: "None", 
		3: "Dancer Relations",  
		7: "Hospitality",
		9: "Morale",
		10:"Operations"};


	if ('<?php echo $dancer;?>')
	{
		$('input[id="dancer"]').attr('checked', true);	
		$('#dancerRow').fadeIn(0);		
	}
	
	if (<?php echo $staff1;?>)
	{
		$('input[id="staff"]').attr('checked', true);
		$('#staff1Row').fadeIn(0);		
		$('#staff1').val(<?php echo $staff1; ?>);
		$('#staff2Row').fadeIn(0);
	}


	
	if (<?php echo $staff2;?>)
	{
		var selected1 = document.getElementById("staff1").value;
		var selected2 = document.getElementById("staff2").value;	
	
		var $staff2 = $("#staff2");
		
		$staff2.empty();
	
		$.each(staffTeams, function(index, value) {
			if (index != selected1)
			{
				if (index == selected2)
				{
					
					$staff2.append("<option value = " + index + " selected>" + value + "</option>");
				}
				else
				{
					$staff2.append("<option value = " + index + ">" + value + "</option>");
				}
			}
		});
		
		$staff2.val(<?php echo $staff2; ?>);
	}
	
	if (<?php echo $captain1;?>)
	{
		$('input[id="captain"]').attr('checked', true);
		$('#captain1Row').fadeIn(0);		
		$('#captain1').val(<?php echo $captain1; ?>);
	}	
	
	if (<?php echo $captain2;?>)
	{
		var selected1 = document.getElementById("captain1").value;
		var selected2 = document.getElementById("captain2").value;	
	
		$('#captain2Row').fadeIn(0);
		
		var $captain2 = $("#captain2");
		
		$captain2.empty();
	
		$.each(teams, function(index, value) {
			if (index != selected1)
			{
				if (index == selected2)
				{
					
					$captain2.append("<option value = " + index + " selected>" + value + "</option>");
				}
				else
				{
					$captain2.append("<option value = " + index + ">" + value + "</option>");
				}
			}
		});
		
		$captain2.val(<?php echo $captain2; ?>);
	}
	
	if (<?php echo $overall1;?>)
	{
		$('input[id="overall"]').attr('checked', true);
		$('#overall1Row').fadeIn(0);		
		$('#overall1').val(<?php echo $overall1; ?>);
		$('#overall2Row').fadeIn(0);
	}
	if (<?php echo $overall2;?>)
	{
		$('#overall2').val(<?php echo $overall2; ?>);
		$('#overall3Row').fadeIn(0);
	}

$('input[id="dancer"]').change(function()
{

	if ($('input[id="dancer"]').attr('checked'))
	{
		$('#dancerRow').fadeIn(1000);
	}
	else
	{
		$('#dancerRow').fadeOut(1000);
//		$('#dancer').clear();
	
	}


});
	
$('input[id="staff"]').change(function()
{


	if ($('input[id="staff"]').attr('checked'))
	{
		$('#staff1Row').fadeIn(1000);
	}
	else
	{
		$('#staff2Row').fadeOut(500);
		$('#staff1Row').delay(500).fadeOut(500);
		setTimeout( function () {
			$('#staff1').val(0);
			$('#staff2').val(0);
		}, 1000);
	
	}


});

$('input[id="captain"]').change(function()
{


	if ($('input[id="captain"]').attr('checked'))
	{
		$('#captain1Row').fadeIn(1000);
	}
	else
	{
		$('#captain2Row').fadeOut(500);
		if ($('#captain2Row').is(":hidden"))
		{
			$('#captain1Row').fadeOut(500);
		}
		else
		{
			$('#captain1Row').delay(500).fadeOut(500);
		}
		setTimeout( function () {
			$('#captain1').val(0);
			$('#captain2').val(0);
		}, 1000);
	
	
	}


});

$('input[id="overall"]').change(function()
{


	if ($('input[id="overall"]').attr('checked'))
	{
		$('#overall1Row').fadeIn(1000);
	}
	else
	{
		$('#overall3Row').fadeOut(500);
		
		if ($('#overall3Row').is(":hidden"))
		{
			$('#overall2Row').fadeOut(500);
		}		
		else
		{
			$('#overall2Row').delay(500).fadeOut(500);
		}
		
		if ($('#overall2Row').is(":hidden"))
		{
			$('#overall1Row').fadeOut(500);
		}		
		else
		{
			$('#overall1Row').delay(1000).fadeOut(500);
		}
		
		setTimeout( function () {
			$('#overall1').val(0);
			$('#overall2').val(0);
			$('#overall3').val(0);
		}, 1500);
	
	}


});


$('#staff1').change(function() 
{
	var selected1 = document.getElementById("staff1").value;
	var selected2 = document.getElementById("staff2").value;	

	$('#staff2Row').fadeIn(1000);
	
	var $staff2 = $("#staff2");
	
	$staff2.empty();

	$.each(staffTeams, function(index, value) {
		if (index != selected1)
		{
			if (index == selected2)
			{
				
				$staff2.append("<option value = " + index + " selected>" + value + "</option>");
			}
			else
			{
				$staff2.append("<option value = " + index + ">" + value + "</option>");
			}
		}
	});
	
});



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

$('#captain1').change(function() 
{
	var selected1 = document.getElementById("captain1").value;
	var selected2 = document.getElementById("captain2").value;	

	$('#captain2Row').fadeIn(1000);
	
	var $captain2 = $("#captain2");
	
	$captain2.empty();

	$.each(teams, function(index, value) {
		if (index != selected1)
		{
			if (index == selected2)
			{
				$captain2.append("<option value = " + index + " selected>" + value + "</option>");
			}
			else
			{
				$captain2.append("<option value = " + index + ">" + value + "</option>");
			}
		}
	});
	
});

$('#overall1').change(function(){
	
	$('#overall2Row').fadeIn(1000);
		
});

$('#overall2').change(function(){
	
	
	$('#overall3Row').fadeIn(1000);
		
});

$('#overall3').change(function(){
	
	
	var selected = document.getElementById('overall3').value;
	if (selected == 1)
	{
		<?php if ($ufid == "7951-9576"){echo "alert('Hey Kenny!');";} else {echo "alert('No you\'re not');\n $('#overall3').val(0);";} ?>
	}
		
});

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