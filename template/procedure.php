<?php

switch(true){

case (isset($_POST['submitmessage'])):
$thisname    =$_POST['name'];
$thisemail   = $_POST['email'];
$thismessage = $_POST['message'];
$sql = "INSERT INTO $messagetable(fullname,email,message,time)VALUES('$thisname','$thisemail','$thismessage',NOW())";
sql_multiply_write($sql);
break;


case (isset($_POST['submitmodifyblog']) and $privilege==='blog'):
$thissn=$_POST['modifyindex'];
$thistitle=$_POST['title'];
$thislocation=$_POST['location'];
$thisdate=$_POST['date'];
$thiscontent=$_POST['content'];
$sql = "update $blogtable set title='$thistitle',date='$thisdate',location='$thislocation',content='$thiscontent' where `sn`='$thissn'";
sql_multiply_write($sql);
$file=$_FILES['file'];
if ($file['size']>0)
{
$destinedpath=$currentpath."/images/blog/".$thissn.".jpg";
$upload=new uploadimg($file,$destinedpath);
$upload->doit(null);
}
break;

case (isset($_POST['submitnewblog']) and $privilege==='blog'):
$thissn=$_POST['modifyindex'];
$thistitle=$_POST['title'];
$thislocation=$_POST['location'];
$thisdate=$_POST['date'];
$thiscontent=$_POST['content'];
$sql = "INSERT INTO $blogtable(title,date,location,content)VALUES('$thistitle','$thisdate','$thislocation','$thiscontent')";
sql_multiply_write($sql);


$destinedpath=$currentpath."/images/blog/".mysqli_insert_id($conn).".jpg";

$file=$_FILES['file'];
if ($file['size']>0)
{
$upload=new uploadimg($file,$destinedpath);
$upload->doit(null);
}
break;


case (isset($_POST['submitmodifyportfolio']) and $privilege==='portfolio'):
$thissn=$_POST['modifyindex'];
$thistitle=$_POST['title'];
$sql = "update $portfoliotable set title='$thistitle' where `sn`='$thissn'";
sql_multiply_write($sql);
$file=$_FILES['file'];
if ($file['size']>0)
{
$destinedpath=$currentpath."/images/portfolio/".$thissn.".jpg";
$upload=new uploadimg($file,$destinedpath);
$upload->doit(null);
}
break;

case (isset($_POST['submitnewportfolio']) and $privilege==='portfolio'):
$thissn=$_POST['modifyindex'];
$thistitle=$_POST['title'];
$sql = "INSERT INTO $portfoliotable(title)VALUES('$thistitle')";
sql_multiply_write($sql);


$destinedpath=$currentpath."/images/portfolio/".mysqli_insert_id($conn).".jpg";

$file=$_FILES['file'];
if ($file['size']>0)
{
$upload=new uploadimg($file,$destinedpath);
$upload->doit(null);
}
break;




case (isset($_POST['submithome']) and $privilege==="admin"):



$about_slogan      =$_POST['about_slogan'];
$about_content     =$_POST['about_content'];
$about_content     =mysqli_real_escape_string($conn,$about_content);

$home_name         =$_POST['home_name'];
$home_address      =$_POST['home_address'];
$home_email        =$_POST['home_email'];
$home_facebook     =$_POST['home_facebook'];
$home_twitter      =$_POST['home_twitter'];
$home_whatsapp     =$_POST['home_whatsapp'];
$home_instagram    =$_POST['home_instagram'];
$home_youtube      =$_POST['home_youtube'];
$home_video_title  =$_POST['home_video_title'];

$delete = isset($_POST['del']) ? array_unique($_POST['del']) : array();  

//$delete=array_unique($_POST['del']);
asort($delete);
$delete=array_values($delete);
$num = count($delete);
$picpath=$currentpath."/images/staff/";
for($i=0;$i<$num;++$i){
$pic=$picpath.$delete[$i].".jpg";

if (file_exists($pic))
{
unlink($pic);
}
}




$file=$_FILES['about_image'];
if ($file['size']>0)
{
$destinedpath=$currentpath."/images/about/0.jpg";
$upload=new uploadimg($file,$destinedpath);
$upload->doit(null);
}


$file=$_FILES['video'];
if ($file['size']>0)
{
$destinedpath=$currentpath."/videos/0.mp4";
$upload=new uploadimg($file,$destinedpath);
$upload->doit(null);
}

$sql = "update $abouttable set slogan='$about_slogan',content='$about_content'";
sql_multiply_write($sql);

$sql = "update $hometable set home_name='$home_name',home_address='$home_address',home_email='$home_email',home_facebook='$home_facebook',home_twitter='$home_twitter',home_whatsapp='$home_whatsapp',
home_instagram='$home_instagram',home_youtube='$home_youtube',home_video_title='$home_video_title'";
sql_multiply_write($sql);

foreach($delete as $key=>$value){
sql_multiply_write("delete from $stafftable where sn='$value'");
}

$staff_sn=$_POST['thisstaffsn'];
$staff_sn=array_slice($staff_sn,0,-1,true);


$thisstaff_sn=0;
foreach($staff_sn as $key=>$value){
$thisstaff_sn=$value;
$postedfullname="staff_fullname_".$value;
$postedpost    ="staff_post_".$value;
$thisfullname=$_POST[$postedfullname];
$thispost=$_POST[$postedpost];
$get = "select * from $stafftable where sn='$value'";
$get = mysqli_query($conn,$get);
if ($get = mysqli_fetch_array($get))
{
$sql = "update $stafftable set fullname='$thisfullname',post='$thispost' where sn='$value'";
sql_multiply_write($sql);
$thisfilename='file'.$thisstaff_sn;
$file=$_FILES[$thisfilename];
if ($file['size']>0)
{
$destinedpath=$currentpath."/images/staff/".$thisstaff_sn.".jpg";
$upload=new uploadimg($file,$destinedpath);
$upload->doit(null);
}

}
else
{
$sql = "INSERT INTO $stafftable(sn,fullname,post)VALUES('$thisstaff_sn','$thisfullname','$thispost')";
sql_multiply_write($sql);
$thisfilename='file'.$thisstaff_sn;
$file=$_FILES[$thisfilename];
if ($file['size']>0)
{
$destinedpath=$currentpath."/images/staff/".$thisstaff_sn.".jpg";
$upload=new uploadimg($file,$destinedpath);
$upload->doit(null);
}



}


}

break;


case (isset($_POST['submit_password'])):
$thisnewpass = $_POST['newpass'];
$thisaccount = $_POST['account'];
$sql = "update $accounttable set password='$thisnewpass' where account='$thisaccount'";
sql_multiply_write($sql);
break;



default:
$default = 1;
}


?>