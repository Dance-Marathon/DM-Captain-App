<?php
include_once("../pageheader.php");
//make array with all the general questions in it
$result = mysql_query("SELECT * FROM Questions WHERE id = '0'");
$questionArray = array();
$count = 0;
while ($row = mysql_fetch_assoc($result)) {
	$questionArray[$count++] = $row['question'];
}
$questionArraySize = sizeof($questionArray);


// ----------------------------- teamPage() ---------------------------------
function teamPage() {
?>

<h1>Team Management</h1>
	<p>
	Add new team: <input type="text" name="teamName" id="teamName" maxLength="30" /> <input type="button" value="Add" onClick="addTeam()"/>
	</p>
	<p style="margin-top:40px">
	<table align="center" id="teamTable" style="width:400px">
	<?
	$sql = mysql_query("SELECT * FROM teams");
	while($row = mysql_fetch_array($sql)) {
		$teamName = $row['team'];
		$id = $row['id'];
		echo "<tr id='teamRow".$id."'><td>
			".$teamName."
			</td><td>
			<a href='#' onClick='removeTeam(".$id.")'>
			Remove
			</a>
			</td></tr>";
	}
	?>
	</table>
	</p>

<?php
}//----------- End

// ----------------------------- interviewPage() ---------------------------------
function interviewPage() {
?>

<h1>Interview Management</h1>

<div class = "checkList">
	<u>*To do:</u><br />
		-Display Calender<br />
		-Ask how time slots should work?<br />
		-Save on blur
</div>

	<h2 class = "blueText">Dates</h2>
		Choose dates for interview times:
		<a href="#" class="date-pick">
		Pick a date 
		<img src = "datePicker/images/calendar.png" style = "vertical-align:top"/>
		</a>
		<div id = "dateList">
		February 4, 2013<br />
		February 5, 2013<br />
		February 6, 2013<br />
		February 8, 2013<br />
		</div>
	
	<h2 class = "blueText">Times</h2>
		<p>
			Have interviews available every 
				<select>
					<?php
					for ($i =1 ; $i <= 12; $i++) {
						$minutes = $i*5;
						echo "<option>".$minutes."</option>";
					}
					?>
				</select>
			minutes
		</p>
		<p>
				From 
				<select>
						<?php
						for ($i = 0; $i <= 11; $i++) {
							if ($i == 0) $hour = 12; else $hour = $i;
							echo "<option>".$hour." AM</option>";
						}
						for ($i = 0; $i <= 11; $i++) {
							if ($i == 0) $hour = 12; else $hour = $i;
							echo "<option>".$hour." PM</option>";
						}
						?>
				</select>
				to
				<select>
						<?php
						for ($i = 0; $i <= 12; $i++) {
							if ($i == 0) $hour = 12; else $hour = $i;
							echo "<option>".$hour." AM</option>";
						}
						for ($i = 0; $i <= 12; $i++) {
							if ($i == 0) $hour = 12; else $hour = $i;
							echo "<option>".$hour." PM</option>";
						}
						?>
				</select>
		</p>

<?php
}//----------- End

// ----------------------------- questionPage() ---------------------------------
function questionPage() {
global $questionArraySize;
?>

<h1>Question Management</h1>

<div style = "margin:0 0 50px 0">
	<div class = "checkList">
	<u>*To do:</u><br />
		-Autosave on blur<br />
		-Display notification that changes were saved<br />
		-Min and max amount of questions?
	</div>
	
	<h2 style = "color:#014083">Number of questions: 
	<select id="numOfQuestions" style ="vertical-align:middle">
		<?php
			
			for ($i = 1; $i < 6; $i++) {
				
				$questionArraySize = 0 ?: 3;
				if ($i == $questionArraySize) {
					echo "<option value='".$i."' selected>".$i."</option>";
				}else{
					echo "<option value='".$i."'>".$i."</option>";
				}
			}
		?>
	</select>
	</h2>

	<div id="questionDiv">
	<?php
		displayQuestions($questionArraySize);
	?>
	</div>

</div>


<?php
}//----------- End


// ----------------------------- userPage() ---------------------------------
function userPage() {
?>

<h1>Manage Users</h1>
<div class = "checkList">
	<u>*To do:</u><br />
		- Figuring out what admin would need to see here for users<br />
		- Would information for all users go here? <br />
		- Or Just display emails in batches of 25 here for each team?<br />
		- Both?
</div>

<?php
}//---------- End


// ----------------------------- overallPage() ---------------------------------
function overallPage() {
?>

	<h1>Overall Management</h1>
	
	<div id = "addOverall">
		Enter overall's UFID so they can verify themselves upon signup:
		<p>
		UFID: <input type = "text" name = "overallUFID" id="overallUFID" maxlength="8" />
		<?php
		getTeams();
		?>
		<input type = "button" value = "Add Overall" onClick="addOverall()" />
		</p>
		
		<div style = "border-top:1px solid #CCC; margin: 30px 0 30px"></div>
	</div>
	
	<div id="tableUpdateDiv">
	<table id = "overallTable" class="tablesorter">
		<thead> 
		<tr>
			<th>Team</th>
			<th>UFID</th>
			<th>Email</th>
			<th>Registered</th> 
			<th>Edit</th> 
		</tr> 
		</thead> 
		<tbody> 
		<?php
			$sql = mysql_query("SELECT * FROM Overalls ORDER BY registered DESC");
			if(mysql_num_rows($sql)!=0) {
				while($result = mysql_fetch_assoc($sql)) {
					$teamName = getTeam($result['team']);
					if ($result['registered']) {
						$registered = "Yes";
					} else {
						$registered = "No";
					}
					if (!$result['email']) {
						$result['email'] = "-";
					}
					echo "<tr id='".$result['ufid']."Row'>
					<td>".$teamName."</td>
					<td><a href='../overall/applicant.php?ufid=".$result['ufid']."'>".$result['ufid']."</a></td>
					<td>".$result['email']."</td>
					<td>".$registered."</td>
					<td><a href='#' onClick='removeOverall(".$result['ufid'].");return false'>Remove</a> </td>
					</tr>";
				}
			}
		?>
		</tbody>
	</table>
	<?php if(mysql_num_rows($sql)==0) { ?>
			None yet, try adding some...
	<?php } ?>
	
	</div>
	
<?php
} // ----------- End


// ----------------------------- Functions -------------------------------

function displayQuestions($num) {
	global $questionArray;
	for ($i = 0; $i < $num; $i++) {
		$question = $questionArray[$i];
		$qNum = $i+1;
		displayQuestionBox($qNum, $question);
	}
}

function displayQuestionBox($number, $question) {
	echo '<h2>Question '.$number.':</h2>
	<textarea style="width:550px;height:150px">'.$question.'</textarea>';
}
?>