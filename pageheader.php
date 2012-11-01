<?php  

  
// Our custom error handler  


function mysql_real_unescape_string($input,$checkbr) {

$output = $input;
$output = str_replace("\\\\", "\\", $output);
$output = str_replace("\'", "'", $output);
$output = str_replace('\"', '"', $output);

if ($checkbr==1) {

$output = str_replace('\n\r', '\n', $output);
$output = str_replace('\r\n', '\n', $output);
$output = str_replace('\r', '\n', $output);
$output = str_replace('\n', ' ', $output);

} else if ($checkbr==2) {

$output = str_replace('\n\r', '\n', $output);
$output = str_replace('\r\n', '\n', $output);
$output = str_replace('\r', '\n', $output);
$output = str_replace("\n", "<br>", $output);

}

return $output;

}

session_start();
include("connectToServer.php");
connect();

?>