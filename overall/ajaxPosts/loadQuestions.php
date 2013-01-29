<?php
	include_once("../../pageheader.php");
	$numOfQuestions = mysql_escape_string($_POST['numOfQuestions']);
	$team = $_SESSION["team"];
	$result = mysql_query("SELECT * FROM Questions WHERE id = '$team'");
	$questionArray = array();
	$count = 0;
	while ($row = mysql_fetch_assoc($result)) {
		$questionArray[$count++] = $row['question'];
	}
	
	function displayQuestions($num) {
		global $questionArray;
		$size = sizeof($questionArray);
		for ($i = 0; $i < $num; $i++) {
			if ($i < $size) {
				$question = $questionArray[$i];
			}else{
				$question = "";
			}
			$qNum = $i+1;
			displayQuestionBox($qNum, $question);
		}
	}

	function displayQuestionBox($number, $question) {
		echo '<h2>Question '.$number.':</h2>
		<textarea style="width:550px;height:150px">'.$question.'</textarea>';
	}
	
	displayQuestions($numOfQuestions);
?>