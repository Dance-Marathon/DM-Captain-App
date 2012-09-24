<?php
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