<?php
include_once("../pageheader.php");
include_once("../teamMatch.php"); 

if (isset($_GET['team']))
{
	$team = mysql_escape_string($_GET['team']);
}
else
{
	$team = 0;
}


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

<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
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
if (isset($_GET['team']))
	$team=mysql_escape_string($_GET['team']);
else
	$team=0;
?>
<h1 style="text-align:left; margin-left:20px;"><?php echo getTeam($team); ?> </h1>    
    
<?php

if ($team)
{
	$sql0 = "SELECT * From Interviews where team = $team"; // WHERE teama = $team or teamb = $team or teamc = $team";
	$sql0 = mysql_query($sql0);


	while ($interviews = mysql_fetch_array($sql0, MYSQL_NUM))
	{
	
		echo "<tr>";
		foreach ($interviews as $interview)
		{
			if ($interview == $interviews[0])
			{
				echo "<td>" . fixDate($interview) . "</td>";
				$interviews[0]="zero";
			}
			else if ($interview != $interviews[1])
			{
				$interviews[1]="one";
				if ($interview != '1')
					echo "<td> <a href='applicant.php?team=$team&ufid=$interview'>" . getName($interview) . "</a></td>";
				else
					echo "<td>Closed</td>";
			}
		}
		echo "</tr>";
	}
}
else
{
	for ($i=0; $i <14; $i++)
	{
		
	$sql0 = "SELECT * From Interviews where team = $i"; // WHERE teama = $team or teamb = $team or teamc = $team";
	$sql0 = mysql_query($sql0);


	while ($interviews = mysql_fetch_array($sql0, MYSQL_NUM))
	{
		echo "<tr>";
		foreach ($interviews as $interview)
		{
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
				if ($interview != 1)
					echo "<td> <a href='applicant.php?team=$team&ufid=$interview'>" . getName($interview) . "</a></td>";
				else
					echo "<td>Closed</td>";
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
	 	        echo '$("#myTable").tablesorter({       sortList: [[1,0],[0,0]]       });'; ?>
    } 
); 
    
</script>



</div>
</div>
</div> 
<?php 	}
	else
	{
		$_SESSION['redirect']='interview.php?team='.$team;
		header("Location:index.php");
	}
}
else
{
	$_SESSION['redirect']='interview.php?team='.$team;
	header("Location:index.php");
} ?>