<?php
session_cache_limiter('private, must-revalidate');
session_start();

$currenturl="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$thisbasename=basename($currenturl);
$currenturl=str_replace($thisbasename,"",$currenturl);
if (substr($currenturl,-1)==="/")
{
$currenturl=substr($currenturl,0,-1);
}

$currentpath=__DIR__;
$include_generator_index_initialize_variable=$currentpath.'/generator/index_initialize_variable.php';
include($include_generator_index_initialize_variable);

$check  = "select * from $accounttable where account='$account'";
$check  = mysqli_query($conn,$check);
$result = mysqli_fetch_array($check);

if (password_verify($password, $result['password'])) {  
include($include_generator_index_verified);
}
else
{
if (isset($_POST['check_login']))
{
$act="invalid";
}
}



include($include_template_procedure);
include($include_template_header);
include($include_generator_index_select_main);
include($include_template_footer);







?>
