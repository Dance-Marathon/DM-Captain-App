<?php
include_once("pageheader.php");
include_once("requirelogin.php");
include_once("teamMatch.php");
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

<h1>Team Questions</h1>

<?

if ($ufid)
{
	$_SESSION['ufid'] = $ufid;
	$sql0 = "SELECT teama FROM Applicants WHERE ufid = '$ufid'";
	$teama = mysql_result(mysql_query($sql0), 0);
	
	$team1 = getTeam($teama);
	
	
	$sql0 = "SELECT teamb FROM Applicants WHERE ufid = '$ufid'";
	$teamb = mysql_result(mysql_query($sql0), 0);
	
	$team2 = getTeam($teamb);
	
	$sql0 = "SELECT teamc FROM Applicants WHERE ufid = '$ufid'";
	$teamc = mysql_result(mysql_query($sql0), 0);
	
	$team3 = getTeam($teamc);
	
	$section1 = "SELECT question FROM Questions where id = $teama";
	$question1 = mysql_result(mysql_query($section1), 0);
	$question2 = mysql_result(mysql_query($section1), 1);
	$question3 = mysql_result(mysql_query($section1), 2);
	
	$answers = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
	$answer1 = mysql_real_unescape_string(mysql_result(mysql_query($answers), 0, "question1"), 2);
	$answer2 = mysql_real_unescape_string(mysql_result(mysql_query($answers), 0, "question2"), 2);
	$answer3 = mysql_real_unescape_string(mysql_result(mysql_query($answers), 0, "question3"), 2);
	$answer4 = "";
	$answer5 = "";
	$answer6 = "";	
	$question1 = str_replace("BANCEDARATHON", $answer1, $question1);
	$question2 = str_replace("BANCEDARATHON", $answer2, $question2);
	$question3 = str_replace("BANCEDARATHON", $answer3, $question3);
	
	if ($teamb)
	{
		$section2 = "SELECT question FROM Questions where id = $teamb";
		$question4 = mysql_result(mysql_query($section2), 0);
		$question4 = str_replace("question1", "question4", $question4);
		 
		$question5 = mysql_result(mysql_query($section2), 1);
		$question5 = str_replace("question2", "question5", $question5);
		
		$answer4 = mysql_real_unescape_string(mysql_result(mysql_query($answers), 0, "question4"), 2);
		$answer5 = mysql_real_unescape_string(mysql_result(mysql_query($answers), 0, "question5"), 2);
		
		$question4 = str_replace("BANCEDARATHON", $answer4, $question4);
		$question5 = str_replace("BANCEDARATHON", $answer5, $question5);
	}
	
	if ($teamc)
	{
		$section3 = "SELECT question FROM Questions where id = $teamc";
		$question6 = mysql_result(mysql_query($section3), 0);
		$question6 = str_replace("question1", "question6", $question6);
		
		$answer6 = mysql_real_unescape_string(mysql_result(mysql_query($answers), 0, "question6"), 2);
		
		$question6 = str_replace("BANCEDARATHON", $answer6, $question6);
	}

?>

<form action="processPage3.php" method=post>

<table class="outside_table">
<tr><td>
	<h2> <?php echo($team1); ?> </h2>
	<table id="team1" class="internal_table">

<?php
	echo $question1;
	echo $question2;
	echo $question3;
?>

	</table>
</td></tr>
<?php if ($teamb) {?>
<tr><td>
	<h2> <?php echo($team2); ?> </h2>
	<table id="team1" class="internal_table">

<?php
	echo $question4;
	echo $question5;
?>
	</table>
</td></tr>
<?php } if ($teamc) {?>
<tr><td>
	<h2> <?php echo($team3); ?> </h2>
	<table id="team1" class="internal_table">

<?php
	echo $question6;
 } ?>
<?php if ($teamc){ ?><tr><td></td> <?php } ?><td><input type="submit" value="Save and Continue" /></td></tr>

	</table>
</td></tr>

</table>

</form>

<script type="text/javascript">
 $(document).ready(function(){


var question3 = '<?php echo substr($answer3,0,1); ?>';
console.log(question3);
$('#'+question3).attr('selected', 'selected');

var question1 = '<?php if ($teama == 13){ echo $answer1; } else if ($teamb == 13) {echo $answer4;} else if ($teamc == 13) {echo $answer6;}?>';
if (question1 != '')
{
	var selected = question1;
	var question2 = <?php if ($teama == 13) {echo "'2'"; } else { echo "'5'"; } ?>;
	var question3 = <?php if ($teama == 13) {echo "'3'"; } else { echo "'none'"; } ?>;	
	if (selected == 'Film')
	{
	$('input[id=tech1]:nth(0)').attr('checked',true);
	$('#film2').fadeIn(0);
	$('#film3').fadeIn(0);	
	$('#filmq2').attr('name', 'question' + question2);
	console.log(question2);
	$('#filmq3').attr('name', 'question' + question3);
	}
	else if (selected == 'AV')
	{
	$('input[id=tech1]:nth(1)').attr('checked',true);
	$('#av2').fadeIn(0);
	$('#av3').fadeIn(0);
	$('#avq2').attr('name', 'question' + question2);
	$('#avq3').attr('name', 'question' + question3);
	}
	else if (selected == 'Programming')
	{
	$('input[id=tech1]:nth(2)').attr('checked',true);
	$('#prog2').fadeIn(0);
	$('#prog3').fadeIn(0);
	$('#progq2').attr('name', 'question' + question2);
	$('#progq3').attr('name', 'question' + question3);
	}
	
}


$('input[id="tech1"]').change(function() 
{
	var selected = $('input[id=tech1]:checked').val();
	$('#film2').fadeOut(0);
	$('#film3').fadeOut(0);
	$('#filmq2').attr('name', 'none');
	$('#filmq3').attr('name', 'none');
	
	
	$('#av2').fadeOut(0);
	$('#av3').fadeOut(0);
	$('#avq2').attr('name', 'none');
	$('#avq3').attr('name', 'none');
	
	$('#prog2').fadeOut(0);
	$('#prog3').fadeOut(0);
	$('#progq2').attr('name', 'none');
	$('#progq3').attr('name', 'none');
	
	if (selected == 'Film')
	{
	$('#film2').fadeIn(1000);
	$('#film3').fadeIn(1000);
	$('#filmq2').attr('name', 'question2');
	<?php if ($teamb==13) {
		echo "$('#filmq2').attr('name', 'question5');";
		} ?>
	$('#filmq3').attr('name', 'question3');
	}
	else if (selected == 'AV')
	{
	$('#av2').fadeIn(1000);
	$('#av3').fadeIn(1000);
	$('#avq2').attr('name', 'question2');
	<?php if ($teamb==13) { 
		echo "$('#avq2').attr('name', 'question5');";} ?>
	$('#avq3').attr('name', 'question3');
	}
	else if (selected == 'Programming')
	{
	$('#prog2').fadeIn(1000);
	$('#prog3').fadeIn(1000);
	$('#progq2').attr('name', 'question2');
	<?php if ($teamb==13) { 
		echo "$('#progq2').attr('name', 'question5');";
		} ?>	
	$('#progq3').attr('name', 'question3');
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