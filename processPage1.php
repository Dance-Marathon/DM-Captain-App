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

//get user info from form

if ($ufid)
{

	$first = mysql_real_escape_string($_POST["first"]);
	$last = mysql_real_escape_string($_POST["last"]);
	$year = mysql_real_escape_string($_POST["year"]);
	$grad = mysql_real_escape_string($_POST["grad"]);
	$major = mysql_real_escape_string($_POST["major"]);
	$gpa = mysql_real_escape_string($_POST["gpa"]);
	$polo = mysql_real_escape_string($_POST["polo"]);
	$shirt = mysql_real_escape_string($_POST["shirt"]);	
	$teama = mysql_real_escape_string($_POST["teama"]);
	$teamb = mysql_real_escape_string($_POST["teamb"]);
	$teamc = mysql_real_escape_string($_POST["teamc"]);
	$phone = mysql_real_escape_string($_POST["phone"]);	
	$regemail = mysql_real_escape_string($_POST["regemail"]);
	$lstreet = mysql_real_escape_string($_POST["lstreet"]);
	$lcity = mysql_real_escape_string($_POST["lcity"]);
	$lstate = mysql_real_escape_string($_POST["lstate"]);
	$lzip = mysql_real_escape_string($_POST["lzip"]);
	$pstreet = mysql_real_escape_string($_POST["pstreet"]);
	$pcity = mysql_real_escape_string($_POST["pcity"]);
	$pstate = mysql_real_escape_string($_POST["pstate"]);
	$pzip = mysql_real_escape_string($_POST["pzip"]);

//	setcookie('ufid', $ufid, 0, '/', '.mattgerstman.com');
  	$_SESSION['ufid'] = $ufid;
//check to make sure user doesnt already exist
	$sql0 = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
	$sql0 = mysql_query($sql0);

	$oldTeams = "Select * FROM Applicants WHERE ufid = '$ufid'";
	$oldTeams = mysql_query($oldTeams);
	if (mysql_num_rows($oldTeams))
	{
		$oldTeama = mysql_result($oldTeams, 0, 'teama');
		$oldTeamb = mysql_result($oldTeams, 0, 'teamb');
		$oldTeamc = mysql_result($oldTeams, 0, 'teamc');
				
		if ($teama != $oldTeama)
		{
			
			$changet = mysql_result($oldTeams, 0, "interview1t");
			$changed = mysql_result($oldTeams, 0, "interview1d");			
			if ($changet)
			{
				$fixChart = "UPDATE Interviews SET `$changet` = '' WHERE Date = '$changed' AND Team = $oldTeama";
				$fixChart = mysql_query($fixChart);	
			}		
			
			$fixInterview1 = "Update Applicants SET interview1d = '', interview1t = '' WHERE ufid = '$ufid' ";
			mysql_query($fixInterview1);
			
			
		}
		if ($teamb != $oldTeamb)
		{
			$changet = mysql_result($oldTeams, 0, "interview2t");
			$changed = mysql_result($oldTeams, 0, "interview2d");			
			if ($changet)
			{
				$fixChart = "UPDATE Interviews SET `$changet` = '' WHERE Date = '$changed' AND Team = $oldTeamb";
				$fixChart = mysql_query($fixChart);	
			}				
			$fixInterview2 = "Update Applicants SET interview2d = '', interview2t = '' WHERE ufid = '$ufid' ";
			mysql_query($fixInterview2);
		}
		
		$answers = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
		$answer1 = mysql_result(mysql_query($answers), 0, "question1");
		$answer2 = mysql_result(mysql_query($answers), 0, "question2");
		$answer3 = mysql_result(mysql_query($answers), 0, "question3");
		$answer4 = mysql_result(mysql_query($answers), 0, "question4");
		$answer5 = mysql_result(mysql_query($answers), 0, "question5");
		$answer6 = mysql_result(mysql_query($answers), 0, "question6");
		
		
		$wipe = "UPDATE Applicants SET question1= '', question2='', question3='', question4='', question5='', question6='' WHERE ufid = '$ufid' ";
		mysql_query($wipe);
			
		if ($teama == $oldTeama)
		{
			$fixQuestions = "UPDATE Applicants SET question1='$answer1', question2 ='$answer2', question3='$answer3' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}
			
		if ($teama == $oldTeamb)
		{
			$fixQuestions = "UPDATE Applicants SET question1='$answer4', question2 ='$answer5' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}

		if ($teama == $oldTeamc)
		{
			$fixQuestions = "UPDATE Applicants SET question1='$answer6' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}
		
		
		if ($teamb == $oldTeama)
		{
			$fixQuestions = "UPDATE Applicants SET question4='$answer1', question5 ='$answer2' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}

		if ($teamb == $oldTeamb)
		{
			$fixQuestions = "UPDATE Applicants SET question4='$answer4', question5 ='$answer5' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}
			

		if ($teamb == $oldTeamc)
		{
			$fixQuestions = "UPDATE Applicants SET question4='$answer6' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}
		
		if ($teamc == $oldTeama)
		{
			$fixQuestions = "UPDATE Applicants SET question6='$answer1' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}

		if ($teamc == $oldTeamb)
		{
			$fixQuestions = "UPDATE Applicants SET question6='$answer4' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}
		
		if ($teamc == $oldTeamc)
		{
			$fixQuestions = "UPDATE Applicants SET question6='$answer6' WHERE ufid = '$ufid'";
			mysql_query($fixQuestions);
		}
		
	}

//add user
    $sql1 = "UPDATE Applicants SET first = '$first', last='$last', year=$year, grad='$grad', major = '$major', gpa=$gpa, shirt='$shirt', polo='$polo', teama=$teama, teamb=$teamb, teamc=$teamc, phone='$phone', regemail='$regemail', lstreet='$lstreet', lcity = '$lcity', lstate='$lstate', lzip=$lzip, pstreet='$pstreet', pcity = '$pcity', pstate='$pstate', pzip=$pzip WHERE ufid = '$ufid'";
	mysql_query($sql1);
	if ($error=mysql_error())
	{
			$subject = 'Application Error';
		
		//indentation here is important. if you include an indentation in the message it will show up in the email itself. Also HTML doesn't translate in the email.
			$message = $error .'\n\n command was: '. $sql1;
				
			$headers = 'From: applications@floridadm.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
		
			mail('gerstmanm@floridadm.org', $subject, $message, $headers);
	}
	$email = $sql1;

    $subject = $ufid;
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
      
    mail('inprogress@floridadm.org', $subject, $email, $headers);  

	

echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "page2.php";self.location.href = redirURL;</script>');
}
else
{
echo('<SCRIPT LANGUAGE="JavaScript">history.back();</script>');
}
	
?>   mail('inprogress@floridadm.org', $subject, $email, $headers);  

	

echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "page2.php";self.location.href = redirURL;</script>');
}
else
{
echo('<SCRIPT LANGUAGE="JavaScript">history.back();</script>');
}
	
?>