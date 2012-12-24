<?php
include_once("../pageheader.php");

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
	<p>Testing</p>

<?php
}//----------- End

// ----------------------------- questionPage() ---------------------------------
function questionPage() {
?>

<h1>Question Management</h1>
	<p>Testing</p>

<?php
}//----------- End


// ----------------------------- userPage() ---------------------------------
function userPage() {
?>

<h1>Manage Users</h1>
<p>Testing</p>

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
		<input type = "button" value = "Add Overall" onClick="addOverall()" />
		</p>
	</div>
	
	<div id="tableUpdateDiv">
	<table id = "overallTable" class="tablesorter">
	<thead> 
	<tr> 
		<th>UFID</th>
		<th>Email</th>
		<th>Registered</th> 
		<th>Edit</th> 
	</tr> 
	</thead> 
	<tbody> 
	<?php
		$sql = mysql_query("SELECT * FROM Overalls ORDER BY registered DESC");
		while($result = mysql_fetch_assoc($sql)) {
			if ($result['registered']) {
				$registered = "Yes";
			} else {
				$registered = "No";
			}
			if (!$result['email']) {
				$result['email'] = "-";
			}
			echo "<tr id='".$result['ufid']."Row'>
			<td>".$result['ufid']."</td>
			<td>".$result['email']."</td>
			<td>".$registered."</td>
			<td><a href='#' onClick='removeOverall(".$result['ufid'].");return false'>Remove</a> </td>
			</tr>";
		}
	?>
	</tbody>
	</table>
	</div>
	
<?php
} // ----------- End
?>