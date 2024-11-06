<?php

$title_Name='Title';
$title_Date='Date';
$title_Location='Location';
$title_Text='Content';
$title_Image='Image(640px * 427px recommended)';
$title_button='save';



$thissn=$_GET['thissn'];
$operate=$_GET['operate'];

$showpic=$currenturl.'/images/blog/'.$thissn.'.jpg';;


$get = "select * from $blogtable where `sn`='$thissn'";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$thisname=$get['title'];
$thisdate=$get['date'];
$thislocation=$get['location'];
$thistext=$get['content'];




switch(true){
case ($operate==="modify"):
$title_top='Modify';
$submit_name="submitmodifyblog";
break;


case ($operate==="new"):
$title_top='New';
$submit_name="submitnewblog";
$thisdate=$curdate;
$showpic=$currenturl.'/images/default.jpg';
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

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="date" class="form-control" name="date" required placeholder="$title_Date" value="$thisdate">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
					    <input type="text" class="form-control" name="location" maxlength="100" required placeholder="$title_Location" value="$thislocation">
					  </div>

					  <div class="form-group" style="width:50%;height:50%;">
                                            <textarea class="form-control text-area" style="height:100px" name="content" maxlength="1000" placeholder="$title_Text">$thistext</textarea>
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
