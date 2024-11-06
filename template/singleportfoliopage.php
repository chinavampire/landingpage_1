<?php

$title_Name='Title';
$title_Image='Image(640px * 427px recommended)';
$title_button='save';



$thissn=$_GET['thissn'];
$operate=$_GET['operate'];

$showpic=$currenturl.'\images\portfolio/'.$thissn.'.jpg';;


$get = "select * from $portfoliotable where `sn`='$thissn'";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$thisname=$get['title'];



switch(true){
case ($operate==="modify"):
$title_top='Modify';
$submit_name="submitmodifyportfolio";
break;


case ($operate==="new"):
$title_top='New';
$submit_name="submitnewportfolio";
$thisdate=$curdate;
$showpic=$currenturl.'\images\default.jpg';
break;


default:
}











print <<<EOT


        <!-- Start New Section -->
			<div class="login-page animate__animated animate__fadeInUp">
	            <h3 class="text-center">$title_top</h3>
	            <div id="Registration" class="page-content card card-block p-3 p-sm-4  ">
                                <form action="index.php?action=manage" method="POST" id="form0" class="contact-form" enctype="multipart/form-data">
                                        <input type="hidden" name="modifyindex" value=$thissn />
                                        <input type="hidden" name="create_new" value=0 />



					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="title" maxlength="100" required placeholder="$title_Name" id="exist" value="$thisname">
					  </div>


					  <div class="form-group">
					    <label>image</label>
                                            <div class="row">
                                              <img style="width:50%;height:50%;" id="previewfile" src="$showpic">
                                              <input type="file" name="file" id="file" accept="image/jpg,image/gif,image/pjpeg" onchange="previewImg(this.id);" />
                                              $title_Image_recommend
                                            </div>
					  </div>








					  <div>
                                             <input type="submit" name="$submit_name" class="btn btn-primary mt-3" value="$title_button">
                                          </div>


                                </form>
                </div>
            </div>
        <!-- End New Section -->

EOT;

?>
