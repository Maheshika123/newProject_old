<?php
define("GREETING","Hello world");
echo constant("GREETING").'</br>';

define("GREETING","Hello world",TRUE);
echo constant ("greeting");  
//needn't to case sensitive because we use optional parametre
//whether the constant name should be caseinsensitive.Default is false.							 

//--------------------

$datedisplay=date("I,F,n,Y");
print $datedisply;

?>