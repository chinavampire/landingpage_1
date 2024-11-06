<?php
$currentpath=dirname(__DIR__);
//get previous directory
$include_generator_index_initialize_variable=$currentpath.'/generator/index_initialize_variable.php';
include($include_generator_index_initialize_variable);
$table=$_GET['table'];
$thissn=$_GET['thissn'];
$sql="delete from $table where sn='$thissn'";
$thispicpath=false;

switch(true){
case ($table===$tablehead."blog"):
$thispicpath = $currentpath."/images/blog/".$thissn.".jpg";
break;

case ($table===$tablehead."portfolio"):
$thispicpath = $currentpath."/images/portfolio/".$thissn.".jpg";
break;

default:
}

if ($thispicpath)
{
unlink($thispicpath);
}
sql_multiply_write($sql);




echo "ok";
?>