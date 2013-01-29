<link href="../styles.css" rel="stylesheet" type="text/css" />
<link href="adminStyles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<link href="tablesorter/themes/blue/style.css" rel="stylesheet" type="text/css" />
<script src="../jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="../jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="../livevalidation_standalone.compressed.js" type="text/javascript"></script>
<script type="text/javascript" src="tablesorter/jquery.tablesorter.js"></script> 
<?php
		include_once("../pageheader.php");
?>
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
	?>
	</tbody>
	</table>
<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#overallTable").tablesorter({
	        
   	        sortList: [[13,0]]
	        
        }); 
    } 
); 
    
</script>