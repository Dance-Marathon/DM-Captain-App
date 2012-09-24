<?php

	include('dbcon.php');

if($_REQUEST)
{
	$id 	= $_REQUEST['parent_id'];
	$query = "select * from ajax_categories where pid = ".$id;
	$results = mysql_query( $query);?>
	
	<select name="sub_category"  id="sub_category_id">
	<option value="" selected="selected"></option>
	<?php
	while ($rows = mysql_fetch_assoc(@$results))
	{?>
		<option value="<?php echo $rows['category'];?>  ID=<?php echo $rows['id'];?>"><?php echo $rows['category'];?></option>
	<?php
	}?>
	</select>	
	
<?php	
}
?>