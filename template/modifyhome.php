<?php

$title_Name='Title';
$title_Date='Date';
$title_Location='Location';
$title_Text='Content';
$title_Image='Image(640px * 427px recommended)';

$title_button='save';


$get = "select * from $hometable";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$thishome_name       =$get['home_name'];
$thishome_address    =$get['home_address'];
$thishome_email      =$get['home_email'];
$thishome_facebook   =$get['home_facebook'];
$thishome_twitter    =$get['home_twitter'];
$thishome_whatsapp   =$get['home_whatsapp'];
$thishome_instagram  =$get['home_instagram'];
$thishome_youtube    =$get['home_youtube'];
$thishome_video_title=$get['home_video_title'];


$get = "select * from $abouttable";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$thisabout_slogan       =$get['slogan'];
$thisabout_content    =$get['content'];



$showaboutpic=$currenturl.'/images/about/0.jpg';


$countFile = 0;
$folderPath = $currentpath."/images/staff/";
$totalFiles = glob($folderPath . "*");


if ($totalFiles){
$countFile = count($totalFiles);
$newpicindex=max_number($totalFiles,$folderPath,'.');
}
else
{
$newpicindex=0;
}
$newpicindex++;
$showpic='';
$newpic=
'
                                <div class="row" id="img'.$newpicindex.'">
                                        <img id="imgPre'.$newpicindex.'" src="" style="width:100%;">
                                        <input type="hidden" name="thisstaffsn[]" value="'.$newpicindex.'" />



					  <div class="form-group" style="width:50%;">
					    <input type="text" class="form-control" name="staff_fullname_'.$newpicindex.'" maxlength="50" placeholder="Fullname" value="">
					  </div>

					  <div class="form-group" style="width:50%;">
					    <input type="text" class="form-control" name="staff_post_'.$newpicindex.'" maxlength="50" placeholder="Post" value="">
					  </div>



                                  <div style="width:50%;text-align:left;">
                                    <div id="newormodify'.$newpicindex.'"></div>
                                  <input type="file" name="file'.$newpicindex.'" id="file'.$newpicindex.'" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id,\''.$newpicindex.'\');" />
                                  </div>
                                  <div style="width:50%;text-align:right;display:none;" id="deletepic'.$newpicindex.'">
                                  <i class="fa fa-trash" aria-hidden="true" onclick="deletepic(\''.$newpicindex.'\')"></i>
                                  </div>
<hr>

                                </div>

';


for($i=0;$i<$countFile;++$i)
{




$imgindex=str_between($totalFiles[$i],$folderPath,'.');
$thispic=$currenturl.str_replace($currentpath,"",$totalFiles[$i]);




$get = "select * from $stafftable where sn='$imgindex'";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$thisstaff_sn          =$get['sn'];
$thisstaff_fullname    =$get['fullname'];
$thisstaff_post        =$get['post'];



$showpic.=
'
<div class="row" id="img'.$imgindex.'">
<img id="imgPre'.$imgindex.'" src="'.$thispic.'" style="width:100%;">
<input type="hidden" name="thisstaffsn[]" value="'.$thisstaff_sn.'" />



					  <div class="form-group" style="width:50%;">
					    <input type="text" class="form-control" name="staff_fullname_'.$thisstaff_sn.'" maxlength="50" required placeholder="Fullname" value="'.$thisstaff_fullname.'">
					  </div>

					  <div class="form-group" style="width:50%;">
					    <input type="text" class="form-control" name="staff_post_'.$thisstaff_sn.'" maxlength="50" required placeholder="Post" value="'.$thisstaff_post.'">
					  </div>



<div style="width:50%;text-align:left;">
<div id="newormodify'.$i.'"><i class="fa fa-pen" aria-hidden="true" onclick="file'.$imgindex.'.click();"></i></div>
<input type="file" style="display:none;" name="file'.$imgindex.'" id="file'.$imgindex.'" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id,\''.$imgindex.'\');" />
</div>
<div style="width:50%;text-align:right;display:block;" id="deletepic'.$imgindex.'">
<i class="fa fa-trash" aria-hidden="true" onclick="deletepic(\''.$imgindex.'\')"></i>
</div>
<hr>

</div>

<br><br>

';
}























print <<<EOT

                            <h2 class="mb-5 text-center" data-aos="fade-up">Modify&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?action=changepassword"><i class="fa fa-lock"></i></a></h2>

            <section class="hero" id="hero">

                <div class="videoWrapper">
                    <video autoplay="" loop="" muted="" class="custom-video" id="previewvideo">
                        <source src="videos/0.mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="overlay"></div>
            </section>




        <!-- Start New Section -->
			<div class="login-page animate__animated animate__fadeInUp">
	            <div id="Registration" class="page-content card card-block p-3 p-sm-4  ">
                                <form action="index.php?action=manage" method="POST" id="form0" class="contact-form" enctype="multipart/form-data">
                                        <input type="hidden" name="create_new" value=0 />
                                        <input type="hidden" name="imgindex" id="imgindex" value=$newpicindex />



                    Choose Homepage Video(16/9 recommended)&nbsp;&nbsp;<input type="file" name="video" id="video" accept="video/mp4" onchange="previewvideo(this.id);" />

<br>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_video_title" maxlength="100" placeholder="Words On The Video" value="$thishome_video_title">
					  </div>
<br>
<br>
					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="about_slogan" maxlength="100" placeholder="Slogan For About Us Description" value="$thisabout_slogan">
					  </div>


					  <div class="form-group" style="width:50%;height:50%;">
                                            <textarea class="form-control text-area" style="height:100px" name="about_content" maxlength="1000" placeholder="About Us Description">$thisabout_content</textarea>
					  </div>

<br>
<br>

					  <div class="form-group">
					    <label>About Us Image(500px * 666px recommended)</label>
                                            <div class="row">
                                              <img style="width:50%;height:50%;" id="previewabout_image" src="$showaboutpic">
                                              <input type="file" name="about_image" id="about_image" accept="image/jpg,image/gif,image/pjpeg" onchange="previewImg(this.id);" />
                                            </div>
					  </div>


<br>
<br>



					  <div class="form-group" id="uploadimg">
					    <label>Staff (Image: 500px * 666px recommended)</label>
                                            $showpic
                                            $newpic
					  </div>



<br>
<br>



					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_name" maxlength="100" placeholder="Company Name" value="$thishome_name">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_address" maxlength="100" placeholder="Company Address" value="$thishome_address">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_email" maxlength="100" placeholder="Company Email" value="$thishome_email">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_facebook" maxlength="100" placeholder="Company Facebook" value="$thishome_facebook">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_twitter" maxlength="100" placeholder="Company Twitter" value="$thishome_twitter">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_whatsapp" maxlength="100" placeholder="Company whatsapp" value="$thishome_whatsapp">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_instagram" maxlength="100" placeholder="Company Instagram" value="$thishome_instagram">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="home_youtube" maxlength="100" placeholder="Company Youtube" value="$thishome_youtube">
					  </div>

					  <div>
                                             <input type="submit" name="submithome" class="btn btn-primary mt-3" value="save">
                                          </div>


                                </form>
                </div>
            </div>
        <!-- End New Section -->

EOT;

?>
