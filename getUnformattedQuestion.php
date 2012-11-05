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
function getUnformattedQuestion($team, $number, $flag=0)

{
		$sql0 = "SELECT * From Questions WHERE id=$team AND number=$number";
		$sql0 = mysql_query($sql0);
	
		while ($row = mysql_fetch_array($sql0))
		{
//	echo '<pre>';
		
//		print_r($row);
//		echo '</pre>';
//			echo '<br />Team: ' .$row['team'];
//			echo '<br />Number: '.$row['number'];
			$question = $row['question'];
			
			if ($team==13)
			{
				if ($number == 1)
				{
					$question="What area of technology are you most comfortable with?";
				}
			
				if ($flag == "Film")
				{
					if ($number==2)
						$question = "Do you own any equipment (camera, tripod, etc)?";
					else if ($number==3)
						$question="What software do you work in (Final Cut, Premiere, etc.)?";
				}
				
				if ($flag == "AV")
				{
					if ($number==2)
						$question = "Have you ever done Audio/Video for a major event before? If so what was it?";
					else if ($number==3)
						$question = "Do you have any experience with livestream or tweet-to-screen systems?";
				}
								
				if ($flag == "Programming")
				{
					if ($number==2)
						$question = "What languages are you comfortable working with?";
					else if ($number==3)
						$question= "What kind of hardware do you have?";
				}								
								
			}
			
			if (($team == 11) && ($number==3))
			{
				$question="How often do you check your email?";
			}
			
			$question = strip_tags($question);
			$question = str_replace('BANCEDARATHON', '', $question);
			
			
			return $question;
		}				
//			echo '<br />Question '.$question;
	
			
}

//echo htmlspecialchars(getUnformattedQuestion(13, 3));

?>