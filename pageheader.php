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

function matt_error_handler($number, $message, $file, $line, $vars)  
  
{  
    $email = " 
        <p>An error ($number) occurred on line  
        <strong>$line</strong> and in the <strong>file: $file.</strong>  
        <p> $message </p>";  
    $email .= "<p>SQL Statement ". mysql_error()."</p>";      
    $email .= "<pre>" . print_r($vars, 1) . "</pre>";  
    
      
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
      
    // Email the error to someone... 
    
    error_log($email, 1, 'errors@floridadm.org', $headers);  
  
    // Make sure that you decide how to respond to errors (on the user's side)  
    // Either echo an error message, or kill the entire project. Up to you...  
    // The code below ensures that we only "die" if the error was more than  
    // just a NOTICE.   
    if ( ($number !== E_NOTICE) && ($number < 2048) ) {  
        die("There was an error. Our tech overall has been notified and will handle the situation as soon as possible. Please try again later. We appologize for the inconvenience.");  
    }  
}  
// We should use our custom function to handle errors.  
//set_error_handler('matt_error_handler'); 
//ini_set('session.cookie_domain', '.mydmlanding.com' );
//session_set_cookie_params(60*60,"/",".floridadm.org",false,false);
  //ini_set('session.use_cookies', 0);
//  ini_set('session.use_only_cookies', 0);
  //ini_set('session.use_trans_sid', 1);

session_start();



include("connectToServer.php");
connect();



//echo "<pre>";
//print_r ($_SESSION);
//print_r(session_get_cookie_params());
//echo "<!--";

?>