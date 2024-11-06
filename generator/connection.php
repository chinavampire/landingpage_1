<?php

$tablehead="5_1_";

$abouttable=$tablehead."about";
$accounttable=$tablehead."account";
$blogtable=$tablehead."blog";
$hometable=$tablehead."home";
$messagetable=$tablehead."message";
$portfoliotable=$tablehead."portfolio";
$slidertable=$tablehead."slider";
$stafftable=$tablehead."staff";

$myhost = "localhost";  
$mydatabase_username = "simplkbd_sw";  
$mydatabase_password = "sw_15303730131";  
$mydatabase_name = "simplkbd_sw"; 

$conn_bak =false;
$conn = @mysqli_connect($myhost, $mydatabase_username, $mydatabase_password, $mydatabase_name);
if (!$conn){
	die("database connected error");
}




//ini_set("error_reporting","E_ALL & ~E_NOTICE");
mysqli_query($conn,"set character set 'utf8'");
mysqli_query($conn,"set names 'utf8'");
header("Content-type: text/html; charset=utf-8");
?>