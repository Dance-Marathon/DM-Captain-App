<?php
if (isset($_SESSION['ufid']))
{
	$ufid = $_SESSION['ufid'];
}
else
{
	$ufid = 0;
}

if (!$ufid)
{


  	echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "index.php";self.location.href = redirURL;</script>');
}

?>