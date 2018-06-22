<?php

$x=75;
$y=25;

function addition(){
	$GLOBALS['z']=$GLOBALS['x']+$GLOBALS['y'];	
	
}
/*$GLOBALS is a PHP super global variable which is used to access global 
variables from anywhere in the PHP script (also from within functions or methods).

PHP stores all global variables in an array called $GLOBALS[index]. 
The index holds the name of the variable.

$_SERVER is a PHP super global variable which holds information about 
headers, paths, and script locations. 

PHP $_REQUEST is used to collect data after submitting an HTML form.


*/

addition();
echo $z;

?>