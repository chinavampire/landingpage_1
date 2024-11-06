<?php
setcookie("account",$account,time()+3600*24*30);
setcookie("password",$password,time()+3600*24*30);
$privilege = $result['privilege'];
$verified=true;
$curdate=date("Y-m-d");
?>