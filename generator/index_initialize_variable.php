<?php

if(isset($_GET['action'])){
$act=$_GET['action'];
switch(true){
case ($act==="logout"):
setcookie("account","",time()-1);
setcookie("password","",time()-1);
$account="";
$password="";
$_COOKIE['account']="";
$_COOKIE['password']="";
if (isset($_POST['changepassword']))
{
$act="login";
}
break;

default:
$default="";
}
}



if (isset($_POST['check_login']))
{
$account = $_POST['account'];
$password = $_POST['password'];
}
else
{
$account=$_COOKIE['account'];
$password=$_COOKIE['password'];
}


$verified=false;
$showlog="";
$privilege="";
$killmenu=false;
$killslider=false;



$include_generator_connection               =$currentpath.'/generator/connection.php';
$include_generator_index_verified           =$currentpath.'/generator/index_verified.php';
$include_generator_index_initialize_price   =$currentpath.'/generator/index_initialize_price.php';
$include_generator_index_select_main        =$currentpath.'/generator/index_select_main.php';
$include_generator_initialize_page          =$currentpath.'/generator/initialize_page.php';
$include_generator_initialize_select        =$currentpath.'/generator/initialize_select.php';
$include_generator_pagination               =$currentpath.'/generator/pagination.php';
$include_generator_headersearch             =$currentpath.'/generator/headersearch.php';
$include_generator_headerslider             =$currentpath.'/generator/headerslider.php';
$include_generator_headermenu               =$currentpath.'/generator/headermenu.php';
$include_generator_headercart               =$currentpath.'/generator/headercart.php';
$include_generator_classsymbol              =$currentpath.'/generator/classsymbol.php';
$include_generator_recordfilter             =$currentpath.'/generator/recordfilter.php';
$include_generator_shopsymbol               =$currentpath.'/generator/shopsymbol.php';
$include_generator_homeitem                 =$currentpath.'/generator/homeitem.php';
$include_generator_homeblog                 =$currentpath.'/generator/homeblog.php';

$include_function_myfunction                =$currentpath.'/function/myfunction.php';
$include_function_phpqrcode                 =$currentpath.'/function/phpqrcode.php';

$include_template_procedure                 =$currentpath.'/template/procedure.php';
$include_template_header                    =$currentpath.'/template/header.php';
$include_template_footer                    =$currentpath.'/template/footer.php';
$include_template_about                     =$currentpath.'/template/about.php';
$include_template_portfolio                 =$currentpath.'/template/portfolio.php';
$include_template_blog                      =$currentpath.'/template/blog.php';
$include_template_singleblogpage            =$currentpath.'/template/singleblogpage.php';
$include_template_singleblogdetail          =$currentpath.'/template/singleblogdetail.php';
$include_template_singleportfoliopage       =$currentpath.'/template/singleportfoliopage.php';
$include_template_message                   =$currentpath.'/template/message.php';
$include_template_singleclass               =$currentpath.'/template/singleclass.php';
$include_template_classattendance           =$currentpath.'/template/classattendance.php';
$include_template_signup                    =$currentpath.'/template/signup.php';
$include_template_invite                    =$currentpath.'/template/invite.php';
$include_template_login                     =$currentpath.'/template/login.php';
$include_template_profile                   =$currentpath.'/template/profile.php';
$include_template_modifyhome                =$currentpath.'/template/modifyhome.php';
$include_template_modifyclass               =$currentpath.'/template/modifyclass.php';
$include_template_modifycommission          =$currentpath.'/template/modifycommission.php';
$include_template_modifyseo                 =$currentpath.'/template/modifyseo.php';
$include_template_refund                    =$currentpath.'/template/refund.php';
$include_template_changepassword            =$currentpath.'/template/changepassword.php';
$include_template_orders                    =$currentpath.'/template/orders.php';
$include_template_orderhistory              =$currentpath.'/template/orderhistory.php';
$include_template_myclasses                 =$currentpath.'/template/myclasses.php';
$include_template_myusers                   =$currentpath.'/template/myusers.php';
$include_template_invalid                   =$currentpath.'/template/invalid.php';
$include_template_shop                      =$currentpath.'/template/shop.php';
$include_template_singleitem                =$currentpath.'/template/singleitem.php';
$include_template_singleblog                =$currentpath.'/template/singleblog.php';
$include_template_newclass                  =$currentpath.'/template/newclass.php';
$include_template_newblog                   =$currentpath.'/template/newblog.php';
$include_template_newitem                   =$currentpath.'/template/newitem.php';
$include_template_modifyblog                =$currentpath.'/template/modifyblog.php';
$include_template_modifyportfolio           =$currentpath.'/template/modifyportfolio.php';
$include_template_modifymessage             =$currentpath.'/template/modifymessage.php';

include($include_generator_connection);
include($include_function_myfunction);

$home=mysqli_query($conn,"select * from $hometable");
$home=mysqli_fetch_array($home);
$home_name             =$home['home_name'];
$home_address          =$home['home_address'];
$home_email            =$home['home_email'];
$home_facebook         =$home['home_facebook'];
$home_twitter          =$home['home_twitter'];
$home_whatsapp         =$home['home_whatsapp'];
$home_instagram        =$home['home_instagram'];
$home_youtube          =$home['home_youtube'];
$home_video_title      =$home['home_video_title'];
$video_show            =$home['home_video_show'];




?>