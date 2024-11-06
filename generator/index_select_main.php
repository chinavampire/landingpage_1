<?php




switch(true){

case ($act==="login"):
include($include_template_login);
break;

case ($act==="changepassword"):
include($include_template_changepassword);
break;

case ($act==="singleblogdetail"):
include($include_template_singleblogdetail);
break;

case ($privilege==="blog" and $act==="singleblogpage"):
include($include_template_singleblogpage);
break;

case ($privilege==="portfolio" and $act==="singleportfoliopage"):
include($include_template_singleportfoliopage);
break;

case ($privilege==="message" and $act==="manage"):
include($include_template_modifymessage);
break;

case ($privilege==="blog" and $act==="manage"):
include($include_template_modifyblog);
break;

case ($privilege==="portfolio" and $act==="manage"):
include($include_template_modifyportfolio);
break;

case ($privilege==="admin" and $act==="manage"):
include($include_template_modifyhome);
break;

case ($act==="singleblog"):
include($include_template_singleblog);
break;


default:
$killmenu=false;
$killslider=false;

include($include_template_about);
include($include_template_portfolio);
include($include_template_blog);
include($include_template_message);



}






?>