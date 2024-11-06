<?php
$currentpath=dirname(__DIR__);
//get previous directory
$include_generator_index_initialize_variable=$currentpath.'/generator/index_initialize_variable.php';
include($include_generator_index_initialize_variable);
$account  = $_POST['account'];
$password = $_POST['original'];
$newpass  = $_POST['newpass'];
$repass   = $_POST['repass'];
$result='Wrong password!';
$hashedPassword = password_hash($newpass, PASSWORD_BCRYPT);

$check = "select * from $accounttable where account='$account'";
$check = mysqli_query($conn,$check);
$check = mysqli_fetch_array($check);
$check = $check['password'];
if (password_verify($password, $check)) {  
$result="";
$check0 = "update $accounttable set password='$hashedPassword' where account='$account'";
mysqli_query($conn,$check0);
}
echo $result;
?>