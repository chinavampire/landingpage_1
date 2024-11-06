<?php
$showalert='Are you sure to delete it ?';


print <<<EOT
            <section class="news-detail section-padding">

                            <h2 class="mb-5 text-center" data-aos="fade-up">Modify&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?action=changepassword"><i class="fa fa-lock"></i></a></h2>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-10 mx-auto">

EOT;



$get = "select * from $messagetable";
$get = mysqli_query($conn,$get);


while($got = mysqli_fetch_array($get)){
$thissn      =$got['sn'];
$thisfullname   =$got['fullname'];
$thisemail =$got['email'];
$thismessage=$got['message'];
$thistime    =$got['time'];


print <<<EOT
<div id="form0">

</div>

<div id="$messagetable$thissn">
                            <p class="me-4" data-aos="fade-up">From : $thisfullname , Email : $thisemail , Submitted on : $thistime


<a><i class="fa fa-trash" onclick="deletediv('$messagetable','$thissn','$showalert')"></i></a>

</p>
                            <p data-aos="fade-up">$thismessage</p>
</div>
EOT;






}




print <<<EOT
                        </div>
                    </div>
                </div>
            </section>

EOT;


?>
